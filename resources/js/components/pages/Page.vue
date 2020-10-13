<template>
<div>
   <Navbar :cart = "cart" :count ="count"/>
   <button @click.prevent="cartAdd(i+=1)">Add</button> <br>
   <button @click.prevent="clear(i+=1)">delete all</button> <br> <br>
   <button @click.prevent="showCart()">{{cartShow ? 'Back' : 'Show'}}</button> <br> <br>
   <Cart :cartItems = "cart" :total ="total" v-if="cartShow"/>
</div>   
</template>

<script>
   import Navbar from '../include/Navbar'
   import Cart from '../pages/Cart'
    export default {
        components: {
            Navbar,
            Cart
        },

        data(){
            return{
                cart:[],
                count:0,
                i:0,
                total:0,
                cartShow:false

            }
        },
         mounted(){
           this.getItems();
       },
        methods:{
             getItems() {
                 axios.get('/get-cartItems').then((res)=>{
                    this.cart = res.data.item;
                    this.count = res.data.count;
                    this.total = res.data.total;
                 });
            },
            cartAdd(id){
                axios.get('cart/'+id).then((res)=>{
                    this.cart = res.data.item;
                    this.count = res.data.count;
                    this.total = res.data.total;
                }).catch((err)=>{
                    console.log(err)
                })
            },
            showCart() {
                if(this.cartShow == false) {
                    this.cartShow = true;
                } else {
                    this.cartShow = false;
                }
            },
            clear() {
                axios.get('/cart-delete-all').then((res)=>{
                    this.cart = res.data.items
                })
            }
        }
    }
</script>
