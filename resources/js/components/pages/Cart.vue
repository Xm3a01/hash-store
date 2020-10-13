<template>
    <div>
        <ul v-for="item in cart" :key="item.id">
            <li>{{item.name}}</li>
            <li>{{item.quantity}}</li>
            <li>{{item.price * item.quantity}}</li>
            <li>
                <button @click.prevent ="increase(item.id , 1)">inc</button>
                <button @click.prevent ="decrease(item.id , -1)">dec</button>
                <button @click.prevent ="deleteItem(item.id)">delete</button>
            </li>
        </ul>
        {{totalPrice}}
    </div>
</template>
<script>
export default {
    props:['cartItems' , 'total'],
    data() {
        return {
            cart: this.cartItems,
            totalPrice: this.total
        }
    },

    methods: {
        increase(id , quantity = 4) {
            axios.get('/cart-update?id='+id+'&quantity='+quantity)
             .then((res)=>{
                 this.cart = res.data.item
                 this.totalPrice = res.data.total
             })
        },
        decrease(id , quantity){
            axios.get('/cart-update?id='+id+'&quantity='+quantity)
             .then((res)=>{
                 this.cart = res.data.item;
                 this.totalPrice = res.data.total
                 console.log(this.total);
             })
        },
        deleteItem(id) {
            axios.get('/cart-delete?id='+id)
              .then((res)=>{
                  console.log(res.data)
              });
        }
    }
}
</script>