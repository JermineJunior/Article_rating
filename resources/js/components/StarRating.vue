<template>
    <form method="POST" class="text-left" @change="recordRating">
        <div class="rating py-3 ">
            <input type="radio" id="star5" name="rating" value="5" v-model="rating" /><label for="star5"></label>
            <input type="radio" id="star4" name="rating" value="4" v-model="rating" /><label for="star4"></label>
            <input type="radio" id="star3" name="rating" value="3" v-model="rating" /><label for="star3"></label>
            <input type="radio" id="star2" name="rating" value="2" v-model="rating" /><label for="star2"></label>
            <input type="radio" id="star1" name="rating" value="1" v-model="rating" /><label for="star1"></label>
        </div>
    </form>
</template>

<script>
    export default {
        name: "StarRating.vue",
        props:['initial'],
        data(){
            return{
                rating:this.initial,
            }
        },
        methods:{
            recordRating(){
                 axios.post(this.$el.action,{rating:this.rating});
            }
        }
    }
</script>

<style>


</style>
