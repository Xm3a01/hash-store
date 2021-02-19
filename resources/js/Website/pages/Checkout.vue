
<template>
<app-layout :count="count" :target="target">
    <div class="section">
        <!-- container -->
        <div class="container checkout-section">
            <div v-if="count == 0">
                <div class="row container">
                    <div class="col-md-4 col-md-offset-4" style="padding-top:30px">
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn btn-info" @click="order">Direct pay</a>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-info" href="#" @click.prevent="count = 2">Use pay method</a>

                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br>
                <div class="col-md-6 col-md-offset-3">
                <hr>
                <h5>Description</h5>
                <p class="">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra tellus in hac habitasse platea dictumst vestibulum rhoncus est. Ultrices sagittis orci a scelerisque purus semper eget duis. Porttitor leo a diam sollicitudin tempor id eu. A pellentesque sit amet porttitor. Felis eget velit aliquet sagittis id consectetur purus. Aliquet bibendum enim facilisis gravida. Consectetur lorem donec massa sapien faucibus. Gravida quis blandit turpis cursus in hac. Ac placerat vestibulum lectus mauris ultrices. Nunc mattis enim ut tellus elementum sagittis vitae. Orci ac auctor augue mauris augue neque gravida in fermentum. Tristique senectus et netus et malesuada fames ac turpis. Tristique senectus et netus et malesuada fames ac turpis. Euismod elementum nisi quis eleifend. Mattis ullamcorper velit sed ullamcorper morbi tincidunt ornare.
                </p>
             </div>
            </div>

            <div
                v-if="status.success || status.error"
                class="alert alert-dismissible"
                role="alert"
                :class="status.success ? 'alert-success' : 'alert-danger'"
            >
                <button
                    type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ status.success ? "Successfull" : "Warning!" }}</strong
                >{{ status.success ? status.success : status.error }}
            </div>
            <!-- row -->
            <form @submit="order" v-if="count == 2">
                <div class="row">
                    <div class="col-md-5 col-md-offset-3 bg-white">
                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Delivery Info</h3>
                            </div>

                            <div class="form-group">
                                <input
                                    class="input form-control"
                                    type="text"
                                    name="name"
                                    placeholder="Address eg: sr , build no , block no , "
                                    v-model="form.address"
                                />
                            </div>

                            <div class="form-group">
                                <input
                                    class="input form-control"
                                    type="text"
                                    placeholder="Phone"
                                    v-model="form.phone"
                                />
                            </div>
                            <div class="form-group">
                                <input
                                    class="input form-control"
                                    type="text"
                                    placeholder="Delivery time eg. sun at 6pm"
                                    v-model="form.delivery_time"
                                />
                            </div>

                            <hr>
                            <h5>If you need Order In Your Office</h5>

                            <div class="form-group">
                                <input
                                    class="input form-control"
                                    type="text"
                                    placeholder="Office Address eg:  sr , build no , block no "
                                    v-model="form.office_address"
                                />
                            </div>

                            <div class="form-group">
                                <input
                                    class="input form-control"
                                    type="text"
                                    name="ff"
                                    placeholder="office delviey time eg: sun at 5pm."
                                    v-model="form.office_delivery_time"
                                />
                            </div>
                        </div>
                        <button type="submit" class="primary-btn order-submit">Pay now</button>
                    </div>
                    <!-- /Shiping Details -->
                </div>

            </form>
        </div>
        <!-- /Order Details -->
    </div>
    <!-- /row -->
</app-layout>
</template>
<script>
import App from "../layouts/App";

export default {
    components: {
        "app-layout": App,
    },
    data() {
        return {
            count: 0,
            search: "",
            target: "Checkout",
            form: {},
            status: {},
        };
    },
    mounted() {
        //  this.getItems();
    },

    methods: {
        order() {
            console.log(this.form.email);
            axios.post("/send-order", this.form).then((res) => {
                location= '/success';
                this.status = res.data;
                this.form = {};
                //   console.log(res.data)
            });
        },
    },
};
</script>

<style>
.checkout-section {
    padding: 10px;
    background: white;
    border-radius: 4px;
}
.checkout-section input {
   border:1px solid #cccccc;
}


.tab-divider{
    height: 30px;
    width: 1px;
    background: #8c8c8c;
}

</style>
