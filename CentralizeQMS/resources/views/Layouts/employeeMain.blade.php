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
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <title>@yield('Title')</title>
    <link rel="shortcut icon" type="x-icon" href="/assets/QMSLogo.jpg">
  </head>

  <body>
    @include('partials.employeeNav')
    <div class="row">
        @include('partials.employeeSideBar')
    </div>
    <div class="container">
        @yield('container')
    </div>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="/js/dashboard.js"></script>

<script>
  setInterval(function () {
          $( "#QContent" ).load(window.location.href + " #QContent" ); //Don't disregard the space within the load element selector: + " #here"
  },5000);
</script>
<!-- <script>
  var category,nama = "";
  var Ctr1,Ctr2,Ctr3 = 0;

  //current Queue parts
  // $('#skip1').click(function($category){
  //       category= $('#skip1').val();
  //       $.ajax({
  //             url : '/EPage/skip/'+category,
  //             method : 'get',
  //             success:function(){
  //               window.location.reload();
  //             }
  //       })
  //     })

      $('#done1').click(function($category){
        category= $('#done1').val();
        Ctr1+1;
        $.ajax({
              url : '/EPage/done/'+category,
              method : 'get',
              success:function(){
                window.location.reload();
              }
        })
      })

      $('#skip2').click(function($category){
        category= $('#skip2').val();
        $.ajax({
              url : '/EPage/skip/'+category,
              method : 'get',
              success:function(){
                window.location.reload();
              }
        })
      })

      $('#done2').click(function($category){
        category= $('#done2').val();
        Ctr1+1;
        $.ajax({
              url : '/EPage/done/'+category,
              method : 'get',
              success:function(){
                window.location.reload();
              }
        })
      })

      $('#skip3').click(function($category){
        category= $('#skip3').val();
        $.ajax({
              url : '/EPage/skip/'+category,
              method : 'get',
              success:function(){
                window.location.reload();
              }
        })
      })

      $('#done3').click(function($category){
        category= $('#done3').val();
        Ctr1+1;
        $.ajax({
              url : '/EPage/done/'+category,
              method : 'get',
              success:function(){
                window.location.reload();
              }
        })
      })

      // Skipp Queue parts
      $('#next1').click(function($category){
        category= $('#next1').val();
        Ctr1+1;
        $.ajax({
              url : '/EPage/skip/call/'+category,
              method : 'get',
              success:function(){
                window.location.reload();
              }
        })
      })

      $('#next2').click(function($category){
        category= $('#next2').val();
        Ctr1+1;
        $.ajax({
              url : '/EPage/skip/call/'+category,
              method : 'get',
              success:function(){
                window.location.reload();
              }
        })
      })

      $('#next3').click(function($category){
        category= $('#next3').val();
        Ctr1+1;
        $.ajax({
              url : '/EPage/skip/call/'+category,
              method : 'get',
              success:function(){
                window.location.reload();
              }
        })
      })
</script> -->

  </body>
  @include('partials.footer')
</html>