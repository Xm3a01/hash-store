<template>
<div>
 <nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand ml-4" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-link" href="#">Features</a>
      <a class="nav-link" href="#">Pricing</a>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         
        </div>
      </li>
      <a class="nav-link" href="#"></a>
    </div>
  </div>
</nav>
          <span v-for="c in cart" :key="c.id">
          <a class="dropdown-item" href="#" >Name : {{c.name}}</a>
          <a class="dropdown-item" href="#" >Price : {{c.price}}</a>
          <a class="dropdown-item" href="#">Total : {{c.quantity * c.price}}</a>
          <div class="dropdown-divider"></div>
          </span>


          {{count}}
</div>
</template>

<script>
    export default {
      props:['cart', 'count'],
      data(){
        return {
        }
      },

      methods:{
      }
    }
</script>

<style >
 nav {direction: rtl;}
</style>
