 <?php require_once __DIR__.'/../header.php';
?> 
<html lang="en" >
    <!-- begin::Head -->
    <head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/freshgrc/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>Compliance Dashboard</title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->

                    <!--begin::Page Vendors Styles(used by this page) -->
                            <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
                        <!--end::Page Vendors Styles -->
        
        
        <!--begin:: Global Mandatory Vendors -->
<link href="assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<link href="assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
 <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    </head>
<?php 
include '../siteHeader.php';
?>
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >

<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top: -10%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<!--Begin::Dashboard 3-->
<!--Begin::Row-->
<div class="row">
     <div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">
        <!--begin:: Widgets/Activity-->
<div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
    <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
        <div class="kt-portlet__head-label">
           <h3 class="kt-portlet__head-title">
                Activity
           </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <a href="#" class="btn btn-label-light btn-sm btn-bold dropdown-toggle" data-toggle="dropdown">
                Export
            </a>
            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                <ul class="kt-nav">
    <li class="kt-nav__section kt-nav__section--first">
        <span class="kt-nav__section-text">Finance</span>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <i class="kt-nav__link-icon flaticon2-graph-1"></i>
            <span class="kt-nav__link-text">Statistics</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
            <span class="kt-nav__link-text">Events</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <i class="kt-nav__link-icon flaticon2-layers-1"></i>
            <span class="kt-nav__link-text">Reports</span>
        </a>
    </li>
    <li class="kt-nav__section">
        <span class="kt-nav__section-text">Customers</span>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
            <span class="kt-nav__link-text">Notifications</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <i class="kt-nav__link-icon flaticon2-file-1"></i>
            <span class="kt-nav__link-text">Files</span>
        </a>
    </li>
</ul>           </div>
        </div>
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="kt-widget17">
            <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #fd397a">
                <div class="kt-widget17__chart" style="height:320px;">
                    <canvas id="kt_chart_activities"></canvas>
                </div>
            </div>
            <div class="kt-widget17__stats">
                <div class="kt-widget17__items">
                    <div class="kt-widget17__item">
                        <span class="kt-widget17__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect id="bound" x="0" y="0" width="24" height="24"/>
        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" id="Combined-Shape" fill="#000000"/>
        <rect id="Rectangle-Copy-2" fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
    </g>
</svg>                      </span> 
                        <span class="kt-widget17__subtitle">
                            
                            RECORDED
                        </span> 
                        <span class="kt-widget17__desc">
                            15 New Paskages
                        </span>  
                    </div>

                    <div class="kt-widget17__item">
                        <span class="kt-widget17__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon id="Bound" points="0 0 24 0 24 24 0 24"/>
        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"/>
        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"/>
    </g>
</svg>                      </span>  
                        <span class="kt-widget17__subtitle">
                            ASSIGNED
                        </span> 
                        <span class="kt-widget17__desc">
                            72 New Items
                        </span>  
                    </div>                  
                </div>
                <div class="kt-widget17__items">
                    <div class="kt-widget17__item">
                        <span class="kt-widget17__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--warning">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect id="bound" x="0" y="0" width="24" height="24"/>
        <path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
        <path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" id="Combined-Shape" fill="#000000"/>
    </g>
</svg>                      </span>  
                        <span class="kt-widget17__subtitle">
                            RESOLVED
                        </span> 
                        <span class="kt-widget17__desc">
                            72 Support Cases
                        </span>  
                    </div>  

                    <div class="kt-widget17__item">
                        <span class="kt-widget17__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--danger">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect id="bound" x="0" y="0" width="24" height="24"/>
        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" id="Rectangle-102-Copy" fill="#000000"/>
    </g>
</svg>                      </span>  
                        <span class="kt-widget17__subtitle">
                           CLOSED
                        </span> 
                        <span class="kt-widget17__desc">
                            34 Upgraded Boxes
                        </span>  
                    </div>              
                </div>
            </div>
        </div>
    </div>
</div>
<!--end:: Widgets/Activity-->   </div>     
    
