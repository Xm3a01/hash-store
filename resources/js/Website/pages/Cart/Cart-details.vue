<template>
  <app-layout :count="count">
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <!-- Product main img -->
          <div class="col-md-5 col-md-push-2">
            <div id="product-main-img">
              <div class="product-preview image-rdadius">
                <img
                  :src="preview ? preview : item.associatedModel.images[0]"
                  alt=""
                />
              </div>

              <div class="product-preview">
                <img :src="item.attributes" alt="" />
              </div>
            </div>
          </div>
          <!-- /Product main img -->

          <!-- Product thumb imgs -->
          <div class="col-md-2 col-md-pull-5">
            <div
              id="product-imgs" class="image-content"
              v-for="(image, index) in item.associatedModel.images"
              :key="index"
            >
              <div class="product-preview image-rdadius" :style="preview == image ? `border:none` : ``">
                <img
                  :src="image"
                  alt=""
                  @mouseover.prevent="previewProduct(image)"
                />
              </div>
            </div>
          </div>
          <!-- /Product thumb imgs -->

          <!-- Product details -->
          <div class="col-md-5">
            <div class="product-details">
              <h2 class="product-name">{{ item.name }}</h2>
              <div></div>
              <div>
                <h3 class="product-price">
                  {{
                    Math.abs(
                      item.price * quantity - item.associatedModel.disCount
                    )
                  }}
                  <del class="product-old-price">{{
                    item.associatedModel.disCount == 0 ? 0 : item.price
                  }}</del>
                </h3>
                <span class="product-available">
                  {{
                    item.associatedModel.productAmout != 0
                      ? "In Stock"
                      : "Empty"
                  }}
                </span>
              </div>
              <p>{{ item.associatedModel.description }}</p>

              <div class="product-options">
                <label> </label>
                <label class="row">
                  <div class="col-md-8">Color</div>

                  <div
                    class="col-md-4"
                    :style="
                      `height : 15px; width:10px; border-radius:5px; background:` +
                      item.associatedModel.color
                    "
                  ></div>
                </label>
              </div>

              <div class="add-to-cart">
                <div class="qty-label">
                  Qty
                  <div class="input-number">
                    <input type="number" v-model="quantity" />
                    <span @click="quantity++" class="qty-up">+</span>
                    <span @click="quantity--" class="qty-down">-</span>
                  </div>
                </div>
                <button @click="updateCart(item.id)" class="add-to-cart-btn">
                  <i class="fa fa-shopping-cart"></i> add to cart
                </button>
              </div>

              <ul class="product-btns"></ul>

              <ul class="product-links">
                <!-- <li>Category:</li> -->
              </ul>

              <ul class="product-links">
                <li>Share:</li>
                <li>
                  <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-google-plus"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-envelope"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /Product details -->

          <!-- Product tab -->
          <div class="col-md-12">
            <div id="product-tab">
              <!-- product tab nav -->
              <ul class="tab-nav">
                <li class="active">
                  <a data-toggle="tab" href="#tab1">Description</a>
                </li>
              </ul>
              <!-- /product tab nav -->

              <!-- product tab content -->
              <div class="tab-content">
                <!-- tab1  -->
                <div id="tab1" class="tab-pane fade in active">
                  <div class="row">
                    <div class="col-md-12">
                      <p>{{ item.associatedModel.description }}</p>
                    </div>
                  </div>
                </div>
                <!-- /tab1  -->

                <!-- tab2  -->
                <div id="tab2" class="tab-pane fade in">
                  <div class="row">
                    <div class="col-md-12">
                      <p>discreption</p>
                    </div>
                  </div>
                </div>
                <!-- /tab2  -->

                <!-- tab3  -->
                <div id="tab3" class="tab-pane fade in">
                  <div class="row">
                    <!-- Rating -->

                    <!-- /Rating -->

                    <!-- Reviews -->

                    <!-- Review Form -->
                    <div class="col-md-3">
                      <div id="review-form">
                        <form class="review-form">
                          <input
                            class="input"
                            type="text"
                            placeholder="Your Name"
                          />
                          <input
                            class="input"
                            type="email"
                            placeholder="Your Email"
                          />
                          <textarea
                            class="input"
                            placeholder="Your Review"
                          ></textarea>
                          <div class="input-rating">
                            <span>Your Rating: </span>
                            <div class="stars">
                              <input
                                id="star5"
                                name="rating"
                                value="5"
                                type="radio"
                              /><label for="star5"></label>
                              <input
                                id="star4"
                                name="rating"
                                value="4"
                                type="radio"
                              /><label for="star4"></label>
                              <input
                                id="star3"
                                name="rating"
                                value="3"
                                type="radio"
                              /><label for="star3"></label>
                              <input
                                id="star2"
                                name="rating"
                                value="2"
                                type="radio"
                              /><label for="star2"></label>
                              <input
                                id="star1"
                                name="rating"
                                value="1"
                                type="radio"
                              /><label for="star1"></label>
                            </div>
                          </div>
                          <button class="primary-btn">Submit</button>
                        </form>
                      </div>
                    </div>
                    <!-- /Review Form -->
                  </div>
                </div>
                <!-- /tab3  -->
              </div>
              <!-- /product tab content  -->
            </div>
          </div>
          <!-- /product tab -->
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
  </app-layout>
</template>

<script>
import App from "../../layouts/App";

export default {
  components: {
    "app-layout": App,
  },
  props: ["item"],
  data() {
    return {
      quantity: this.item.quantity,
      count: 0,
      preview: "",
    };
  },
  mounted() {
    console.log();
  },
  methods: {
    updateCart(id) {
      axios
        .get("/cart-update/?id=" + id + "&quantity=" + this.quantity)
        .then((res) => {
          this.count = res.data.count;
          this.quantity = this.item.quantity;
          this.$emit("countChange", this.count);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    previewProduct(image) {
      this.preview = image;
    },
  },
};
</script>

<style>
.image-rdadius {
  border-radius: 5px;
  box-shadow: 2px 1px 4px rgba(5, 5, 5, 0.247);
  overflow: hidden;
}
.image-content {
	margin-bottom: 10px;
}
</style>