<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="auto, car, car dealer, car dealership, car listing, cars, classified, dealership, directory, listing, modern, motors, responsive">
  <meta name="description" content="Voiture - Automotive & Car Dealer HTML Template">
  <meta name="CreativeLayers" content="ATFN">
  <!-- css file -->
  <link rel="stylesheet" href="<?php echo base_url("public/site/") ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url("public/site/") ?>css/style.css">
  <link rel="stylesheet" href="<?php echo base_url("public/site/") ?>css/dashbord_navitaion.css">
  <link rel="stylesheet" href="<?php echo base_url("public/site/") ?>css/fileuploader.css">
  <!-- Responsive stylesheet -->
  <link rel="stylesheet" href="<?php echo base_url("public/site/") ?>css/responsive.css">
  <!-- Title -->
  <title><?php echo $title; ?></title>
  <!-- Favicon -->
  <link href="<?php echo base_url("public/") ?>favicon/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
  <link href="<?php echo base_url("public/") ?>favicon/favicon.ico" sizes="128x128" rel="shortcut icon" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

</head>

<body>
  <div class="wrapper ovh">
    <div class="preloader"></div>
    <!-- Sidebar Panel Start -->

    <!-- Sidebar Panel End -->

    <!-- header top -->


    <!-- Main Header Nav -->

    <?php $this->load->view("site/layout/header2.php") ?>
    <!-- Main Header Nav For Mobile -->

   <?php $this->load->view($subPage); ?>

    <!-- Our Footer -->
    <?php //$this->load->view("site/layout/footer.php");  ?>
  
    <a class="scrollToHome" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
  <!-- Wrapper End -->
  <!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyDKQyuecIyHYCUzIDVtpKY6I9x100fa890&libraries=places&callback=initAutocomplete" type="text/javascript"></script> -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKQyuecIyHYCUzIDVtpKY6I9x100fa890&amp;callback=initMap"></script>
  <script src="<?php echo base_url("public/site/") ?>js/jquery-3.6.0.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/jquery-migrate-3.0.0.min.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/popper.min.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/bootstrap-select.min.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/jquery.mmenu.all.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/ace-responsive-menu.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/chart.min.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/chart-custome.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/snackbar.min.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/isotop.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/simplebar.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/parallax.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/scrollto.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/jquery-scrolltofixed-min.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/jquery.counterup.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/wow.min.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/progressbar.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/slider.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/jquery.smartuploader.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/timepicker.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/wow.min.js"></script>
  <script src="<?php echo base_url("public/site/") ?>js/dashboard-script.js"></script>
  <script src="<?php echo base_url("public/site/") ?>address.js"></script>

  <script src="<?php echo base_url("public/site/") ?>js/googlemaps1.js"></script>
  
  <!-- Custom script for all pages -->
  <script src="<?php echo base_url("public/site/") ?>js/script.js"></script>
  <script>
    function confirmDelete(item) {
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    item = item.id;
                    var path = $("#" + item).attr("data-delete-path");
                    var column = $("#" + item).attr("data-column");
                    var datadeleteId = $("#" + item).attr("data-delete");
                    deleteData(path, datadeleteId, column);
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            })
    }

    function deleteData(path, datadeleteId, column) {
        $.ajax({
            url: "<?php echo base_url(); ?>" + path,
            type: "POST",
            data: {
                column: column,
                datadeleteId: datadeleteId,

            },
            dataType: "html",
            success: function() {
                swal("Done!", "It was succesfully deleted!", "success");
                window.location.reload();
            },
            error: function(xhr, status, error) {
                var err = xhr.responseText;
                console.log(err);
            }
        });
    }
    </script>
</body>

<!-- Mirrored from creativelayers.net/themes/voiture-html/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Dec 2022 10:22:26 GMT -->

</html>