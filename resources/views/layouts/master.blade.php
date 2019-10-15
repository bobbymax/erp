
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets-new/img/favicon.png">

    <title>@yield('title', 'Welcome to NCDMB Local ERP')</title>

    <!-- vendor css -->
    <link href="/assets-new/css/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/assets-new/css/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="/assets-new/js/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="/assets-new/css/dashforge.css">
    <link rel="stylesheet" href="/assets-new/css/dashforge.dashboard.css">

    <style>
      .footer-new {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
      }
    </style>
  </head>
  <body class="page-profile">

    @include('partials.updated.header')

    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">

        @yield('content')

      </div><!-- container -->
    </div><!-- content -->

    @include('partials.updated.footer')

    <script src="/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets-new/js/feather-icons/feather.min.js"></script>
    <script src="/assets-new/js/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets-new/js/jquery.flot/jquery.flot.js"></script>
    <script src="/assets-new/js/jquery.flot/jquery.flot.stack.js"></script>
    <script src="/assets-new/js/jquery.flot/jquery.flot.resize.js"></script>
    <script src="/assets-new/js/flot.curvedlines/curvedLines.js"></script>
    <script src="/assets-new/js/peity/jquery.peity.min.js"></script>
    <script src="/assets-new/js/chart.js/Chart.bundle.min.js"></script>


    <script src="/assets-new/js/dashforge.js"></script>
    <script src="/assets-new/js/dashforge.sampledata.js"></script>
    <script src="/js/sweetalert.min.js"></script>

    <!-- append theme customizer -->
    <script src="/assets-new/js/js-cookie/js.cookie.js"></script>
    <script src="/assets-new/js/dashforge.settings.js"></script>
    <script src="/js/typeahead.js"></script>

    @include('flash')
    @yield('scripts')

    <script>
      $(function(){
        'use strict'

        $.plot('#flotChart1', [{
          data: df2,
          color: '#65e0e0'
        },{
          data: df1,
          color: '#69b2f8'
        },{
          data: df3,
          color: '#0168fa',
          lines: {
            show: true,
            lineWidth: 1.5
          },
          bars: { show: false }
        }], {
          series: {
            shadowSize: 0,
            bars: {
              show: true,
              lineWidth: 0,
              barWidth: .5,
              fill: 1
            }
          },
          grid: {
            color: '#c0ccda',
            borderWidth: 0,
            labelMargin: 10
          },
          yaxis: {
            show: true,
            max: 90,
            tickSize: 15
          },
          xaxis: {
            color: 'transparent',
            show: true,
            max: 37,
            ticks: [[0,'Mar 10'],[5,'Mar 11'],[10,'Mar 12'],[15,'Mar 13'],[20,'Mar 14'],[25,'Mar 15'],[30,'Mar 16'],[35,'Mar 17']]
          }
        });

        // Donut chart
        $('.peity-donut').peity('donut');


        $.plot('#flotChart2', [{
          data: df3,
          color: '#0168fa',
          curvedLines: { apply: true }
        }], {
          series: {
            shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 1.5,
              fill: .05
            }
          },
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
          yaxis: {
            show: false,
            max: 55
          },
          xaxis: {
            show: true,
            color: 'rgba(131,146,165,.08)',
            min: 48,
            max: 102,
            tickSize: 5
          }
        });
      })

      // Horizontal bar chart
      var ctx2 = document.getElementById('chartBar2').getContext('2d');
      new Chart(ctx2, {
        type: 'horizontalBar',
        data: {
          labels: ['Modification', 'Code Request', 'Feature Request', 'Bug Fix', 'Integration', 'Production'],
          datasets: [{
            data: [90, 60, 50, 95, 50, 60],
            backgroundColor: ['#65e0e0', '#69b2f8','#6fd39b','#f77eb9','#fdb16d','#c693f9']
          },{
            data: [60, 50, 70, 45, 70, 30],
            backgroundColor: '#e5e9f2'
          }]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          legend: {
            display: false,
            labels: {
              display: false
            }
          },
          layout: {
            padding: {
              left: 5
            }
          },
          scales: {
            yAxes: [{
              gridLines: {
                display: false
              },
              barPercentage: 0.5,
              ticks: {
                beginAtZero:true,
                fontSize: 13,
                fontColor: '#182b49',
                fontFamily: 'IBM Plex Sans'
              }
            }],
            xAxes: [{
              gridLines: {
                color: '#e5e9f2'
              },
              ticks: {
                beginAtZero: true,
                fontSize: 10,
                fontColor: '#182b49',
                max: 100
              }
            }]
          }
        }
      });
    </script>
  </body>
</html>
