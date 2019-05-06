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
	<script src="<?php echo base_url('theme_unicase');?>/assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	<script src="switchstylesheet/switchstylesheet.js"></script>

	<script type='text/javascript' src='<?php echo base_url('theme_unicase');?>/assets/js/angular.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url('theme_unicase');?>/assets/js/angular-animate.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url('theme_unicase');?>/assets/js/loading-bar.js'></script>
	<script type='text/javascript' src='<?php echo base_url('theme_unicase');?>/assets/js/sweetalert2.js'></script>
    <script type='text/javascript' src='<?php echo base_url('theme_unicase');?>/assets/js/lity.min.js'></script>

    <script src="<?php echo base_url('theme_unicase');?>/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url('theme_unicase');?>/datepicker/locales/bootstrap-datepicker.th.min.js"></script>
    <script src="<?php echo base_url('theme_unicase');?>/datepicker/js/bootstrap-timepicker.js"></script>
    <script type='text/javascript' src='<?php echo base_url('theme');?>/js/angular.min.js'></script>

    <?php echo $this->load->view("template/app");?>
    <?php if(isset($script)){echo $script;}?>
	<?php if(isset($script_file)){echo $this->load->view($script_file); }?>
	
	
	<script>
		$(document).ready(function () {
			$(".changecolor").switchstylesheet({ seperator: "color" });
			$('.show-theme-options').click(function () {
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function () {
			$('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->
</body>

</html>