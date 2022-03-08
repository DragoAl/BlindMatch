<template>
    <div class="container"> 
        <h3>{{userlog.name}}</h3>
        <h4>Mi piacciono: {{userlog.gender_like}} </h4>
        <button class="btn btn-success" @click="userToShow()">to show</button>

        <div v-for="user in usersInterests" :key="user.user.id"> 
            <div v-if="usertoShow.includes(user.user.id)">
                <!-- donna-donna/uomo-uomo -->
                <div v-if="userlog.gender== userlog.gender_like && user.user.gender==user.user.gender_like && user.user.gender==userlog.gender">
                    <div class="user_card">
                        <h4>{{user.user.name}}</h4>
                        <span> Sesso:{{user.user.gender}}</span>
                        <span> Mi piacciono :<b>{{user.user.gender_like}}</b></span>
                        <span @click="getAge(user.user.date_of_birth)">{{user.user.date_of_birth}} </span>
                        <span>Interessi: {{user.interests_id}}</span>
                    </div>
                </div>
               
                <!-- uomo-donna -->
                <div class="user_card" v-else-if="userlog.gender !== userlog.gender_like && user.user.gender_like != user.user.gender && user.user.gender_like !=userlog.gender_like ">
                    <h4>Nome:{{user.user.name}}</h4>
                    <span> Sesso:{{user.user.gender}}</span>
                    <span> Mi piacciono :<b>{{user.user.gender_like}}</b></span>
                    <span @click="getAge(user.user.date_of_birth)">{{user.user.date_of_birth}} </span>
                    <span>Interessi: {{user.interests_id}}</span>
                </div>
            </div>
        </div>
    </div>
    
</template>
<script>
export default {
    data() {
        return {
            usersArr :[], //array contenente di tutti gli utenti ricevuti dalla chiamata
            usersInterests : [],    //utenti e interessi degli utenti
            checkedInterests: [], //interessi dell'utente loggato
            usertoShow :[],
            filterListofUsers :[],
        }
    },
    props : {
        userlog: Object, //prendo i dati dell'utente loggato
    },
    mounted(){ 
        
        //chiamata per ottnere tutti gli utenti
        axios.get('/users/get')
        .then(res=>{
            this.usersArr=(res.data);
            console.log(this.usersArr);
        })
        .catch(err => console.log(err));

        //chiamata per ottenere gli interessi dell'utente loggato
        axios.get(`/interest/get/${this.userlog.id}`)
        .then(res=>{
            this.checkedInterests=(res.data);
            console.log(this.checkedInterests);
        })
        .catch(err => console.log(err));

        //chiamata per ottenere gli utenti con i propri interessi
        axios.get('users/interests')
        .then(res=>{
            this.usersInterests=(res.data);
            console.log('array di utenti con i propri interessi', this.usersInterests);
        })
        .catch(err => console.log(err));
    },

    methods: {
        getAge(date_of_birth){
            var ageInMilliseconds = new Date()- new Date(date_of_birth);
            console.log(Math.floor(ageInMilliseconds/1000/60/60/24/365));
            return Math.floor(ageInMilliseconds/1000/60/60/24/365);            
        },

        logUserToArr(){
            this.logUserArr = Object.entries(this.userlog)
            console.log(this.logUserArr);
        },

        userToShow(){
            this.usertoShow = [];
            this.usersInterests.forEach(interestsUser => {
                let interestsForUser = interestsUser.interests_id;

                let userWithInterests = this.checkedInterests.filter(checkedInterest => {
                    return interestsForUser.includes(checkedInterest);
                });
                if(userWithInterests >=1){
                    console.log(_.intersection(this.checkedInterests,this.usersInterests.interests_id).length);
                    this.usertoShow.push(interestsUser.user.id);
                }
            })
                        
            //ritorna l'id degli utenti da mostrare
            console.log(this.usertoShow);
            return this.usertoShow;
        },
       
    },
    
}

</script>
<style scoped lang="scss">
.container {
    width: 60%;
    margin: 20px auto;
    border: 20px solid black;
    i {
        font-size: 20px;
    }
    
}
.user_card{
    height: 70px;
    margin: 10px 0;
    border: 5px solid #EE1D52 ;
    color: white;
    background-color: black;
}
 
    

</style>