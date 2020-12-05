<template>
    <!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li :class="target == 'Home' ? `active` : ''"><a href="/">Home</a></li>
						
						<li :class="target == 'Category' ? `active` : ''"><a href="/categories">Categories</a></li>
						<li :class="target == 'Product' ? `active` : ''"><a href="/products">Prudects</a></li>
						<li :class="target == 'Contact' ? `active` : ''"><a href="#">Contact us</a></li>
				
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
</template>

<script>
export default {
	props:['target']
}
</script>