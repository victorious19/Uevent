<template>
    <div>
        <div v-for="event in events" :key="event.id">
    <!-- <v-card
      class="mx-auto"
      max-width="344"
      outlined
    >
      <v-list-item three-line>
        <v-list-item-content>
          <div class="text-overline mb-4">
            OVERLINE
          </div>
          <v-list-item-title class="text-h5 mb-1">
            Headline 5
          </v-list-item-title>
          <v-list-item-subtitle>{{event.location}}</v-list-item-subtitle>
        </v-list-item-content>
  
        <v-list-item-avatar
          tile
          size="80"
          color="grey"
        ></v-list-item-avatar>
      </v-list-item>
  
      <v-card-actions>
        <v-btn
          outlined
          rounded
          text
        >
          Button
        </v-btn>
      </v-card-actions>
    </v-card> -->

    <!--  -->

    <v-card
      class="mx-auto mb-4"
      max-width="640"
    >
      <v-card-text>
        <div>Word of the Day</div>
        <p class="text-h4 text--primary">
          "name"
          <img src="" alt="{event.poster}">
        </p>
        <p>{{event.format}}</p>
        <div class="text--primary">
         {{event.description}}
        </div>
        <div class="text">
            {{event.date}}
        </div>
      </v-card-text>
      <v-card-actions>
        <v-btn
          text
          color="deep-purple accent-4"
        >
          Learn More
        </v-btn>
      </v-card-actions>
    </v-card>

        </div>

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