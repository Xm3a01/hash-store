<template>
  <!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i>  </a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Al Siteen St, Khartoum, Sudan </a></li>
					</ul>
					<ul class="header-links pull-right" v-if="user">
						<li><a href="#"><i ></i> {{user.name}} </a></li>
						<li><a href="#"><i ></i> <img  :src="user.avatar" alt="" class="avatar"> </a></li>
					</ul>

					<ul class="header-links pull-right" v-if="!user">
						<li><a href="/login"><i ></i> Login </a></li>
						<li><a href="/register"><i ></i> Register </a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="/" class="logo">
									<img src="/vendor/website/img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select" v-model="selectedcategory">
										<option value=""> Categories</option>
										<option v-for="category in categories" :key="category.id" :value="category.id">{{category.name}}</option>
									</select>
									<input class="input" placeholder="Search here" v-model="search" >
									<div style="background:#fff" v-if="searchProducts">
										<span v-for="product in searchProducts" :key="product.id">
											{{product.name + ' - ' + product.price}} 
										</span>
									</div>
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a href="#" @click.prevent="getItems" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" >
										<i class="fa fa-shopping-cart"></i>
										<span> Cart</span>
										<div class="qty">{{count ? count :cartIndc}}</div>
									</a>

								<!-- Menu Toogle -->
								  <div class="dropdown-menu" style="padding:10px">
									<a v-for="item in items" :key="item.id" :href="`/show-cartItem/`+item.id">
										<div>
										 <i class="fa fa-bars"></i>
										  <span>{{item.name}}</span>	
										</div>
										<span>{{item.price}}</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
		  </div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
</template>
<script>
export default {
    props:['count' , 'categories' , 'products' , 'cartIndc' ],
    data() {
        return {
			selectedcategory: '',
			search:'',
			items: '',
			user: []
        }
	},

	mounted() {
		this.getUser();
		// console.log(1)
	},

	computed :{

        searchProducts() {
            if (this.search) {
                return  this.products.filter((item) => {
                    return (item.name.toLowerCase().match(this.search.toLowerCase()) && item.category_id == this.selectedcategory)
				});
		 }
	   },

	   
    },
	
  methods: {
	//   getProducts(){
	// 	  axios.get('website-products').then(res =>{
	// 		  this.products = res.data
	// 		  console.log(res.data)
	// 	  });
	//   },
      getItems() {
		 axios.get('/get-cartItems').then((res)=>{
			this.items =  res.data.item
	     });
	  },
	  
	  getUser() {
		 axios.get('/authuser').then((res)=>{
			this.user =  res.data.user
		    // console.log(res.data)
		 });
		 
      },
	   
  }
}
</script>


<style>
  .avatar {
	  width: 35px;
	  height: 35px;
	  border-radius: 50%;
	  border:2px solid #b62828;
	  overflow: hidden;
  }
</style>