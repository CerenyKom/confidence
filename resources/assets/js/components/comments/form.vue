<template>
    <div>
        <form action="">
          <div class="form-group ">
              <label>  <h4 class="ui header">{{reply == 0 ? 'Commenter' : 'Repondre'}}</h4> </label>
               <textarea class="form-control" placeholder="Votre commentaire" v-model="containt" id="" cols="30" rows="1"></textarea>
          </div>
        </form>
    </div>
</template>

<script>
export default {
    data (){
     return  {
         containt: ''
     } 
    },

    props: {
        id: Number,
        model: String,
        reply: Number , 
        default: 0
    }
}
</script>

