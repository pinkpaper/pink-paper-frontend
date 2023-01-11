<?php require_once "php/controllerUserData.php"; ?>
<?php
require_once "php/schedule_cron.php";
$username = $_SESSION['username'];

if ($username != false) {
  $sql = "SELECT * FROM user_login WHERE username = '$username'";
  $run_Sql = mysqli_query($link, $sql);
  if ($run_Sql) {
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $status = $fetch_info['email_status'];
    $name = $fetch_info['name'];
    $username = $fetch_info['username'];
    $user_uid = $fetch_info['user_uid'];
    $profile = $fetch_info['profile'];
    $code = $fetch_info['code'];
    if ($status == "verified") {
      if ($code != 0) {
        header('Location: reset-code');
      }
    } else {
      header('Location: user-otp');
    }
  }
} else {
  header('Location: login-user-mm');
}
?>
<?php
$meta_title = 'Stats';
$category_description = 'Start curating your thoughts in a decentralized and autonomous environment for your communities to browse without perjury and risk of prosecution from anywhere around the globe.';
$meta_description = implode(' ', array_slice(explode(' ', $category_description), 0, 15)) . "\n";
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $meta_title ?> | Pink Paper </title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo ($meta_description); ?>">
  <!-- Enter a keywords for the page in tag -->
  <meta name="Keywords" content="<?php echo ($meta_title); ?>">
  <!-- Enter Page title -->
  <meta property="og:title" content="<?php echo $meta_title ?> | Pink Paper" />
  <!-- Enter Page URL -->
  <meta property="og:url" content="<?php echo ($actual_link) ?>" />
  <!-- Enter page description -->
  <meta property="og:description" content="<?php echo ($meta_description); ?>...">
  <!-- Enter Logo image URL for example : http://cryptonite.finstreet.in/images/cryptonitepost.png -->
  <meta property="og:image" itemprop="image" content="https://content.pinkpaper.xyz/assets/images/logo/logo_icon.png" />
  <meta property="og:image:secure_url" itemprop="image" content="https://content.pinkpaper.xyz/assets/images/logo/logo_icon.png" />
  <meta name="twitter:card" content="https://content.pinkpaper.xyz/assets/images/logo/logo_icon.png">
  <meta property="og:image:width" content="600">
  <meta property="og:image:height" content="315">

  <!-- favicon -->
  <link rel="icon" href="assets/images/logo/favicon.ico">

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- icons pack -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" />
  <script src="assets/feather/feather.min.js"></script>


  <!-- stylesheet -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/sweetalert/sweetalert.css" rel="stylesheet">
  <link href="assets/toastr/toastr.min.css" rel="stylesheet">
  <link href="assets/css/app.css" rel="stylesheet">
  <link href="assets/css/loader.css" rel="stylesheet">
  <style type="text/css">
