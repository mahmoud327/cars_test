<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="auto, car, car dealer, car dealership, car listing, cars, classified, dealership, directory, listing, modern, motors, responsive">
  <meta name="description" content="Ezcariq - Automotive & Car Dealer">
  <meta name="CreativeLayers" content="ATFN">
  <!-- css file -->
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('site/css/dashbord_navitaion.css')}}">
  <link rel="stylesheet" href="{{asset('site/css/fileuploader.css')}}">
  <!-- Responsive stylesheet -->
  <link rel="stylesheet" href="{{asset('site/css/responsive.css')}}">
  <!-- Title -->
  <title><?php echo $title; ?></title>
  <!-- Favicon -->
  <link href="{{asset('on/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
  <link href="{{asset('on/favicon.ico" sizes="128x128" rel="shortcut icon" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .title{
                font-family: 'Roboto', sans-serif;
                font-size:15px;
                font-weight: 700;
            }
           iframe {
  display: none;
}
            .VIpgJd-ZVi9od-aZ2wEe{
                display:none;
            }
            .goog-te-combo{
                position: relative;
  display: inline-block;
  margin: 20px;
            }
           .goog-te-combo {
                 display: inline-block;
  padding: 12px 50px 12px 20px;
  font-size: 16px;
  font-family: Arial, sans-serif;
  font-weight: bold;
  color: #333;
  border: none;
  background-color: #f2f2f2;
  appearance: none;
            }

        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>
  <div class="wrapper ovh">
    <!--<div class="preloader"></div>-->
    <!-- Sidebar Panel Start -->

    <!-- Sidebar Panel End -->

    <!-- header top -->


    <!-- Main Header Nav -->

    <?php $this->load->view("site/layout/header2.php") ?>
    <!-- Main Header Nav For Mobile -->

   <?php $this->load->view($subPage); ?>

    <!-- Our Footer -->

    <?php
    if($this->uri->segment(1)=="Company"){

    }else{
    $this->load->view("site/layout/footer.php");
    }


    ?>

    <a class="scrollToHome" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
  <!-- Wrapper End -->
  <!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyDKQyuecIyHYCUzIDVtpKY6I9x100fa890&libraries=places&callback=initAutocomplete" type="text/javascript"></script> -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKQyuecIyHYCUzIDVtpKY6I9x100fa890&amp;callback=initMap"></script>
  <script src="{{asset('site/js/jquery-3.6.0.js')}}"></script>
  <script src="{{asset('site/js/jquery-migrate-3.0.0.min.js')}}"></script>
  <script src="{{asset('site/js/popper.min.js')}}"></script>
  <script src="{{asset('site/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('site/js/bootstrap-select.min.js')}}"></script>
  <script src="{{asset('site/js/jquery.mmenu.all.js')}}"></script>
  <script src="{{asset('site/js/ace-responsive-menu.js')}}"></script>
  <script src="{{asset('site/js/chart.min.js')}}"></script>
  <script src="{{asset('site/js/chart-custome.js')}}"></script>
  <script src="{{asset('site/js/snackbar.min.js"></script>
  <script src="{{asset('site/js/isotop.js')}}"></script>
  <script src="{{asset('site/js/simplebar.js')}}"></script>
  <script src="{{asset('site/js/parallax.js')}}"></script>
  <script src="{{asset('site/js/scrollto.js')}}"></script>
  <script src="{{asset('site/js/jquery-scrolltofixed-min.js')}}"></script>
  <script src="{{asset('site/js/jquery.counterup.js')}}"></script>
  <script src="{{asset('site/js/wow.min.js')}}"></script>
  <script src="{{asset('site/js/progressbar.js')}}"></script>
  <script src="{{asset('site/js/slider.js"></script>
  <script src="{{asset('site/js/jquery.smartuploader.js')}}"></script>
  <script src="{{asset('site/js/timepicker.js')}}"></script>
  <script src="{{asset('site/js/wow.min.js')}}"></script>
  <script src="{{asset('site/js/dashboard-script.js')}}"></script>
  <script src="{{asset('site/address.js')}}"></script>

  <script src="{{asset('site/js/googlemaps1.js')}}"></script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


  <!-- Custom script for all pages -->
  <script src="{{asset('js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    $(function () {
    $('.addToWish').on('click', function () {
        var listingId = $(this).attr("data-id");
        $(this).css("color","red");
        $.ajax({
            url: '{{asset('st") ?>',
            type: "post",
            data: {
                listingId:listingId,
            },
            dataType : 'html',
              success: function (response) {
                  $(this).css("color","red");
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(jqXHR.responseText);
        }
        });
    });
});
    $(document).ready(function() {
        $('.fa-camera').click(function() {
            $('#companyLogoUpload').click();
        });

        $('#companyLogoUpload').change(function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.rounded-circle').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
    </script>
    <script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,ar'}, 'google_translate_element');
}

$(document).ready(function() {
  $('.skiptranslate').remove();
});
</script>
</body>

<!-- Mirrored from creativelayers.net/themes/voiture-html/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Dec 2022 10:22:26 GMT -->

</html>
