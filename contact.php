<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<title>Contact | Villejuif Underground</title>
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>

	<body>
		
		<div id="site-content">
			<header class="site-header">
				<div class="container">
					<a href="index.html" id="branding">
						<img src="images/logo.png" alt="Site Title">
					</a> <!-- #branding -->
					
					<nav class="main-navigation">
						<button type="button" class="toggle-menu"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="index.html">Accueil</a></li>
							<li class="menu-item"><a href="about.html">À Propos</a></li>
							<li class="menu-item"><a href="gallery.html">Photos</a></li>
							<li class="menu-item"><a href="download.html">Écouter</a></li>
							<li class="menu-item"><a href="blog.html">Blog</a></li>
							<li class="menu-item current-menu-item"><a href="contact.html">Contact</a></li>
						</ul> <!-- .menu -->
					</nav> <!-- .main-navigation -->
					<div class="mobile-menu"></div>
				</div>
			</header> <!-- .site-header -->
			
			  <div class="container">
					  <?php if(array_key_exists('errors',$_SESSION)): ?>
					  <div class="alert alert-danger">
					  <?= implode('<br>', $_SESSION['errors']); ?>
					  </div>
					  <?php endif; ?>
					  <?php if(array_key_exists('success',$_SESSION)): ?>
					  <div class="alert alert-success">
					  Votre email à bien été transmis !
					  </div>
					  <?php endif; ?>  	 	
						<h2 class="page-title">Contactez nous</h2>
						<div class="row">
							<div class="col-md-6">
								<form action="send_form.php" class="contact-form" method="post">
								<label for="inputname">Votre nom</label>	
									 <input required type="text" name="name" class="form-control" id="inputname" value="<?php echo isset($_SESSION['inputs']['name'])? $_SESSION['inputs']['name'] : ''; ?>">
									<label for="inputemail">Votre email</label> 
									 <input required type="email" name="email" class="form-control" id="inputemail" value="<?php echo isset($_SESSION['inputs']['email'])? $_SESSION['inputs']['email'] : ''; ?>">
									 <label for="inputmessage">Votre message</label>
									  <textarea required id="inputmessage" name="message" class="form-control"><?php echo isset($_SESSION['inputs']['message'])? $_SESSION['inputs']['message'] : ''; ?></textarea>
									  <div class="col-md-12">								
									<input type="submit" value="Envoyer">
								</form>
							</div>
						</div>
					</div>
				</div> 

				
			</main>  

			<footer class="site-footer">
				<div class="container">
					<img id="logoFooter" src="images/logo.png" alt="Logo Site">
					
					<address>
						<p>Villejuif, Île-de-France<br><a href="mailto:villejuifunderground@gmail.com">villejuifunderground@gmail.com</a></p> 
					</address> 
					
					<form action="#" class="newsletter-form">
						<input type="email" placeholder="Entrez votre email pour vous joindre à la newsletter...">
						<input type="submit" class="button cut-corner" value="S'abonner">
					</form> 
					
					<div class="social-links">
						<a href="https://www.facebook.com/levillejuifunderground/" target="_blank"><i class="fa fa-facebook-square"></i></a>
					</div> <!--social-links--> 
					
					<p class="copy">Copyright 2018 Tom Tual-Krebs et Christophe Martinelli</p>
				</div>
			</footer> <!--site-footer-->

		</div> <!--site-content--> 

		<script src="js/jquery-1.11.1.min.js"></script>	
		<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>	
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>
   <?php
unset($_SESSION['inputs']); // on nettoie les données précédentes
  unset($_SESSION['success']);
  unset($_SESSION['errors']);
  ?>

