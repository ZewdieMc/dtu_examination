<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" HREF="img/dtu.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>DTU Examination</title>

    <?php include('./includes/css2.php') ?>

</head>

<body class="md-skin pace-done">
    <div id="wrapper">
        <?php include('sidenav.php'); ?>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">

                    <?php include('topnav.php');  ?>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Dept. Head</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo SITEURL ?>admin/index.php?page=dashboard">Home</a>
                        </li>

                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content">

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="widget style1 red-bg">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <i class="fa fa-building fa-5x"></i>
                                        </div>
                                        <div class="col-8 text-center">
                                            <span> Courses </span>
                                            <h2 class="font-bold">7</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="widget style1 navy-bg">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <i class="fa fa-pencil fa-5x"></i>
                                        </div>
                                        <div class="col-8 text-center">
                                            <span> Exams </span>
                                            <h2 class="font-bold">12</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="widget style1 lazur-bg">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-8 text-center">
                                            <span> Students </span>
                                            <h2 class="font-bold">7</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="widget style1 yellow-bg">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-8 text-center">
                                            <span> Reports</span>
                                            <h2 class="font-bold">12</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="widget style1 black-bg">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <i class="fa fa-user fa-5x text-white"></i>
                                        </div>
                                        <div class="col-8 text-center text-white">
                                            <span> Teachers </span>
                                            <h2 class="font-bold">7</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="widget style1 blue-bg">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <i class="fa fa-apple fa-5x"></i>
                                        </div>
                                        <div class="col-8 text-center text-white">
                                            <span> Invigilators </span>
                                            <h2 class="font-bold">12</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php //include('footer.php');   
                    ?>
                </div>
            </div>
            <?php include('includes/scripts2.php') ?>

            <script>
                $(document).ready(function() {
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };

                    }, 1300);


                    var data1 = [
                        [0, 4],
                        [1, 8],
                        [2, 5],
                        [3, 10],
                        [4, 4],
                        [5, 16],
                        [6, 5],
                        [7, 11],
                        [8, 6],
                        [9, 11],
                        [10, 30],
                        [11, 10],
                        [12, 13],
                        [13, 4],
                        [14, 3],
                        [15, 3],
                        [16, 6]
                    ];
                    var data2 = [
                        [0, 1],
                        [1, 0],
                        [2, 2],
                        [3, 0],
                        [4, 1],
                        [5, 3],
                        [6, 1],
                        [7, 5],
                        [8, 2],
                        [9, 3],
                        [10, 2],
                        [11, 1],
                        [12, 0],
                        [13, 2],
                        [14, 8],
                        [15, 0],
                        [16, 0]
                    ];
                    $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                        data1, data2
                    ], {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#1C84C6"],
                        xaxis: {},
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    });
                    $('.dataTables-example').DataTable({
                        dom: '<"html5buttons"B>lTfgitp',
                        pageLength: 5,
                        buttons: [{
                                extend: 'copy'
                            },
                            {
                                extend: 'csv'
                            },
                            {
                                extend: 'excel',
                                title: 'ExampleFile'
                            },
                            {
                                extend: 'pdf',
                                title: 'ExampleFile'
                            },

                            {
                                extend: 'print',
                                customize: function(win) {
                                    $(win.document.body).addClass('white-bg');
                                    $(win.document.body).css('font-size', '10px');

                                    $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                                }
                            }
                        ]

                    });
                    var doughnutData = [{
                            value: 300,
                            color: "#a3e1d4",
                            highlight: "#1ab394",
                            label: "App"
                        },
                        {
                            value: 50,
                            color: "#dedede",
                            highlight: "#1ab394",
                            label: "Software"
                        },
                        {
                            value: 100,
                            color: "#A4CEE8",
                            highlight: "#1ab394",
                            label: "Laptop"
                        }
                    ];

                    var doughnutOptions = {
                        segmentShowStroke: true,
                        segmentStrokeColor: "#fff",
                        segmentStrokeWidth: 2,
                        percentageInnerCutout: 45, // This is 0 for Pie charts
                        animationSteps: 100,
                        animationEasing: "easeOutBounce",
                        animateRotate: true,
                        animateScale: false
                    };

                    var ctx = document.getElementById("doughnutChart").getContext("2d");
                    var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

                    var polarData = [{
                            value: 300,
                            color: "#a3e1d4",
                            highlight: "#1ab394",
                            label: "App"
                        },
                        {
                            value: 140,
                            color: "#dedede",
                            highlight: "#1ab394",
                            label: "Software"
                        },
                        {
                            value: 200,
                            color: "#A4CEE8",
                            highlight: "#1ab394",
                            label: "Laptop"
                        }
                    ];

                    var polarOptions = {
                        scaleShowLabelBackdrop: true,
                        scaleBackdropColor: "rgba(255,255,255,0.75)",
                        scaleBeginAtZero: true,
                        scaleBackdropPaddingY: 1,
                        scaleBackdropPaddingX: 1,
                        scaleShowLine: true,
                        segmentShowStroke: true,
                        segmentStrokeColor: "#fff",
                        segmentStrokeWidth: 2,
                        animationSteps: 100,
                        animationEasing: "easeOutBounce",
                        animateRotate: true,
                        animateScale: false
                    };
                    var ctx = document.getElementById("polarChart").getContext("2d");
                    var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);

                });
            </script>
            <script>
                (function(i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function() {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', '../../www.google-analytics.com/analytics.js', 'ga');

                ga('create', 'UA-4625583-2', 'webapplayers.com');
                ga('send', 'pageview');
            </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.5/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 May 2016 03:55:13 GMT -->

</html>