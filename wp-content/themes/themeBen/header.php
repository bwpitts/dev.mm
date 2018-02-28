<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php bloginfo('title')?></title>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<?php wp_head()?>
</head>
	
<div class="top-nav">
  	<a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
    <a href="#">Link 4</a>
    <a href="#">Link 5</a>
	<a href="#">Link 6</a>
    <a href="#">Link 7</a>
    <a href="#">Link 8</a>
    <a href="#">Link 9</a>
    <a href="#">Link 10</a>
	<a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
    <a href="#">Link 4</a>
    <a href="#">Link 5</a>
	<a href="#">Link 6</a>
    <a href="#">Link 7</a>
    <a href="#">Link 8</a>
    <a href="#">Link 9</a>
    <a href="#">Link 10</a>
</div><br>
	

<header>
	<h1><a href="<?php echo home_url('/')?>"><?php bloginfo('name')?></a></h1>
</header>

<nav>
	<?php wp_nav_menu();?>
</nav>
<div id="container">