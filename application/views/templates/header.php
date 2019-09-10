<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo base_url();?>_assets/libs/bootstrap-4.3.1/css/bootstrap.min.css">
</head>
<body>

<header id="main_header">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <nav id="main_nav">
                    <ul>
                        <li><a href="<?php echo site_url()?>" target="_self">Home</a></li>
                        <li><a href="<?php echo site_url()?>contatos/" target="_self">Contatos</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
    
<main id="main_content">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h2><?php echo $title; ?></h2>
            </div>
        </div>
