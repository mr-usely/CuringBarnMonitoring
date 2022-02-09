<?php
$menu = null;
if(isset($_GET['menu'])){
    $menu = $_GET['menu'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Curing Barn Monitoring</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">

     <!-- Include Choices CSS -->
     <link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div id="app">