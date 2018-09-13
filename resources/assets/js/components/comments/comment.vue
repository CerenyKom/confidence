<template>
    <div>
            <div class="col-sm-2">
                    <a href="#">
                        <div class="avatar"><a href="#"> <img :src="'/uploads/avatar/'+ comment.avatar" alt=""> </a>
                        <span class="author">{{comment.pseudo}}</span>
                        </div>                           
                    </a>
            </div>
            <div class="col-sm-10">
                    <div class="pointer-border">
                        <div class="text" style="text-align: justify; word-spacing: 3px">{{comment.comment}}</div>  
                    </div>
            </div>
        <hr>
        <div class="actions">
            <a href="#" @click.prevent="reply_to()">Répondre</a>
        </div>
        <div class="row comments">
            <div class="col-md-1"></div>
            <div class="col-md-11">
                  <comment :comment="reponse"  v-bind:index="index"  v-bind:key="reponse.id" v-for="(reponse, index) in comment.replies"></comment>
                  <comment-form :id="comment.post_id" :model="comment.post_type" :reply="comment.id" v-if="comment.reponse === 1"></comment-form>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">

import commentForm from './form.vue'

export default {
    name: 'comment',
    components: {
        commentForm
    },
    computed: {
        form_visible : function () {
            return this.reply === this.comment.id
        },
    },
    methods: {
        reply_to : function () {
            this.comment.reponse = 0
        }
    },
    props: {
        comment: Object,
    }
}
</script>
