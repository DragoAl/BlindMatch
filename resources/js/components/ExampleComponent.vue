<template>
    <div class="container-big">
        <button @click="openWindowLog()" class="btn btn-primary">Login</button>

        <div class="container" v-if="activeLogin==false">
            <div>
                <h1> Register: </h1>
                <form  method="POST">
                    <!-- @method("POST")
                    @csrf -->

                    <label for="name">Nome:</label><br>
                    <input type="text" name="name" placeholder="Nome"><br>
                    <label for="surname">Cognome</label><br>
                    <input type="text" name="surname" placeholder="Cognome"><br>
                    <label for="date_of_birth">Data di nascita</label><br>
                    <input type="date" name="date_of_birth" placeholder="Data di nascita"><br>
                    <label for="email">Email:</label><br>
                    <input type="email" name="email" placeholder="Email" ><br>
                    <label for="password">Password:</label><br>
                    <input type="password" name="password" placeholder="Password di almeno 8 caratteri"><br>
                    <label for="password_confirmation">Conferma Password:</label><br>
                    <input type="password" name="password_confirmation" placeholder="conferma password"><br>
                    <input class="btn btn-primary m-4" type="submit" value="Register">
                </form>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                activeLogin : false,
            }
        },
        mounted() {
           
        },
        methods: {

            
            openWindowLog(){
                if(this.activeLogin ==false) {
                    this.activeLogin =true;
                } else {
                    this.activeLogin =false;

                }
            }
        }
    }
</script>
<style lang="scss" scoped>
    .container-big {
        position: relative
    }
    .container {
        background-color: blueviolet;
        position: absolute;
        top: 0;
        right: 0;
        width: 60%;
        height: 100vh;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
    }

</style>
