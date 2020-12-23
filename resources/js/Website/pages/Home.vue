<template>

<div class="section">
			<!-- container -->
        <div class="container">
            <!-- row -->
            <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                    
                    </div>
                </div>
                <!-- /section title -->
              <div class="row">
                  <div class="col-md-3" v-for="product in products" :key="product.id">
                    <div class="product">
                        <div class="product-img">
                            <img :src="product.image" alt="">
                            <div class="product-label">
                                <span class="sale">{{product.disCount == 0 ? '': '%'+Math.floor((product.disCount / product.price) * 100)}}</span>
                                <span class="new">NEW</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{product.name}}</p>
                            <h3 class="product-name"><a href="#">{{product.description}}</a></h3>
                            <h4 class="product-price">{{product.price - product.disCount}}<del class="product-old-price">{{product.disCount == 0 ? 0: product.price}}</del></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-btns">
                      </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn" @click.prevent="cartAdd(product.id)"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                    <!-- col -->
                    </div>
                 <!-- /row -->
                </div>
        </div>
        <!-- /container -->
    </div>
</template>

<script>

// import VueSlickCarousel from 'vue-slick-carousel'
// import 'vue-slick-carousel/dist/vue-slick-carousel.css'
//   // optional style for arrows & dots
// import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

export default {
    // components: {
    //     VueSlickCarousel
    // },
    props:['products'],
    data() {
        return {
            cartItems :'',
            count :'',
            total :'',
            // settings: {
            //     "arrows": false,
            //     "dots": true,
            //     "infinite": true,
            //     "slidesToShow": 3,
            //     "slidesToScroll": 1,
            //     "autoplay": true,
            //     "speed": 2000,
            //     "autoplaySpeed": 2000,
            //     "cssEase": "linear"
            //   }
        }
    },
    mounted(){
        // console.log(this.products)
    },
    methods:{
        cartAdd(id){
            axios.get('cart/'+id).then((res)=>{
                this.cartItem = res.data.item;
                this.count = res.data.count;
                this.total = res.data.total;
                this.$emit('countChange' , [this.count , this.cartItem]);
            }).catch((err)=>{
                console.log(err)
            })
        },
    }
}
</script>

<style>
</style>