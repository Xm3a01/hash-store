
<template>
    <app-layout :count ="count" :products ="products" :categories="categories" :cartIndc ="cartIndc" :target = "target">

       	<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Contact Us</h3>
							</div>
							
							<div class="form-group">
								<input class="input" type="text" name="name" placeholder=" Name">
							</div>
							
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="password" name="pass" placeholder="Subject">
							</div>
							<div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="4" placeholder="Enter Message" Required></textarea>
                            </div>
							
						</div>
						
							
						</div>
						<!-- /Shiping Details -->
					</div>

					<!-- Order Details -->
					
						
						<a href="#" class="primary-btn order-submit">Send</a>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
    </app-layout>
</template>
<script>
import App from '../layouts/App'

export default {
    components:{
        'app-layout' : App,
	},
    data() {
        return {
            categories:[],
            lastproducts:[],
            count:0,
            lastcategories:[],
            search: '',
            oneCategory: '',
            products: [],
            target: 'Contact',
            cartIndc:''
        }
    },
    mounted(){ 
        this.getItems();
        this.getProduct();
        // this.lastProducts();
        // this.lastCategories();
        this.getCategory();
           
       },
       computed :{
           searchProducts() {
            if (this.search) {
                return this.categories.products.filter(item => {
                    return (item.name.toLowerCase().match(this.search.toLowerCase()) && item.category_id == this.search)
                });
            // } else {
            //     return this.items
            }
        }
       },
        methods:{
            getProduct() {
                axios.get('/website-products').then(res =>{
                    this.products = res.data.products
                    // console.log(res.data)
                })
            },
            getCategory() {
                axios.get('/website-categories').then(res =>{
                    this.categories = res.data.categories
                    // console.log(res.data.categories)
                })
            },

            getItems() {
                axios.get('/get-cartItems').then((res)=>{
                    this.items =  res.data.item
                    this.cartIndc = res.data.count
                });
      },
            
    }
    }
</script>