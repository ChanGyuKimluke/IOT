<?php session_start(); ?>
<!DOCTYPE HTML>
<?php
if(!isset($_SESSION['email']))
{
?><meta http-equiv="refresh" content="0;url=http://teamb-iot.calit2.net/user_log_in.php">
<?php
    exit;
}
?>
<html>
   <head>
      <title>QI B team Homepage</title>

      
      <link rel="stylesheet" href="assets/css/main.css" />
      
      <style type="text/css">
      html, body {
        
        margin: 0;
        padding: 0;
        margin: 0px;
        padding: 0px;
      }
      #relative
      {
        width:auto;
        height:auto;
        position:relative;
        float:right;
      }
      </style>
      
      <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">



      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);


      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'CO'],
          ['7/15',  1000],
          ['7/16',  1170],
          ['7/17',  660],
          ['7/18',  1030],
          ['7/19',  124],
          ['7/20',  764],
          ['7/21',  110],
          ['7/22',  655],
          ['7/23',  329],
          ['7/24',  492],
          ['7/25',  967],
          ['7/26',  543],
          ['7/27',  460],
          ['7/28',  1030]
        ]);

      
      var options = {
          title: 'CO'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

    </script>
   </head>
   <body>

      <!-- Wrapper -->
         <div id="wrapper">
         
         

            <!-- Main -->
               <div id="main">
                  <div class="inner">

                     <!-- Header -->
                        <header id="header">
                           <a href="index.php" class="logo"><strong>QI Airpollution Center</strong> by B team</a>
                           <ul class="icons">
                              <li><a href="https://twitter.com" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                              <li><a href="https://www.facebook.com" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                              <li><a href="https://www.snapchat.com" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
                              <li><a href="https://www.instagram.com" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                              <li><a href="https://medium.com" class="icon fa-medium"><span class="label">Medium</span></a></li>
                           </ul>
                        </header>
                        <br>
                        <div id="relative">
                        <form method="post" action="user_log_out.php">
                          <input type="submit" value="log-out"  />
                        </form>
                        </div>
                        </br>

                     <!-- Banner -->
                     
                        <section id="banner">
                           <div class="content">
                              <header>
                                 <h3>CO</h3>
                                 <!-- google graph -->
                                 <div id="chart_div" style="width: 900px; height: 500px;"></div>
                              </header>
                              
                           </div>
                        </section>
                  </div>
               </div>

            <!-- Sidebar -->
         <div id="sidebar">
            <div class="inner">

               <!-- Search -->

               <!-- Menu -->
               <nav id="menu">
                  <header class="major">
                     <h2>Menu</h2>
                  </header>
                  <ul>
                     <li>
                     <span class="opener">Air pollution History</span>
                     <ul>
                        <li><a href="co_data.php">CO</a></li>
                        <li><a href="airpollution_co2.html">CO2</a></li>
                        <li><a href="airpollution_so2.html">SO2</a></li>
                        <li><a href="airpollution_no2.html">NO2</a></li>
                        <li><a href="airpollution_o3.html">O3</a></li>
                        <li><a href="airpollution_PM2.5.html">PM2.5</a></li>
                        <li><a href="airpollution_temperature.html">Temperature</a></li>
                        <li><a href="airpollution_humidity.html">humidity</a></li>
                     </ul>
                  </li>

                  <li>
                  <span class="opener">HeartBeat History</span>
                  <ul>
                     <li><a href="basic.html">Heart rate</a></li>
                     <li><a href="#">Breathing rate</a></li>
                  </ul>
               </li>
                     <li><a href="user_information.php">Users Information</a></li>

                  </ul>
               </nav>
                     <!-- Section -->
                        <section>
                           <header class="major">
                              <h2>Get in touch</h2>
                           </header>
                           <p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                           <ul class="contact">
                              <li class="fa-envelope-o"><a href="#">softeran@gmail.com</a></li>
                              <li class="fa-phone">(404)271-3932</li>
                              <li class="fa-home">1234 Somewhere Road #8254<br />
                              Nashville, TN 00000-0000</li>
                           </ul>
                        </section>

                     <!-- Footer -->
                        <footer id="footer">
                           <p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
                        </footer>

                  </div>
               </div>

         </div>

      <!-- Scripts -->
         <script src="assets/js/jquery.min.js"></script>
         <script src="assets/js/skel.min.js"></script>
         <script src="assets/js/util.js"></script>
         <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
         <script src="assets/js/main.js"></script>

   </body>
</html>