.chart {
  width: 100%; 
  min-height: 450px;
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

<body onload="loader()">
 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TNWHRNG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <!-- loader start-->
  <div class="loader-container">
    <div class="loader"></div>
  </div>
  <!-- loader end-->

  <button id="back-to-top" class="btn btn-lg back-to-top text-white"><i class="fas fa-chevron-up"></i></button>

  <!-- header start-->
  <?php include('include/header.php'); ?>
  <!-- header end-->

  <div class="container" style="padding-top:50px;"></div>


  <section class="my-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Your Stats</h1>
            <a href="audience-stats" class="btn button-outline-primary">Audience Stats</a>
          </div>
          <div class="profile-div mb-5">
            <div class="profile-card shadow d-flex flex-column justify-content-center px-3 py-4 text-center">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4">
                  <?php
                  if ($profile == '') {
                    echo '<div class="text-center"><canvas class="avatar-image rounded-circle text-center p-1 shadow-sm mb-2" title="' . $name . '"></canvas></div>';
                  } else {
                    echo '<div class="text-center"><img src="' . $profile . '" alt="" class="text-center p-1 shadow-sm mb-2"></div>';
                  }
                  ?>
                  <h1 class="display-4 fw-bold mb-2 text-capitalize" style="color:var(--text-color);"><?php echo $name; ?></h1>
                  <h4 class="fw-bold text-capitalize mb-0" style="color:var(--text-color);">Total Views</h4>
                  <?php

                  $q = "SELECT `stories`.*,`post_views`.`post_per_day_views` FROM `post_views`
                  INNER JOIN `stories` ON `stories`.`post_uid`=`post_views`.`post_uid` 
                  INNER JOIN `user_login` ON `user_login`.`user_uid` =`stories`.`user_uid`
                  WHERE `user_login`.`user_uid` = '$user_uid' ";
                  $r = mysqli_query($link, $q);
                  $n = 0;
                  while ($row1 = mysqli_fetch_assoc($r)) {
                    $n += $row1['post_per_day_views'];
                  }
                  ?>
                  <h5 class="fw-bold text-capitalize mb-1" style="color:var(--text-color);"><?php echo $n; ?></h5>

                </div>

                <div class="col-sm-12 col-md-12 col-lg-8">
                  <h4 class="fw-bold text-center " style="color:var(--gray-color);">Post Stats</h4>
                  <div class="col-md-12">
                  <div id="piechart" class="chart" style="width: auto;height:130%;margin-right:5%;">
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <ul class="nav nav-tabs nav-pills mb-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="views-tab" data-bs-toggle="tab" href="#views5" role="tab" aria-controls="views5" aria-selected="true">Views</a>
        </li>
        <!-- <li class="nav-item" role="presentation"> 
<a class="nav-link " id="reads-tab" data-bs-toggle="tab" href="#reads5" role="tab" aria-controls="reads5" aria-selected="false" >Reads</a>
</li>-->
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane show active fade" id="views5" role="tabpanel" aria-labelledby="views-tab">
          <div class="post-views">
            <?php
            $count_query_views = "SELECT count(*) as allcount FROM `stories`
WHERE (`stories`.`user_uid` = '$user_uid') AND
(`stories`.`post_status` = 'published' AND `stories`.`unlisted` = 'false') 
";
            $count_result_views = mysqli_query($link, $count_query_views);
            $count_fetch_views = mysqli_fetch_array($count_result_views);
            $postCountViews = $count_fetch_views['allcount'];
            $limitViews = 2;

            $query = "SELECT `stories`.*,`post_views`.*,`user_login`.* FROM `stories`   
INNER JOIN `user_login`ON (`stories`.`user_uid` = `user_login`.`user_uid`)  
INNER JOIN `post_views` ON (`stories`.`post_uid`=`post_views`.`post_uid`)
WHERE (`stories`.`post_uid` = `post_views`.`post_uid`) AND
(`stories`.`post_status` = 'published' AND `stories`.`unlisted` = 'false') 
AND(`stories`.`user_uid` = '$user_uid') LIMIT 0," . $limitViews;
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>

                <div class="story-post-card shadow-sm d-flex justify-content-between align-items-center px-3 py-2 mb-3 gap-2">
                  <div>
                    <h5 class="fw-bold article-dot text-capitalize mb-1" style="color:var(--text-color); width:180px;
    white-space: nowrap;
    overflow:hidden !important;
    text-overflow: ellipsis;"><?php echo $row['post_title']; ?></h5>

                  </div>
                  <div class="d-flex justify-content-center align-items-center gap-2">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style="left:-10px;"></span>
                    <h5 class="fw-bold text-capitalize mb-1" style="color:var(--text-color); display:inline-block;">
                    <?php echo $row['post_per_day_views']; ?></h5>

                  </div>

                </div>
              <?php }
            } else { ?>
              <div class="my-5">
                <div class="row justify-content-center">
                  <div class="col-12 text-center">
                    <img src="assets/images/no_data.svg" alt="" class="p-3" style="width: 200px;">
                    <h6 class="fw-bold text-center" style="color:var(--gray-color)">You have no data</h6>
                    <h6 class="text-center" style="color:var(--gray-color)"><a href="create-story" class="text-link-3 fw-bold ">Write</a> a story or <a href="./" class="text-link-3 fw-bold ">read</a> on Blog CMS.</h6>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="loadMoreViewsData text-center">
            <?php
            if ($limitViews < $postCountViews) {
            ?>
              <input type="button" class="loadBtn" id="loadBtnViews" value="Load More">
            <?php } ?>
            <input type="hidden" id="rowViews" value="0">
            <input type="hidden" id="postCountViews" value="<?php echo $postCountViews; ?>">
          </div>
        </div>
        <!-- <div class="tab-pane fade" id="reads5" role="tabpanel" aria-labelledby="reads-tab"> 

<div class="reads5">
<div class="my-5">
<div class="row justify-content-center">
<div class="col-12 text-center">
<img src="assets/images/no_data.svg" alt="" class="p-3" style="width: 200px;">
<h6 class="fw-bold text-center" style="color:var(--gray-color)">You have no data</h6>
<h6 class="text-center" style="color:var(--gray-color)"><a href="create-story" class="text-link-3 fw-bold ">Write</a> a story or <a href="./"class="text-link-3 fw-bold ">read</a> on Blog CMS.</h6>
</div>
</div>
</div>

</div>                      
</div>-->

      </div>

    </div>
    </div>


    </div>
  </section>







  <!-- footer start-->
  <?php include('include/footer.php'); ?>
  <!-- footer end-->



  <!-- script -->
  <script type="text/javascript" src="assets/jquery/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/sweetalert/sweetalert.min.js"></script>
  <script src="assets/sweetalert/jquery.sweet-alert.custom.js"></script>
  <script src="assets/toastr/toastr.min.js"></script>
  <script type="text/javascript" src="assets/avatar/jquery.letterpic.min.js"></script>
  <script type="text/javascript" src="assets/js/app.js"></script>
  <script type="text/javascript" src="assets/js/loader.js"></script>


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['postuid', 'postviews'],
        <?php

        $sql2 = "SELECT `post_views`.`post_per_day_views` as total,`post_views`.`day`as day
        FROM `post_views`   
        INNER JOIN `stories`ON `stories`.`post_uid` = `post_views`.`post_uid`  
        INNER JOIN `user_login` ON `stories`.`user_uid`=`user_login`.`user_uid`
        WHERE `stories`.`post_uid` = `post_views`.`post_uid`
        AND`stories`.`user_uid` = '$user_uid' group by day order by day desc";

        $fire2 = mysqli_query($link, $sql2);

        while ($result = mysqli_fetch_assoc($fire2)) {

          echo "['" . $result['day'] . "'," . $result['total'] . "],";
        }

        ?>
      ]);

      var options = {
        title: 'Post Details',
        curveType: 'function'
      };

      var chart = new google.visualization.LineChart(document.getElementById('piechart'));

      chart.draw(data, options);
      $(window).resize(function(){
  drawChart();

});
    }
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $(".avatar-image").letterpic({
        colors: [
          "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
          "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
        ],
        font: 'Inter'
      });

      $(document).on('click', '#loadBtnViews', function() {
        var row = Number($('#rowViews').val());
        var count = Number($('#postCountViews').val());
        var limit = 2;
        row = row + limit;
        $('#rowViews').val(row);
        $("#loadBtnViews").val('Loading...');
        var user_uid = '<?php echo $user_uid ?>';


        $.ajax({
          type: 'POST',
          url: 'php/loadMoreViewsData.php',
          data: {
            'row': row,
            'user_uid': user_uid
          },
          success: function(data) {
            var rowCount = row + limit;
            $('.post-views').append(data);
            if (rowCount >= count) {
              $('#loadBtnViews').css("display", "none");
            } else {
              $("#loadBtnViews").val('Load More');
            }
            $(".avatar-image").letterpic({
              colors: [
                "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
                "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
              ],
              font: 'Inter'
            });
          }
        });

      });
    });
  </script>
</body>

</html>