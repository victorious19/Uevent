<template>
<div>

    <!-- <h2 class="radio"> -->
        
    <input id="tab-1" type="radio" name="tab" checked><label for="tab-1">Sign In</label>
    <input id="tab-2" type="radio" name="tab" ><label for="tab-2">Sign Up</label>
    <input id="tab-3" type="radio" name="tab" ><label for="tab-3">Forgot password</label>
    <!-- </h2> -->


    <form class="login" @submit="login">
        <h1>Sing in</h1>
        <input type="text" class="input" placeholder="User name" v-model="username">
        <input type="password" class="input" placeholder="Password" data-type="password" v-model="password">
        <input type="submit" class="button" value="Sign In">
    </form>

    <form class="register" @submit="register">
        <h1>Sing up</h1>
        <input  type="text" class="input" placeholder="Username" v-model="username">
        <input  type="text" class="input" placeholder="Full Name" v-model="fullname">
        <input type="text" class="input" placeholder="E-mail" v-model="email">
        <input  type="password" class="input" placeholder="Password" data-type="password" v-model="password">
        <input type="password" class="input" placeholder="Repeat Password" data-type="password" v-model="cpass">
        <input type="submit" class="button" value="Sign Up">
    </form>

    <form class="forgot_password" @submit="forgot_password">
        <h1>Forgot password</h1>
        <input type="text" class="input" placeholder="E-mail" v-model="email">
        <input type="submit" class="button" value="Send email">
    </form>

</div>
       
</template>

<script>
import axios from "axios";
import Cookies from 'js-cookie';

export default {
    name: 'Auth',
    data() {
        return {
            username: '',
            fullname: '',
            email: '',
            password: '',
            cpass: '',
            error: ''
        }
    },

    methods: {
        async login(event) {
          event.preventDefault()
            axios.post('http://127.0.0.1:8000/api/login', {
                'email': this.username,
                'password': this.password
            })
            .then((response) => {
                console.log(response);
                Cookies.set('token', response.data.token);
                this.$router.push({path: '/'});
            }).catch((error) => {
                console.log(error.response.statusText);
                this.error = error.response.statusText;
            })
        },

        async register(event) {
            event.preventDefault();
            if (this.password === this.cpass) {

                axios.post('http://127.0.0.1:8000/api/auth/register', {
                'username':this.username,
                'email':this.email,
                'password':this.password,
                'password_confirmation':this.password,
                'full_name':this.fullname
                })
                .then((response) => {
                    console.log(response);
                    window.location.reload();
                })
                .catch((error) => {
                    this.error = error.response.statusText;
                })
            }else this.error = 'Password mismatch';
            // alert(this.error)
        },

        async forgot_password(event){
          event.preventDefault();
          axios.post('http://127.0.0.1:8000/api/forgot_password', {
            'email': this.email,
          })
          .then((response) => {
              alert('Check your email');
              window.location.reload();
              console.log(response);
          })
        }
    }


}
</script>

<style scoped>

.login, .register, .forgot_password{
    display: none;
    flex-direction: column;
}

#tab-1:checked ~ .login{
    display: flex;
}

#tab-2:checked ~ .register{
    display: flex;
}

#tab-3:checked ~ .forgot_password{
  display: flex;
}

h1, #tab-1, #tab-2, #tab-3, label{
    margin: 0 auto;
}

input[type="text"], input[type="email"], input[type="password"], input[type="submit"]{
  width: 25em;
  text-align: center;
  margin: 1em auto;

  padding: 0.1em;
  border: 1px solid black;
  background: blanchedalmond;
}

input[type="submit"]{
    background: green;
}

input[type="radio"]{
    opacity: 0%;
    margin: 5em 0 1em;
}

label{
    padding: 5px;
    border-radius: 15px;
}

input[type="radio"] ~label{
    background-color: rgb(255, 255, 255);
}

input[type="radio"]:checked +label{
    color: rgb(235, 233, 230);
    background-color: rgb(27, 27, 27, 0.9);
}

body{
    background-color: rgb(201, 201, 201);
}

*{
    box-sizing: border-box;
}

</style>