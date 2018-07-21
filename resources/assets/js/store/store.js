import Vuex from 'vuex'

import Vue from 'vue'

Vue.use(Vuex);

export const state = {
    comments : [],
    posts: []
};

export const getters = {
    comments : (state) => state.comments,
    posts : (state) => state.posts
};


export const mutations = {
    ADD_COMMENTS (state, comments) {
       state.comments.push(...comments)
    },
  
    ADD_COMMENT (state, comment) {
        if(comment.reponse){
           let c = state.comment.find((c) => c.id === comment.reponse);
           if(c.replies === undefined){
               c.replies = []
           }
           c.replies.push(comment)
        }else{
          state.comments.push(comment)  
        }
       
    },

    ADD_POSTS (state, posts) {
        state.posts.push(...posts)
    },

    ADD_POST (state, posts) {
        state.posts.unshift(posts)
    },
  
    DELETE_COMMENT (state, comment) {
        if(comment.reponse){
          let parent = state.comment.find((c) => c.id === comment.reponse);
          let index = parent.replies.findIndex((c) => c.id === comment.id);
          parent.replies.splice(index, 1)
        }else{
         let index = state.comments.findIndex((c) => c.id === comment.id);
         state.comments.splice(index, 1)
        }
   
    }
  };

export const actions = {
    getPosts : function(store, posts){
        store.commit('ADD_POSTS', posts)
    },

    getComments : function(store, comments){
        store.commit('ADD_COMMENTS', comments)
    },


    addComments : function(store, comments){
        store.commit('ADD_COMMENT', comments)
    },

    addPosts: function(store, posts){
           store.commit('ADD_POST', posts)
    }
};

export default new Vuex.Store({
    state: state,
    mutations: mutations,
    getters: getters,
    actions: actions
})