<template>
  <div class="ui comments">
      <div>
        <div class="box_Pos">
           <post-form posts="posts"></post-form>
        </div>
      </div>
      <br>
      <div class="ui inverted active dimmer" v-if="loading">
          <div class="ui text loader">Recuperation des posts ...</div>
      </div>
      <div v-bind:key="post.id" v-for="post in posts">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="#">
                                <div class="post-avatar"> <img :src="'/uploads/avatar/' + post.avatar" alt=""></div>
                                <span class="text-center">{{post.pseudo}}</span>
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <div class="pointer">
                                 <small class="pull-right date">{{post.created_at}}</small>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                       <div class="col-sm-10 col-lg-offset-1">
                        <div class="b_coment">
                            <div class="pointer-border">
                                    <p style="font-weight: bold">{{post.titre_post}}</p>
                                    <p style="text-align: justify; word-spacing: 3px">{{post.contenue_post}}</p>
                            </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="comment">
                        <comments model="Post" :id="post.id" :com="post.com"></comments>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import axios from 'axios'
    import comments from './comments.vue'
    import postForm from './posts/form'
    import store from "../store/store";
    import Vuex from "vuex";

    global.store = store;

    export default {
        data(){
           return {
               loading : true
           }
        },

        components: {comments, postForm},
        store,
        methods : {
            ...Vuex.mapActions([
               'getPosts'
                ])
        },

        computed: {
            ...Vuex.mapGetters([
             'posts'
        ])},

        mounted : function () {
          axios.get('/Post').then((Response)=> {
              this.loading = false;
              this.getPosts(Response.data)
         })
       },

    }
</script>
