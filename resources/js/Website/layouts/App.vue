<template>
<div>
<!-- Header section -->
    <Header :categories = "categories" :count ="count" :products="products" :cartIndc = "cartIndc" />

    <!-- navbar section -->
    <Navbar :target ="target" />

    <slot></slot>

    <!-- Footer section -->
    <Footer />
     
</div>
</template>

<script>

import Header from '../Include/Header'
import Footer from '../Include/Footer'
import Navbar from '../Include/Navbar'

export default {
    components:{Header , Navbar , Footer},
    props:['items' , 'count' , 'cartIndc' , 'categories' , 'products' , 'target'],
    data(){
        return {
            cartItem: [],
        }
    },

    mounted() {
        // console.log(target)
    },

    methods :{
       
    }

      
}
</script>