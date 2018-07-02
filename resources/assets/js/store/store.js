import Vuex from 'vuex'
import Vue from 'vue'
Vue.use(Vuex);
export const state = {
    comments : []
}

export const getters = {
    comments : (state) => state.comments
}

export const mutations = {
    ADD_COMMENTS (state, comments) {
       state.comments.push(...comments)
    },
  
    ADD_COMMENT (state, comment) {
        if(comment.reponse){
           let c = state.comment.find((c) => c.id === comment.reponse)
           if(c.replies === undefined){
               c.replies = []
           }
           c.replies.push(comment)
        }else{
          state.comments.push(comment)  
        }
       
    },
  
    DELETE_COMMENT (state, comment) {
        if(comment.reponse){
          let parent = state.comment.find((c) => c.id === comment.reponse)
          let index = parent.replies.findIndex((c) => c.id === comment.id)
          parent.replies.splice(index, 1)
        }else{
         let index = state.comments.findIndex((c) => c.id === comment.id)
         state.comments.splice(index, 1)
        }
   
    }
  }


export default new Vuex.Store({
    state: state,
    getters: getters,
    mutations: mutations
})