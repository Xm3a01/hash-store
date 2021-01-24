<template>
  <div>
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
          <div
            class="col-md-3 col-sm-3"
            v-for="product in products"
            :key="product.id"
          >
            <div class="product">
              <a :href="`/products/` + product.id">
                <div class="product-img">
                  <img :src="product.image" alt="" height="150" width="100" />
                  <div class="product-label">
                    <span class="sale">{{
                      product.disCount == 0
                        ? ""
                        : "%" +
                          Math.floor((product.disCount / product.price) * 100)
                    }}</span>
                    <span class="new">NEW</span>
                  </div>
                </div>
                <div class="product-body">
                  <p class="product-category">{{ product.category.name }}</p>
                  <h3 class="product-name">
                    <a href="#">{{ product.name }}</a>
                  </h3>
                  <h4 class="product-price">
                    {{ product.price - product.disCount
                    }}<del class="product-old-price">{{
                      product.disCount == 0 ? 0 : product.price
                    }}</del>
                  </h4>
                  <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                  <div class="product-btns"></div>
                </div>
                <div class="add-to-cart">
                  <button
                    class="add-to-cart-btn"
                    @click.prevent="cartAdd(product.id)"
                  >
                    <i class="fa fa-shopping-cart"></i> add to cart
                  </button>
                </div>
              </a>
            </div>
            <!-- col -->
          </div>
          <!-- /row -->
        </div>
      </div>
    </div>
    <div class="section" style="min-height: 400px; background: #ccc">
      <div class="container">
        <div class="col-md-12">
          <div class="section-title">
            <h3 class="title">Ads Area</h3>
          </div>
        </div>
        <div class="row" v-if="ads[0] != null">
          <div class="col-md-5 col-sm-2">
            <img class="ads-image" :src="ads[0].image" alt="" height="250" />
          </div>
          <div class="col-md-6 col-sm-4">
            <h4>{{ ads[0].title }}<span style="color: red"></span></h4>
            <p>{{ ads[0].description }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <!-- container -->
      <div class="container">
        <div class="col-md-12">
          <div class="section-title">
            <h3 class="title">Best selling</h3>
          </div>
        </div>
        <!-- /section title -->
        <div class="row">
          <div class="col-md-3" v-for="order in orders" :key="order.id">
            <div class="product">
              <a :href="`/products/` + order.product.id">
                <div class="product-img">
                  <img :src="order.product.image" alt="" />
                  <div class="product-label">
                    <span class="sale">{{
                      order.product.disCount == 0
                        ? ""
                        : "%" +
                          Math.floor(
                            (order.product.disCount / order.product.price) * 100
                          )
                    }}</span>
                    <span class="new">Best</span>
                  </div>
                </div>
                <div class="product-body">
                  <p class="product-category">{{ order.product.category.name }}</p>
                  <h3 class="product-name">
                    <a href="#">{{ order.product.name }}</a>
                  </h3>
                  <h4 class="product-price">
                    {{ order.product.price - order.product.disCount
                    }}<del class="product-old-price">{{
                      order.product.disCount == 0 ? 0 : order.product.price
                    }}</del>
                  </h4>
                  <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                  <div class="product-btns"></div>
                </div>
                <div class="add-to-cart">
                  <button
                    class="add-to-cart-btn"
                    @click.prevent="cartAdd(order.product.id)"
                  >
                    <i class="fa fa-shopping-cart"></i> add to cart
                  </button>
                </div>
              </a>
            </div>
            <!-- col -->
          </div>
          <!-- /row -->
        </div>
      </div>
      <!-- /container -->
    </div>
  </div>
</template>

<script>
export default {
  props: ["products", "ads"],
  data() {
    return {
      cartItems: "",
      count: "",
      total: "",
      orders: [],
    };
  },
  mounted() {
    // console.log(this.products)
    this.bestSelling();
  },
  methods: {
    cartAdd(id) {
      axios
        .get("cart/" + id)
        .then((res) => {
          this.cartItem = res.data.item;
          this.count = res.data.count;
          this.total = res.data.total;
          this.$emit("countChange", [this.count, this.cartItem]);
        })
        .catch((err) => {
          console.log(err);
        });
    },

    bestSelling() {
      axios.get("best-sels").then((res) => {
        this.orders = res.data;
      });
    },
  },
};
</script>

<style>
.ads-image {
  border-radius: 5px;
  box-shadow: 3px 4px 3px rgba(0, 0, 0, 0.212);
}
.product {
  border-radius: 5px 5px 0 0px;
  /* overflow-y: hidden; */
  box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.212);
}

.product img {
  border-radius: 5px 5px 0 0px;
}
</style>