<!doctype html>
<html lang="en">
  <head>

    {{-- Jquery Form --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
    {{-- Bootstrap CSS --}}
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbars/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- Ajax Lib --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js" integrity="sha512-/n/dTQBO8lHzqqgAQvy0ukBQ0qLmGzxKhn8xKrz4cn7XJkZzy+fAtzjnOQd5w55h4k1kUC+8oIe6WmrGUYwODA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
      @media print {
        body * {
          visibility: hidden;
        }
        #dataQ * {
          visibility: visible;
        }
        #dataQ {
          position: center;
          left: 0;
          top: 0;
        }
      }

      #CatBtn{
        background : #2696c9;
        margin : 7%;
        border-radius : 0px;
      }
    </style>
  <title>@yield('Title')</title>
  <link rel="shortcut icon" type="x-icon" href="/assets/QMSLogo.jpg">
  </head>
  <body>
      @include('partials.navbar')

    <div class="container">
        @yield('container')
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        $('#close').click(function(){
          window.location.replace('category');
        })

        setInterval(function () {
          $( "#QContent" ).load(window.location.href + " #QContent" ); //Don't disregard the space within the load element selector: + " #here"
        },5000);
    </script>
  </body>
      @include('partials.footer')
</html>
