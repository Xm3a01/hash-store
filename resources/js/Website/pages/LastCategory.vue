<template>
  <div class="section">
    <!-- container -->
    <div class="container">
      <div class="col-md-12">
        <div class="section-title">
          <h3 class="title">Last Categories</h3>
        </div>
      </div>

      <!-- row -->
      <div class="row">
        <!-- shop -->
        <div
          class="col-md-4 col-xs-6"
          v-for="product in products"
          :key="product.id"
        >
          <div class="shop">
            <div class="shop-img">
              <img :src="product.image" alt="" />
            </div>
            <div class="shop-body">
              <h3>{{ product.name }}</h3>
              <a href="/products" class="cta-btn"
                >Shop now <i class="fa fa-arrow-circle-right"></i
              ></a>
            </div>
          </div>
        </div>
        <!-- /shop -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
</template>

<script>
export default {
  props: ["products"],
  data() {
    return {};
  },
};
</script>

<style>
.shop-img img {
    width: 360.02px;
    height: 202.51px;
}
</style>
