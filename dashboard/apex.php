<?php
$currentPage = 'dashboard';
//$currentPageSub = 'category';
?>
<?php require_once "php/controllerUserData.php"; ?>
<?php
$username = $_SESSION['session_user'];

if ($username != false) {
    $sql = "SELECT * FROM admin_login WHERE username = '$username'";
    $run_Sql = mysqli_query($link, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $name = $fetch_info['name'];
    }
} else {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CMS Admin Dashboard">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>QuadbTech - CMS Admin Dashboard</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="assets/plugins/DataTables/datatables.min.css" rel="stylesheet">
    <link href="assets/sweetalert/sweetalert.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="assets/css/connect.min.css" rel="stylesheet">
    <link href="assets/css/admin4.css" rel="stylesheet">
    <link href="assets/css/dark_theme.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style>
        .form-control:focus {
            border-color: #2b8fe97d;
            box-shadow: 0 0 0 0.2rem rgb(43 143 233 / 25%);
        }

        .dataTables_length select {
            border-radius: 7px;
            width: 100%;
            padding: 8px 18px;
            font-size: 15px
        }

        input[type=search] {
            border-radius: 7px;
            width: 100%;
            padding: 8px 18px;
            font-size: 15px
        }
    </style>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TNWHRNG');</script>
<!-- End Google Tag Manager -->
</head>

<body>
 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TNWHRNG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div>
    <div class="connect-container align-content-stretch d-flex flex-wrap">
        <!-- left sidebar start-->
        <?php include 'inc/sidebar.php'; ?>
        <!-- left sidebar end-->
        <div class="page-container">
            <!-- page header start-->
            <?php include 'inc/page_header.php'; ?>
            <!-- page header end-->
            <div class="page-content">
                <div class="page-info">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="index">Home</a></li> -->
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
                
                            <div class="main-wrapper">
                            <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card">                                            
                                            <div class="sub card-body p-3">

                                                <div class="row">
                                                    <div class="col-9 pt-0 pb-0">
                                                    
                                    <?php 
                                    require_once "php/link.php";?>
                                  <?php
                                  $que= "SELECT * FROM stories";
                                    $res=mysqli_query($link, $que);
                                    
                                  $fetch = mysqli_num_rows($res) ;
                                            ?>
                                                        <p style="font-size: 20px;" id="t_visitor"><?php echo $fetch?></p>
                                                        <p class="mb-0" style="font-size: 1.5rem"><b>Total Posts</b></p>
                                                    </div>
                                                    <div class="col-3 pt-3">
                                                        <i class="top-icons material-icons float-right" style="color:#2b8fe9; ">post_add</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="card ">                                            
                                            <div class="descrip card-body p-3 ">
                                                <div class="row ">
                                                    <div class="col-9 ">
                                                    
                                    <?php 
                                    require_once "php/link.php";?>
                                  <?php
                                  
                                 $data = array();
                                 date_default_timezone_set("Asia/Calcutta");
                                 $date_now = date("r");
                                  $que= "SELECT * FROM stories WHERE created_at='$date_now'";
                                    $res=mysqli_query($link, $que);
                                    $fetch = mysqli_num_rows($res) ;
                                    if($res){
                                        ?> 
                                        <p style="font-size: 20px;" id="today_visitor"><?php echo $fetch?></p>
                                        <?php
                                   }
                                  else{
                                      ?>
                                   <p style="font-size: 20px;" id="today_visitor"><?php echo "0"?></p>
                                                       <?php
                                    }
                                    ?>
                                                        <p class="mb-0 " style="font-size: 1.5rem; "><b>Posts (Today)</b></p>
                                                    </div>
                                                    <div class="col-3 pt-3 ">                                                    
                                                        <i class="top-icons material-icons-outlined float-right " style="color: #ffa65a;">today</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="card ">                                           
                                            <div class="post card-body p-3 ">

                                                <div class="row ">
                                                    <div class="col-9 ">
                                                    <?php 
                                    require_once "php/link.php";?>
                                  <?php
                                  $que= "SELECT * FROM user_login";
                                    $res=mysqli_query($link, $que);
                                    
                                  $fetch = mysqli_num_rows($res) ;
                                  ?>                                         
                                                    <p style="font-size: 20px; "><?php echo $fetch?></p>
                                                        <p class="mb-0 " style="font-size: 1.5rem; "><b>Users</b></p>
                                                    </div>
                                                    <div class="col-3 pt-3 ">
                                                        <i class="top-icons material-icons float-right " style="color: #c65dfc;">people</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="card ">                                           
                                            <div class="com card-body p-3 ">

                                                <div class="row ">
                                                                                                      
                                                <div class="col-9 ">
                                                <?php 
                                    require_once "php/link.php";?>
                                  <?php
                                  $que= "SELECT * FROM tags";
                                    $res=mysqli_query($link, $que);
                                    
                                  $fetch = mysqli_num_rows($res) ;
                                    ?>
                                                        <p style="font-size: 20px; "><?php echo $fetch?></p>
                                                        <p class="mb-0 " style="font-size: 1.5rem; "><b>Tags</b></p>
                                                    </div>
                                                    <div class="col-3 pt-3 ">
                                                        <i class="top-icons material-icons float-right " style="color: #61ed5f;">tag</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
    
                    </div>
                    
  <div class="card">
      
  <div id="chart" style="height: 650px; width: 50%;">
</div>
  </div>


                    <!-- page footer start-->
                    <?php include 'inc/page_footer.php'; ?>
                    <!-- page footer end-->

                </div>
            </div>
        </div>
    

        
           


    <!-- Javascripts -->
    <script src="assets/plugins/jquery/jquery-3.4.1.min.js "></script>
    <script src="assets/plugins/bootstrap/popper.min.js "></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js "></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js "></script>
    <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js "></script>
    <script src="assets/plugins/apexcharts/dist/apexcharts.min.js "></script>
    <script src="assets/plugins/blockui/jquery.blockUI.js "></script>
    <script src="assets/plugins/flot/jquery.flot.min.js "></script>
    <script src="assets/plugins/flot/jquery.flot.time.min.js "></script>
    <script src="assets/plugins/flot/jquery.flot.symbol.min.js "></script>
    <script src="assets/plugins/flot/jquery.flot.resize.min.js "></script>
    <script src="assets/plugins/flot/jquery.flot.tooltip.min.js "></script>
    <script src="assets/js/connect.min.js "></script>
    <script src="assets/js/pages/dashboard.js "></script>
    <script src="assets/plugins/DataTables/datatables.min.js"></script>
    <script src="assets/plugins/DataTables/dataTables.select.min.js"></script>
    <script src="assets/sweetalert/sweetalert.min.js"></script>
    <script src="assets/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    
    <script>
            var options = {
  series: [
    {
      name: "Likes",
      data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5]
    }
  ],
  chart: {
    height: 350,
    type: "line",
    events: {
      dataPointSelection: function (e, chart, opt) {
        const tooltipEl = opt.w.globals.tooltip.getElTooltip();

        if (opt.selectedDataPoints[0].length) {
          tooltipEl.classList.add("apexcharts-tooltip-active");
        } else {
          tooltipEl.classList.remove("apexcharts-tooltip-active");
        }
      }
    }
  },
  stroke: {
    width: 4,
    curve: "smooth"
  },
  xaxis: {
    type: "datetime",
    categories: [
      "1/11/2000",
      "2/11/2000",
      "3/11/2000",
      "4/11/2000",
      "5/11/2000",
      "6/11/2000",
      "7/11/2000",
      "8/11/2000",
      "9/11/2000",
      "10/11/2000",
      "11/11/2000",
      "12/11/2000",
      "1/11/2001",
      "2/11/2001",
      "3/11/2001",
      "4/11/2001",
      "5/11/2001",
      "6/11/2001"
    ]
  },

  markers: {
    size: 6
  },
  tooltip: {
    shared: false,
    intersect: true,
    custom: function ({ series, seriesIndex, dataPointIndex, w }) {
      return (
        '<div class="custom-tooltip">' +
        "<span>" +
        w.config.xaxis.categories[dataPointIndex] +
        ": " +
        series[seriesIndex][dataPointIndex] +
        "  <br /> " +
        '<a href="https://google.com" target="_blank">https://google.com</a>' +
        "</span>" +
        "</div>"
      );
    }
  }
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

          
        </script>


</body>

</html>