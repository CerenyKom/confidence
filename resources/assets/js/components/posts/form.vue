<template>
    <form action="" >
        <input type="text" class="form-control" v-model="post_title" placeholder="titre">
        <textarea v-model="post_content" id="" cols="90" rows="3" class="form-control" placeholder="Exprime toi...!"></textarea>
        <div class="element">
            <button type="button" class="btn-default"> <i class="fa fa-camera"></i></button>
            <button type="button" class="btn-default"> <i class="fa fa-video-camera"></i></button>
            <button type="button" class="btn-default"> <i class="fa fa-microphone"></i></button>
            <button type="submit" class="btn-default pull-right"> <i class="fa fa-send"></i>Envoyer</button>
        </div>
    </form>
</template>

<script>
    export default {
        data(){
            return {
                post_title : '',
                post_content : ''
            }
        }
    }
</script>
