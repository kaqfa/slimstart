<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>
    <?php 
        if(isset($site_title)){
            echo $site_title;
        } else {
            echo "Judul Halaman [DEFAULT]";
        }
    ?>
    </title>
    <link href="<?=$baseUrl?>/../assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {padding-top: 80px;}
    </style>
</head>
<body>