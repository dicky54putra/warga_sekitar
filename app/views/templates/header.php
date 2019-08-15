<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= $data['judul']?></title>
	<link rel="stylesheet" href="<?= base_url;?>/css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
		  <a class="navbar-brand" href="<?= base_url; ?>">WARGA SEKITAR</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		      <a class="nav-item nav-link" href="<?= base_url; ?>">Home</a>
		      <a class="nav-item nav-link" href="<?= base_url; ?>/wargaku">Wargaku</a>
		      <a class="nav-item nav-link" href="<?=base_url;?>/about">About</a>
		    </div>
		  </div>
	  	</div>
	</nav>
