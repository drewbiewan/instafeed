<?php include('instafeed.php'); ?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>InstaFeed PHP</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <style>
    	div a img {
	    	max-width: 100px;
    	}
    </style>
  </head>
  <body>
    
    <div class="row">
    	<div class="large-12 medium-12 columns">
    		<div><?php echo instaFeed(); ?></div>
    	</div>
    </div>
	  
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
