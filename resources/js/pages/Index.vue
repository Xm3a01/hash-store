<template>
    <div class="flex flex-col">
        <Header :cartItems ="products" :count ="count"/>
         <main>
            <div class="px-6 py-4">
                <div class="box pt-20 w-9/12 md:w-3/5 mx-auto">
                 <div class="box-wrapper">

                     <div>
                         <ul class="flex flex-row ">
                             <li class="ml-4"> <a  @click.prevent ="lastProducts()" href=""> الرئسيه</a></li>
                             <li class="ml-4"> <a  @click.prevent ="target = 'Cart'" href=""> السله</a></li>
                             <li class="ml-4"> <a  @click.prevent ="target = 'Cart'" href=""> المهام</a></li>
                             <li class="ml-4" v-for="category in categories" :key="category.id" ><a @click.prevent ="getCategoryProducts(category)" href="">{{category.name}}</a></li>
                         </ul>
                     </div>

                <div class=" bg-white rounded flex items-center w-full p-3 shadow-sm border border-gray-200">
                    <button @click="getImages()" class="outline-none focus:outline-none"><svg
                            class=" w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg></button>
                      <input type="search" name="" id="" @keydown.enter="getImages()" placeholder="البحث عن منتج"
                        v-model="search" x-model="q"
                        class="w-full px-4 outline-none focus:outline-none bg-transparent placeholder-gray-600 text-l">
                    <div class="select">
                    </div>
                </div>

            </div>
             </div>
                 <!-- Category section -->
                 <Category :products = "products" v-if="target == 'Category'"/>
                 
                <!-- Home Section -->
                 <Home :products = "products"  @countChange="countChange($event)" v-if="target == 'Home'"/>

                 <!-- Cart section -->
                 <Cart :items = "cartItems" v-if="target == 'Cart'"/>
            </div>
            <!-- /End replace -->
        </main>
    </div>
</template>
<script>
import Header from '../layouts/Header'
import Cart from './Cart'
import Home from './Home'
import Category from './Category'

export default {
    components:{
        Header,
        Home,
        Category,
        Cart
    },
    data() {
        return {
            categories:[],
            count:0,
            total:0,
            cartItems:0,
            cartShow: false,
            search: '',
            oneCategory: '',
            products: [],
            target: 'Home'
        }
    },
    mounted(){ 
        this.getItems();
        this.getProduct();
        this.lastProducts();
           console.log(this.categories.products)
       },
       computed :{
           searchProducts() {
            if (this.search) {
                return this.categories.products.filter(item => {
                    return item.name.toLowerCase().match(this.search.toLowerCase())
                })
            } else {
                return this.items
            }
        },
        
       },
        methods:{
            getProduct() {
                axios.get('/products').then(res =>{
                    this.categories = res.data.data
                    this.target = 'Category'
                    console.log(res.data.data)
                })
            },
             getItems() {
                 axios.get('/get-cartItems').then((res)=>{
                    this.cartItems = res.data.item;
                    this.count = res.data.count;
                    this.total = res.data.total;
                 });
            },

             cartAdd(id){
                axios.get('cart/'+id).then((res)=>{
                    this.cartItem = res.data.item;
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
                    this.items = res.data.items
                })
            },
            countChange(count) {
                this.count = count 
            },
            getCategoryProducts(category) {
                this.products = category.products
                this.target = "Category"
            },
            lastProducts() {
                axios.get('/last-products') .then(res =>{
                    this.products = res.data.products
                    this.target = 'Home' 
                }) .catch(err => {
                    console.log(err)
                })
            }
        }
}
</script>