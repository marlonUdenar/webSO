<?php require('./layouts/header.php') ?> 

<script>
const homeLink = document.getElementById("contact");
homeLink.classList.add("active");
</script>
      <!-- end header -->
      <div class="contact-bg">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="contactheading">
                     <h3>Sitios de Interes</h3>
                  </div>
               </div>
            </div>
         </div>
      </div>


      <!-- section -->
      <html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="css/main.css" />
		<noscript><link rel="stylesheet" href="css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
      <?php require('loadevent.php') ?> 

		<!-- Scripts -->
			<script src="js/jqueryE.min.js"></script>
			<script src="js/jqueryE.poptrox.min.js"></script>
			<script src="js/browser.min.js"></script>
			<script src="js/breakpoints.min.js"></script>
			<script src="js/util.js"></script>
			<script src="js/main.js"></script>

         </body>
</html>
      <!-- end section -->
      
      <!--footer-->
<?php require('./layouts/footer.php') ?>