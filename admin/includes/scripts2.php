 <!-- Mainly scripts -->
 <script src="<?php echo SITEURL ?>asset/js/jquery-2.1.1.js"></script>
 <script src="<?php echo SITEURL ?>asset/js/bootstrap.min.js"></script>
 <script src="<?php echo SITEURL ?>asset/js/plugins/metisMenu/jquery.metisMenu.js"></script>
 <script src="<?php echo SITEURL ?>asset/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
 <!-- Flot -->
 <script src="<?php echo SITEURL ?>asset/js/plugins/flot/jquery.flot.js"></script>
 <script src="<?php echo SITEURL ?>asset/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
 <script src="<?php echo SITEURL ?>asset/js/plugins/flot/jquery.flot.spline.js"></script>
 <script src="<?php echo SITEURL ?>asset/js/plugins/flot/jquery.flot.resize.js"></script>
 <script src="<?php echo SITEURL ?>asset/js/plugins/flot/jquery.flot.pie.js"></script>
 <!-- Peity -->
 <script src="<?php echo SITEURL ?>asset/js/plugins/peity/jquery.peity.min.js"></script>
 <!-- <script src="../js/demo/peity-demo.js"></script> -->
 <!-- Custom and plugin javascript -->
 <script src="<?php echo SITEURL ?>asset/js/inspinia.js"></script>
 <script src="<?php echo SITEURL ?>asset/js/plugins/pace/pace.min.js"></script>
 <!-- jQuery UI -->
 <script src="<?php echo SITEURL ?>asset/js/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- GITTER -->
 <script src="<?php echo SITEURL ?>asset/js/plugins/gritter/jquery.gritter.min.js"></script>
 <!-- Sparkline -->
 <script src="<?php echo SITEURL ?>asset/js/plugins/sparkline/jquery.sparkline.min.js"></script>
 <!-- Sparkline demo data  -->
 <script src="<?php echo SITEURL ?>asset/js/demo/sparkline-demo.js"></script>
 <!-- ChartJS-->
 <script src="<?php echo SITEURL ?>asset/js/plugins/chartJs/Chart.min.js"></script>
 <!-- Toastr -->
 <script src="<?php echo SITEURL ?>asset/js/plugins/toastr/toastr.min.js"></script>
 <!-- Mainly scripts -->
 <script src="<?php echo SITEURL ?>asset/js/plugins/jeditable/jquery.jeditable.js"></script>

 <script src="<?php echo SITEURL ?>asset/js/plugins/dataTables/datatables.min.js"></script>

 <script src="<?php echo SITEURL ?>asset/js/plugins/sweetalert/sweetalert.min.js"></script>

 <script>

$(document).ready(function(){


    // Example 1
    var options1 = {};
    options1.ui = {
        container: "#pwd-container1",
        showVerdictsInsideProgressBar: true,
        viewports: {
            progress: ".pwstrength_viewport_progress"
        }
    };
    options1.common = {
        debug: false,
    };
    $('.example1').pwstrength(options1);

    // Example 2
    var options2 = {};
    options2.ui = {
        container: "#pwd-container2",
        showStatus: true,
        showProgressBar: false,
        viewports: {
            verdict: ".pwstrength_viewport_verdict"
        }
    };
    $('.example2').pwstrength(options2);

    // Example 3
    var options3 = {};
    options3.ui = {
        container: "#pwd-container3",
        showVerdictsInsideProgressBar: true,
        viewports: {
            progress: ".pwstrength_viewport_progress2"
        }
    };
    options3.common = {
        debug: true,
        usernameField: "#username"
    };
    $('.example3').pwstrength(options3);

    // Example 4
    var options4 = {};
    options4.ui = {
        container: "#pwd-container4",
        viewports: {
            progress: ".pwstrength_viewport_progress4",
            verdict: ".pwstrength_viewport_verdict4"
        }
    };
    options4.common = {
        zxcvbn: true,
        zxcvbnTerms: ['samurai', 'shogun', 'bushido', 'daisho', 'seppuku'],
        userInputs: ['#year', '#familyname']
    };
    $('.example4').pwstrength(options4);


})

</script>