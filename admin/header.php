<?php
if(!isset($_SESSION['superadmin']))
{
	header('location:auth-login.php');
}
?>
<head>
    <base href="">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Page Title  -->
    <title>Dashboard | Deevloopers Admin</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="assets/css/dashlite.css?ver=2.2.0">
    <link id="skin-default" rel="stylesheet" href="assets/css/theme.css?ver=2.2.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<style>
    .select2-container .select2-selection--single{
        height:calc(2.625rem + 2px) !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {

        top: 9px !important;
    }
</style>
</head>