<div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">
    
        <!--begin:: Widgets/Profit Share-->
<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-widget14">
        <div class="kt-widget14__header">
            <h3 class="kt-widget14__title">
                INCIDENT STATUS         
            </h3>
           
        </div>   
        <div class="kt-widget14__content">  
            <div class="kt-widget14__chart">
                <div class="kt-widget14__stat">45</div>
                <canvas id="kt_chart_profit_share" style="height: 240px; width: 240px;"></canvas>
            </div> 
            <div class="kt-widget14__legends">
                <div class="kt-widget14__legend">
                    <span class="kt-widget14__bullet kt-bg-success"></span>
                    <span class="kt-widget14__stats">37% Sport Tickets</span>
                </div>
                <div class="kt-widget14__legend">
                    <span class="kt-widget14__bullet kt-bg-warning"></span>
                    <span class="kt-widget14__stats">47% Business Events</span>
                </div>
                <div class="kt-widget14__legend">
                    <span class="kt-widget14__bullet kt-bg-brand"></span>
                    <span class="kt-widget14__stats">19% Others</span>
                </div>
            </div>          
        </div> 
    </div>
</div>      
<!--end:: Widgets/Profit Share-->  </div>

</div>
<!--End::Row-->

<!--Begin::Row-->
<div class="row">
        
<div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">
    
        <!--begin:: Widgets/Profit Share-->
<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-widget14">
        <div class="kt-widget14__header">
            <h3 class="kt-widget14__title">
                INCIDENT TYPES        
            </h3>
           
        </div>   
        <div class="kt-widget14__content">  
            <div class="kt-widget14__chart">
                <div class="kt-widget14__stat">45</div>
                <canvas id="kt_chart_profit_share" style="height: 240px; width: 240px;"></canvas>
            </div> 
            <div class="kt-widget14__legends">
                <div class="kt-widget14__legend">
                    <span class="kt-widget14__bullet kt-bg-success"></span>
                    <span class="kt-widget14__stats">37% Sport Tickets</span>
                </div>
                <div class="kt-widget14__legend">
                    <span class="kt-widget14__bullet kt-bg-warning"></span>
                    <span class="kt-widget14__stats">47% Business Events</span>
                </div>
                <div class="kt-widget14__legend">
                    <span class="kt-widget14__bullet kt-bg-brand"></span>
                    <span class="kt-widget14__stats">19% Others</span>
                </div>
            </div>          
        </div> 
    </div>
</div>      
<!--end:: Widgets/Profit Share-->  </div>
       
<div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">
    
        <!--begin:: Widgets/Profit Share-->
<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-widget14">
        <div class="kt-widget14__header">
            <h3 class="kt-widget14__title">
                INCIDENT SOURCE        
            </h3>
           
        </div>   
        <div class="kt-widget14__content">  
            <div class="kt-widget14__chart">
                <div class="kt-widget14__stat">45</div>
                <canvas id="kt_chart_profit_share" style="height: 240px; width: 240px;"></canvas>
            </div> 
            <div class="kt-widget14__legends">
                <div class="kt-widget14__legend">
                    <span class="kt-widget14__bullet kt-bg-success"></span>
                    <span class="kt-widget14__stats">37% Sport Tickets</span>
                </div>
                <div class="kt-widget14__legend">
                    <span class="kt-widget14__bullet kt-bg-warning"></span>
                    <span class="kt-widget14__stats">47% Business Events</span>
                </div>
                <div class="kt-widget14__legend">
                    <span class="kt-widget14__bullet kt-bg-brand"></span>
                    <span class="kt-widget14__stats">19% Others</span>
                </div>
            </div>          
        </div> 
    </div>
</div>      
<!--end:: Widgets/Profit Share-->  </div>


</div>
<!--End::Row-->

<!--Begin::Row-->
<div class="row">
    <div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">
        <!--begin:: Widgets/Finance Summary-->
