<template>
  <div class="ui comments">
    <div class="ui inverted active dimmer" v-if="loading">
       <div class="ui text loader"> Recuperation des commentaires ... </div>
    </div>
    <comment :comment="comment"  v-bind:index="index"  v-bind:key="comment.id" v-for="(comment, index) in comments"></comment>
    <comment-form :id="id" :model="model" :reply="0"></comment-form>
  </div>
</template>

<script type="text/babel">

    import axios from 'axios'
    import comment from './comments/comment.vue'
    import commentForm from './comments/form.vue'
    import store from '../store/store'
    import Vuex from 'vuex'

    global.store = store;

    export default{
        store,
        components: {comment, commentForm},
        data(){
           return {
               comments: [],
               loading : true
           } 
        },
        // store,
        // vuex: {
        //   getters : {
        //      comments : (state) => state.comments
        //   },
        //   actions : {
             
        //   }
        // },
        props : { 
            id : Number,
            model: String
        },
        mounted : function () {
          axios.get('/Comment', {params: {id: this.id, type: this.model}}).then((Response)=> {
            this.comments = Response.data;
            this.loading = false
         })
       }
    }
</script>
