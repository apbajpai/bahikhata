</body>
<footer>
	<!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


	<!-- CORE JS FRAMEWORK - START -->
	<script src="<?= base_url('public/assets/'); ?>/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>

    <script src="<?= base_url('public/assets/'); ?>/assets/js/popper.min.js" type="text/javascript"></script>
    <script src="<?= base_url('public/assets/'); ?>/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url('public/assets/'); ?>/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="<?= base_url('public/assets/'); ?>/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="<?= base_url('public/assets/'); ?>/assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>
    
    <!-- CORE JS FRAMEWORK - END -->
    
    <!-- CORE TEMPLATE JS - START --> 
    <script src="<?= base_url('public/assets/'); ?>/assets/js/scripts.js" type="text/javascript"></script>

    

<script src="<?= base_url('public/assets/'); ?>/assets/plugins/datepicker/js/datepicker.js" type="text/javascript"></script> 
<script src="<?= base_url('public/assets/'); ?>/assets/plugins/autosize/autosize.min.js" type="text/javascript"></script>
<script src="<?= base_url('public/assets/'); ?>/assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<!--<script src="<?=base_url('assets/');?>assets/js/jquery.autocomplete.pack.js" type="text/javascript"></script>-->
<script src="<?= base_url('public/assets/'); ?>/assets/js/custom.js" type="text/javascript"></script>
<script src="<?= base_url('public/assets/'); ?>/assets/js/typeahead.js" type="text/javascript"></script>

<script src="<?= base_url('public/assets/'); ?>/assets/plugins/typeahead/typeahead.bundle.js" type="text/javascript"></script>
<script src="<?= base_url('public/assets/'); ?>/assets/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS - END --> 
    <?php 
    if($page_name == 'Dashboard') {
        ?>
        <!-- Sidebar Graph - START --> 
        <script src="<?= base_url('public/assets/'); ?>/assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?= base_url('public/assets/'); ?>/assets/js/chart-sparkline.js" type="text/javascript"></script>
    <?php } ?>
    

	<script src="<?= base_url('public/assets/'); ?>/js/notify.js" type="text/javascript"></script>
	<script src="<?= base_url('public/assets/'); ?>/js/notify.min.js" type="text/javascript"></script>
	<script src="<?= base_url('public/assets/'); ?>/assets/js/validation-script.js" type="text/javascript"></script> 
    <style>
        .overlay{
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 999;
            background: rgba(255,255,255,0.8) url("https://www.tutorialrepublic.com/examples/images/loader.gif") center no-repeat;
        }
        /* Turn off scrollbar when body element has the loading class */
        body.loading{
            overflow: hidden;   
        }
        /* Make spinner image visible when body element has the loading class */
        body.loading .overlay{
            display: block;
        }
    </style>
    <script type="">
        $(document).on({
            ajaxStart: function() {
                $("body").addClass("loading");
            },
            ajaxStop: function() {
                $("body").removeClass("loading");
            }
        });
    </script>   
</footer>

</html>