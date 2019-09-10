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

    <?php
        // $this->load->helper('url');
        $currentURL = current_url();
        $page = preg_match("/.\/contatos(\/)?$/", $currentURL);  
        print_r($page); 
    ?>

<header id="main_header">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-light">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="<?php echo site_url()?>" target="_self">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url()?>contatos/" target="_self">Contatos</a></li>
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
