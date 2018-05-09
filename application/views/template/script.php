        <script type="text/javascript" src="<?php echo base_url('theme');?>/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('theme');?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('theme');?>/js/jquery.fancybox.js"></script>
        <script type="text/javascript" src="<?php echo base_url('theme');?>/js/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url('theme');?>/js/owl.carousel.js"></script>
        <script type="text/javascript" src="<?php echo base_url('theme');?>/js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="<?php echo base_url('theme');?>/js/theme.js"></script>
        <script type='text/javascript' src='<?php echo base_url('theme');?>/js/angular.min.js'></script>
         <!-- Add fancyBox Js -->
        <script type="text/javascript" src="<?php echo base_url('theme');?>/fancyBox/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>
        <script type="text/javascript" src="<?php echo base_url('theme');?>/fancyBox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
        <script type="text/javascript" src="<?php echo base_url('theme');?>/fancyBox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="<?php echo base_url('theme');?>/fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
        <script type="text/javascript" src="<?php echo base_url('theme');?>/fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
        </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox-thumb").fancybox({
            prevEffect  : "none",
            nextEffect  : "none",
            helpers : {
                title   : {
                    type: "outside"
                },
                thumbs  : {
                    width   : 50,
                    height  : 50
                }
            }
        });
    });
    </script>

        <?php echo $this->load->view("template/app");?>
		<?php if(isset($script)){echo $script;}?>
        <?php if(isset($script_file)){echo $this->load->view($script_file); }?>
    </body>
</html>