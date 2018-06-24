<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url('theme_unicase');?>/assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="<?php echo base_url('theme_unicase');?>/assets/js/bootstrap.min.js"></script>
	
	<script src="<?php echo base_url('theme_unicase');?>/assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="<?php echo base_url('theme_unicase');?>/assets/js/owl.carousel.min.js"></script>
	
	<script src="<?php echo base_url('theme_unicase');?>/assets/js/echo.min.js"></script>
	<script src="<?php echo base_url('theme_unicase');?>/assets/js/jquery.easing-1.3.min.js"></script>
	<script src="<?php echo base_url('theme_unicase');?>/assets/js/bootstrap-slider.min.js"></script>
    <script src="<?php echo base_url('theme_unicase');?>/assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('theme_unicase');?>/assets/js/lightbox.min.js"></script>
    <script src="<?php echo base_url('theme_unicase');?>/assets/js/bootstrap-select.min.js"></script>
	<script src="<?php echo base_url('theme_unicase');?>/assets/js/wow.min.js"></script>
	<script type='text/javascript' src='<?php echo base_url('theme_unicase');?>/assets/js/angular.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url('theme_unicase');?>/assets/js/angular-animate.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url('theme_unicase');?>/assets/js/loading-bar.js'></script>
	<script type='text/javascript' src='<?php echo base_url('theme_unicase');?>/assets/js/sweetalert2.js'></script>
	<script type='text/javascript' src='<?php echo base_url('theme_unicase');?>/assets/js/lity.min.js'></script>
	<script src="<?php echo base_url('theme_unicase');?>/assets/js/scripts.js"></script>
	<!-- page script -->
	<?php $this->load->view("js/main_app_js"); ?>
	<?php $this->load->view("js/header_cart_js"); ?>
  	<?php if(isset($script_file)){echo $this->load->view($script_file); }?>
</body>
</html>