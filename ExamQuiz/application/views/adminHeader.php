<!doctype html>
<html>
<head>
<title><?php if(isset($title)) echo $title; else echo "Exam quiz"; ?></title>
<meta charset="utf-8" />
<script src="bootstrap/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styleAdd.css">
</head>
<body>

<div class="container">

<nav><a href="<?= base_url();?>index.php/Login/logout" style="float: right;">Logout</a></nav>
