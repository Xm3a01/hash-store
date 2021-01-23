<template>
  <!-- HEADER -->
  <header>
    <!-- TOP HEADER -->
    <div id="top-header">
      <div class="container">
        <ul class="header-links pull-left">
          <li>
            <a href="#"><i class="fa fa-phone"></i> </a>
          </li>
          <li>
            <a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a>
          </li>
          <li>
            <a href="#"
              ><i class="fa fa-map-marker"></i> Al Siteen St, Khartoum, Sudan
            </a>
          </li>
        </ul>
        <ul class="header-links pull-right" v-if="user">
          <li class="dropdown">
            <a href="#" data-toggle="dropdown">
              {{ user.name }} <i></i>
              <img :src="user.avatar" alt="" class="avatar" />
            </a>
            <div class="cart-dropdown" style="border-radius: 5px; width: 150px">
              <div class="row">
                <div class="col-md-12">
                  <a style="color: #333" href=""> <h5>Profile</h5> </a>
                </div>
                <div class="col-md-12 cart-summary">
                  <a style="color: #333" href="/signOut"><h5>Logout</h5> </a>
                </div>
              </div>
            </div>
          </li>
         
        </ul>

        <ul class="header-links pull-right" v-if="!user">
          <li class="dropdown">
            <a
              href="#"
              data-toggle="dropdown"
              style="border: 1px solid red; padding: 3px; border-radius: 5px"
              ><i></i> SIGN IN
            </a>
            <div class="cart-dropdown" style="border-radius: 5px">
              <div style="text-align: center">
                <h5 style="border-bottom: 1px solid red; padding: 2px">
                  LOGIN
                </h5>
              </div>
              <form @submit.prevent="sign" style="margin-top: 30px">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    v-model="form.email"
                    placeholder="example@email.com"
                  />
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    v-model="form.password"
                    placeholder="Password"
                  />
                </div>
                <div class="form-group">
                  Create new account
                  <a href="/register" style="color: blue">SIGN UP</a>
                </div>
                <button class="btn btn-danger">SIGN IN</button>
              </form>
            </div>
          </li>
          <!-- <li>
            <a href="/register"><i></i> Register </a>
          </li> -->
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
                <h2 style="margin-top: 15px; color: white">
                  Hash<span style="color: red">zo</span>.
                </h2>
              </a>
            </div>
          </div>
          <!-- /LOGO -->

          <!-- SEARCH BAR -->
          <div class="col-md-6">
            <div class="header-search">
              <div class="dropdown col-sm-12" :class="search ? `open` : ''">
                <input
                  class="input"
                  placeholder="Search"
                  v-model="search"
                  data-toggle="dropdown"
                />
                <div class="cart-dropdown search-item">
                  <span v-if="!searchProducts" class="text-sm"
                    >No items found</span
                  >
                  <div
                    class="cart"
                    v-for="product in searchProducts"
                    :key="product.id"
                  >
                    <div class="product-widget">
                      <div class="product-img">
                        <img :src="product.image" alt="" />
                      </div>
                      <div class="product-body">
                        <h3 class="product-name">
                          <a :href="`/products/` + product.id">{{
                            product.name
                          }}</a>
                        </h3>
                        <h4 class="product-price">{{ product.price }}</h4>
                      </div>
                      <!-- <button class="delete" @click.prevent="deleteItem(item.id , product.quantity)"><i class="fa fa-close"></i></button> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /SEARCH BAR -->

          <!-- ACCOUNT -->
          <div class="col-md-3 clearfix">
            <div class="header-ctn">
              <!-- Wishlist -->
              <div></div>
              <!-- /Wishlist -->
              <!-- Cart -->
              <div class="dropdown">
                <a
                  href="#"
                  @click.prevent="getItems"
                  data-toggle="dropdown"
                  aria-expanded="true"
                >
                  <i class="fa fa-shopping-cart"></i>
                  <span> Cart</span>
                  <div class="qty">{{ count ? count : cartIndc }}</div>
                </a>

                <div class="cart-dropdown" v-if="count > 0 || cartIndc > 0">
                  <div class="cart-list" v-for="item in items" :key="item.id">
                    <div class="product-widget">
                      <div class="product-img">
                        <img :src="item.associatedModel.images[0]" alt="" />
                      </div>
                      <div class="product-body">
                        <h3 class="product-name">
                          <a :href="`/show-cartItem/` + item.id">{{
                            item.name
                          }}</a>
                        </h3>
                        <h4 class="product-price">
                          <span class="qty">{{ item.quantity }}</span
                          >{{ item.price }}
                        </h4>
                      </div>
                      <button
                        class="delete"
                        @click.prevent="deleteItem(item.id, item.quantity)"
                      >
                        <i class="fa fa-close"></i>
                      </button>
                    </div>
                  </div>
                  <div class="cart-summary">
                    <small>total item : {{ count ? count : cartIndc }}</small>
                    <h5>SUBTOTAL: {{ total }}</h5>
                  </div>
                  <div class="cart-btns">
                    <a href="#" @click.prevent="cartDeleteAll">Delete All</a>
                    <a href="#">Checkout </a>
                  </div>
                </div>
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
  props: ["count"],
  data() {
    return {
      _count: this.count,
      selectedcategory: "",
      search: "",
      items: [],
      user: [],
      total: "",
      products: [],
      cartIndc: 0,
      form: {},
    };
  },

  mounted() {
    this.getUser();
    this.getProduct();
    this.cartUpdate();
    console.log(this.search);
  },

  computed: {
    searchProducts() {
      if (this.search) {
        return this.products.filter((item) => {
          return item.name.toLowerCase().match(this.search.toLowerCase());
        });
      }
    },
  },

  methods: {
    deleteItem(id, quantity) {
      var result = confirm("Want to delete?");
      if (result) {
        axios
          .get("/cart-delete?id=" + id)
          .then((res) => {
            this.cartUpdate();
            this.count = 0;
          })
          .catch((ress) => {
            console.log(ress);
          });
      }
    },

    cartDeleteAll() {
      var result = confirm("Want to delete?");
      if (result) {
        axios.get("/cart-delete-all").then((res) => {
          this.cartIndc = 0;
          this.count = 0;
        });
      }
    },

    getProduct() {
      axios.get("/website-products").then((res) => {
        this.products = res.data.products;
        // console.log(res.data)
      });
    },
    getItems() {
      axios.get("/get-cartItems").then((res) => {
        this.items = res.data.item;
        this.total = res.data.total;
      });
    },

    cartUpdate() {
      axios.get("/get-cartItems").then((res) => {
        this.cartIndc = res.data.count;
      });
    },

    getUser() {
      axios.get("/authuser").then((res) => {
        this.user = res.data.user;
        // console.log(res.data)
      });
    },
    sign() {
      axios.post("/login", this.form).then((res) => {
        location.reload();
      });
    },
  },
};
</script>


<style>
.avatar {
  width: 35px;
  height: 35px;
  border-radius: 50%;
  border: 2px solid #b62828;
  overflow: hidden;
}

.header-search .input {
  border-radius: 40px 40px 40px 40px;
  outline: hidden;
  outline-width: 0;
}
.search-item {
  width: 496px;
  margin-right: 31px;
}
</style>


