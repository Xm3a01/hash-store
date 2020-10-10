<template>
<div>
   <Navbar :cart = "cart" :count ="count"/>
   <button @click.prevent="cartUpdate(i++)">Add</button>
</div>   
</template>

<script>
   import Navbar from '../components/include/Navbar'
    export default {
        components: {
            Navbar
        },

        data(){
            return{
                cart:[],
                count:0,
                i:0
            }
        },
         mounted(){
        this.cartUpdate();
       },
        methods:{
            cartUpdate(id = -1){
                axios.get('cart/'+id).then((res)=>{
                    this.cart = res.data.item;
                    this.count = res.data.count;
                }).catch((err)=>{
                    console.log(err)
                })
            }
        }
    }
</script>
