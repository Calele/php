<!DOCTYPE html>
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
        <link href="<?php echo $base_url; ?>/public/css/style.css" rel="stylesheet">
    </head>
    <body>
    	<div class="container">
		    <div class="row">
		        <div class="span6 offset3">
		            <form class="form-horizontal" method="POST" id="comment-form">
		                <fieldset>
		                	<header class="navbar border">
			                    <div id="legend">
			                        <legend>
			                            <span class="text"><?php echo $title ?></span>
			                            <div class="btn-group pull-right">
			                                <a href="<?php echo $base_url; ?>users/autorisation" class="btn"><?php echo $autorisation_title; ?></a>
			                                <a href="<?php echo $base_url; ?>users/registration" class="btn">Registration</a>
			                                <a href="<?php echo $base_url; ?>" class="btn">Info</a>
			                            </div>
			                        </legend>
			                    </div>
		                    </header>