<template>
  <app-layout :count="count" :target="target">
    <!-- Category section -->
    <Category :products="lastcategories" />

    <!-- Home Section -->
    <Home
      :products="lastproducts"
      @countChange="countChange($event)"
      :ads="ads"
    />
  </app-layout>
</template>
<script>
import App from "../layouts/App";
import Home from "./Home";
import Category from "./LastCategory";

export default {
  components: {
    "app-layout": App,
    Home,
    Category,
  },
  props: ["ads"],
  data() {
    return {
      categories: [],
      lastproducts: [],
      count: 0,
      lastcategories: [],
      search: "",
      oneCategory: "",
      products: [],
      target: "Home",
      cartIndc: "",
    };
  },
  mounted() {
    // this.getProduct();
    this.lastProducts();
    this.lastCategories();
  },
  
  methods: {
    getProduct() {
      axios.get("/website-products").then((res) => {
        this.products = res.data.products;
        // console.log(res.data)
      });
    },
    getCategory() {
      axios.get("/website-categories").then((res) => {
        this.categories = res.data.categories;
        // console.log(res.data.categories)
      });
    },

    countChange(count) {
      this.count = count[0];
      this.cartItem = count[1];
    },
    lastProducts() {
      axios
        .get("/last-products")
        .then((res) => {
          this.lastproducts = res.data.products;
          this.target = "Home";
          // console.log(res.data.products)
        })
        .catch((err) => {
          console.log(err);
        });
    },
    lastCategories() {
      axios
        .get("/last-categories")
        .then((res) => {
          this.lastcategories = res.data.categories;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>