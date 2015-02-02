<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8" />
    <meta name="metaport" content="width=initial-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php echo $meta;?>
	<?php echo $f_meta;?>

    <title><?php echo $title;?></title>
    <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/css/bootstrap.css">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.js"></script>
	<link rel="stylesheet" href="application/assets/css/styles.css" />
</head>
<body>
	<!-- Navbar Starts Here -->
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="row-fluid">
				<!-- Options for the Navbar Starts Here -->
				<ul class="nav navbar-nav home-list-nav">
					<li class="col-xs-3"><a href="<?php echo base_url();?>test_1">Test 1</a></li>
					<li class="col-xs-3"><a href="<?php echo base_url();?>test_2">Test 2</a></li>
					<li class="col-xs-3"><a href="<?php echo base_url();?>test_3">Test 3</a></li>
					<li class="col-xs-3 dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
				          <ul class="dropdown-menu" role="menu">
				            <li><a href="#">Action</a></li>
				            <li><a href="#">Another action</a></li>
				            <li><a href="#">Something else here</a></li>
				            <li class="divider"></li>
				            <li><a href="#">Separated link</a></li>
				          </ul>
			        </li>
				</ul>
			</div>
		</div>
	</nav>