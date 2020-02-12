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
    <link href="/assets-new/css/quill/quill.core.css" rel="stylesheet">
    <link href="/assets-new/css/quill/quill.snow.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="/assets-new/css/dashforge.css">
    <link rel="stylesheet" href="/assets-new/css/dashforge.mail.css">

  </head>
  <body class="app-mail">

    @include('partials.updated.header')

    <div id="app">
      
      <!-- mail wrapper -->
      <div class="mail-wrapper">
        @include('mail.partials.mail-sidebar')


        @yield('content')

        
      </div><!-- end mail-wrapper -->

      <!-- compose new mail -->
      @include('mail.modal.compose')
      <!-- end compose mail -->

    </div>


    <script src="/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets-new/js/feather-icons/feather.min.js"></script>
    <script src="/assets-new/js/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets-new/css/quill/quill.min.js"></script>

    <script src="/assets-new/js/dashforge.js"></script>
    <script src="/assets-new/js/dashforge.mail.js"></script>
    <script src="/js/sweetalert.min.js"></script>

    <!-- append theme customizer -->
    <script src="/assets-new/js/js-cookie/js.cookie.js"></script>
    <script src="/js/typeahead.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    @include('flash')
    @yield('scripts')


    <script>
      
    
      let mail = new Vue({

          el: "#app",
          data: {
            conversations: {},
            convo: {},
          },
          methods: {
            getThreads(value) {
              $.ajax({
                url : url,
                context: this,
                data : { 
                    convo : value,
                    _token : token 
                },
                method : 'POST',
                success : function(data) {
                  this.convo = data;
                },
                error : function(data) {
                    console.log(data);
                }
              }); 
            }
          },
          created() {
            this.conversations = JSON.parse(conversations.replace(/&quot;/g,'"'))
          },


      });

    </script>

  </body>
</html>
