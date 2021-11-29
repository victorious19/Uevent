<template>
  <v-app>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <Nav />
    <router-view />
  </v-app>
</template>

<script>
import Nav from '../src/components/Nav'

export default {
  name: 'App',
  components: {
    Nav
  }

};
</script>
