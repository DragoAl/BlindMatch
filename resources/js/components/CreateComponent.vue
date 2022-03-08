<template>
    <div>
        <div class="interests-col">
            <h2> I tuoi interessi:</h2> 
            <span v-for="interest in interestsArr" :key="interest.id" > 
                <label for="checkbox" >
                    <input type="checkbox" id="interest.id" value="interest.name" name="interest.name" 
                        @click="selectedInterest(interest.id)" 
                        v-if="checkedInterests.includes(interest.id) ? checked=true : ''"
                        v-model="checked"
                    >
                    <input type="checkbox" id="interest.id" value="interest.name" name="interest.name" 
                        v-else
                        @click="selectedInterest(interest.id)" 
                    >
                {{interest.name}}</label>           
            </span> 
            <input class="btn btn-custom-black m-3" type="submit" @click="saveInterests()" value="Salva i tuoi interessi">
            
        </div>
    </div>
    
</template>
<script>

export default {
    data() {
        return {
            interestsArr : [],
            checked:false,
            checkedInterests: []
        }
    },
    
    props : {
        userlog: Object, //prendo i dati dell'utente loggato
    },

    mounted() {
        //chiamata per prendere gli la lista degli interessi
        axios.get('/interest/get')
        .then(res=>{
            this.interestsArr=(res.data);
            // console.log(this.interestsArr);
        })
        .catch(err => console.log(err));

        axios.get(`/interest/get/${this.userlog.id}`)
        .then(res=>{
            this.checkedInterests=(res.data);
            console.log(this.checkedInterests);
        })
        .catch(err => console.log(err));

    },
    
    methods: { 
        saveInterests() {
            console.log(this.checkedInterests);
            
            axios.patch(`/interest/link/${this.userlog.id}`, this.checkedInterests )
            .then(res=>{
                console.log(res);
            })
            .catch(err => console.error(err.response.data)); 
        },

        selectedInterest(id) {
            
            let index =  this.checkedInterests.indexOf(id);
            if(index === -1){
                this.checkedInterests.push(id);
                // this.apartmentsOptionals()
            }else{
                this.checkedInterests.splice(index,1); 
                
            }
            console.log(this.checkedInterests);
        }
    }
}
</script>
<style scoped  lang="scss" >
    *{
        font-family: 'Caveat', cursive;
    }
    .btn-custom-black {
        background-color: black;
        color: white;
        &:hover {
            background-color: #69C9D0;
            color: black;


        }
    }
    .interests-col {
        // width: 50px;
        padding: 0 10px;
        border: 8px solid #69C9D0;
        display: flex;
        flex-direction: column;
        background-color:#EE1D52;
        h2 {
            font-size: 40px;
        }
        label {
            font-size: 30px;
        }
    }

</style>
