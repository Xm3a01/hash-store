<template>
  <div>
    <!-- NEWSLETTER -->
    <!-- FOOTER -->
    <footer id="footer">
      <!-- top footer -->
      <div class="section">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row">
            <div class="col-md-3 col-xs-6">
              <div class="footer">
                <h3 class="footer-title">About Us</h3>
                <ul class="footer-links">
                  <li>
                    <a href="#"><i class="fa fa-map-marker"></i></a> Al Siteen
                    St, Khartoum, Sudan
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-phone"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-envelope-o"></i></a
                    >email@email.com
                  </li>
                </ul>
              </div>
            </div>

            <div class="clearfix visible-xs"></div>

            <div class="col-md-3 col-xs-6">
              <div class="footer">
                <h3 class="footer-title">Information</h3>
                <ul class="footer-links">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Orders and Returns</a></li>
                  <li><a href="#">Terms & Conditions</a></li>
                </ul>
              </div>
            </div>

            <div class="col-md-3 col-xs-6">
              <div class="footer">
                <h3 class="footer-title">Service</h3>
                <ul class="footer-links">
                  <li><a href="#">My Account</a></li>
                  <li><a href="#">View Cart</a></li>

                  <li><a href="#">Help</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </div>
      <!-- /top footer -->

      <!-- bottom footer -->
      <div id="bottom-footer" class="section">
        <div class="container">
          <!-- row -->
          <div class="row">
            <div class="col-md-12 text-center">
              <ul class="footer-payments"></ul>
              <span class="copyright" style="font-size: 16px">
                Copyright &copy; 2021
                <a
                  style="color: #fff"
                  href="hashdevelopedprojects.com"
                  target="_blank"
                  >Hash Developed Project</a
                >
              </span>
            </div>
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </div>
      <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      year: document.write(new Date().getFullYear()),
    };
  },
};
</script>