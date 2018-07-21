<template>
    <form action="" @submit.prevent="addPostL" style="postion: relative;">
        <div class="ui inverted active dimmer" v-if="loading">
            <div class="ui text loader">Chargement ...</div>
        </div>

        <div class="form-group" :class="{error: errors.post_title}">
            <input type="text" class="form-control" v-model="post_title" placeholder="titre" required autofocus>
        </div>
        <div class="form-group" :class="{error: errors.post_content}">
            <textarea v-model="post_content" id="" cols="90" rows="3" class="form-control" placeholder="Exprime toi...!"></textarea>
        </div>
        <div class="element">
            <button type="button" class="btn-default"> <i class="fa fa-camera"></i></button>
            <button type="button" class="btn-default"> <i class="fa fa-video-camera"></i></button>
            <button type="button" class="btn-default"> <i class="fa fa-microphone"></i></button>
            <button type="submit" class="btn-default pull-right"> <i class="fa fa-send"></i>Envoyer</button>
        </div>
    </form>
</template>

<script>
    import axios from 'axios'
    import store from "../../store/store";
    import Vuex from "vuex";
    export default {
        store,
        data(){
            return {
                post_title : '',
                post_content : '',
                loading : false,
                errors : {}
            }
        },

        methods : {
            ...Vuex.mapActions([
                'addPosts'
            ]),

            addPostL : function () {
                axios.post('/Post', { titre_post : this.post_title, contenue_post : this.post_content }).then((Response)=> {
                    this.loading = true;
                    this.addPosts(Response.data);
                }).catch((Response)=> {
                     this.error = Response.data;
                }).then(()=> {
                    this.loading = false
                })
            }
        }
    }
</script>