<div class="kt-portlet kt-portlet--fit kt-portlet--height-fluid">
<div class="kt-portlet__head kt-portlet__space-x">
<div class="kt-portlet__head-label">
<h3 class="kt-portlet__head-title">
PENDING AUDIT FOR THE WEEK
</h3>
</div>
<div class="kt-portlet__head-toolbar">
<div class="dropdown dropdown-inline">
<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="flaticon-more-1"></i>
</button>
<div class="dropdown-menu dropdown-menu-right">
                    <ul class="kt-nav">
    <li class="kt-nav__section kt-nav__section--first">
        <span class="kt-nav__section-text">Finance</span>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <i class="kt-nav__link-icon flaticon2-graph-1"></i>
            <span class="kt-nav__link-text">Statistics</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
            <span class="kt-nav__link-text">Events</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <i class="kt-nav__link-icon flaticon2-layers-1"></i>
            <span class="kt-nav__link-text">Reports</span>
        </a>
    </li>
    <li class="kt-nav__section">
        <span class="kt-nav__section-text">Customers</span>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
            <span class="kt-nav__link-text">Notifications</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <i class="kt-nav__link-icon flaticon2-file-1"></i>
            <span class="kt-nav__link-text">Files</span>
        </a>
    </li>
</ul>   </div>
</div>
</div>
</div>
<div class="kt-portlet__body kt-portlet__body--fluid">
<div class="kt-widget12">
<div class="kt-widget12__content kt-portlet__space-x kt-portlet__space-y">
<div class="kt-widget12__item">
<div class="kt-widget12__info">
<span class="kt-widget12__desc">Annual Companies Taxes EMS</span>
<span class="kt-widget12__value">$500,000</span>
</div>  

<div class="kt-widget12__info">
<span class="kt-widget12__desc">Next Tax Review Date</span>
<span class="kt-widget12__value">July 24,2017</span>
</div>  
</div>
<div class="kt-widget12__item">
<div class="kt-widget12__info">
<span class="kt-widget12__desc">Avarage Product Price</span>
<span class="kt-widget12__value">$60,70</span>
</div>
<div class="kt-widget12__info">
<span class="kt-widget12__desc">Satisfication Rate</span>
<div class="kt-widget12__progress">
<div class="progress kt-progress--sm">
<div class="progress-bar bg-brand" role="progressbar" style="width: 60%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div>  
<span class="kt-widget12__stat">
63%
</span>
</div>
</div>  
</div>
</div>
<div class="kt-widget12__chart" style="height:290px;">
<canvas id="kt_chart_finance_summary"></canvas>
</div>
</div>  
</div>
</div>
<!--end:: Widgets/Finance Summary--> 
            </div>    
    <div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">
       <!--begin:: Widgets/Daily Sales-->
<div class="kt-portlet kt-portlet--height-fluid">
<div class="kt-widget14">
<div class="kt-widget14__header kt-margin-b-30">
<h3 class="kt-widget14__title">
INCIDENT CATEGORY            
</h3>

</div>
<div class="kt-widget14__chart" style="height:120px;">
<canvas  id="kt_chart_daily_sales"></canvas>
</div>
</div>
</div>  
<!--end:: Widgets/Daily Sales-->

</div>


</div>
<!--End::Row-->

<!--End::Dashboard 3--> </div>
<!-- end:: Content -->  </div>  

</div>
</div>
</div>
<?php 
include '../audit/sidemenu.php';
 ?>
<!-- end:: Page -->


        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->
<script src="assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/dropzone.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/quill/dist/quill.js" type="text/javascript"></script>
<script src="assets/vendors/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-markdown.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-notify.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
<script src="assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
<script src="assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
<script src="assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>
<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle(used by all pages) -->
          
      <script src="assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
<!--end::Global Theme Bundle -->

                    <!--begin::Page Vendors(used by this page) -->
                            <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
                            <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
                            <script src="assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>
                        <!--end::Page Vendors -->
         
                    <!--begin::Page Scripts(used by this page) -->
                            <script src="assets/js/demo3/pages/dashboard.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->
            </body>
    <!-- end::Body -->
</html>
