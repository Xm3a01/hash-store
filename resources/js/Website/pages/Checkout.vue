
<template>
<app-layout :count="count" :target="target">
    <div class="section">
        <!-- container -->
        <div class="container">
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
            <form @submit.prevent="contact" method="post">
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
                                    placeholder="sr , build no , block no , "
                                    v-model="form.address"
                                />
                            </div>

                            <div class="form-group">
                                <input
                                    class="input form-control"
                                    type="text"
                                    name="email"
                                    placeholder="Email"
                                    v-model="form.phone"
                                />
                            </div>
                            <div class="form-group">
                                <input
                                    class="input form-control"
                                    type="text"
                                    name="subject"
                                    placeholder="eg. sun at 6pm"
                                    v-model="form.delivery_time"
                                />
                            </div>

                            <div class="form-group">
                                <input
                                    class="input form-control"
                                    type="text"
                                    name="subject"
                                    placeholder="Subject"
                                    v-model="form.office_address"
                                />
                            </div>

                            <div class="form-group">
                                <input
                                    class="input form-control"
                                    type="text"
                                    name="subject"
                                    placeholder="office time eg: sun at 5pm."
                                    v-model="form.office_delivery_time"
                                />
                            </div>
                        </div>
                        <button type="submit" class="primary-btn order-submit"></button>
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
        contact() {
            console.log(this.form.email);
            axios.post("/contacts", this.form).then((res) => {
                this.status = res.data;
                this.form = {};
                //   console.log(res.data)
            });
        },
    },
};
</script>
