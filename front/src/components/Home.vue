<template>
    <div>
        <h1>home</h1>
        <h1>[eqyz</h1>
    </div>
</template>

<script>

import axios from "axios";

export default {
    name: 'Home',
    data() {
        return {
            events: [],
            
        }
    },
     mounted(){
        axios.get('http://127.0.0.1:8000/api/events')
        .then((response) => { 
        this.events = response.data;
        console.log(this.events);
        })
    },
    methods: {

    }
}
</script>