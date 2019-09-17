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
        $currentURL = current_url();    
        // $regex =     
    ?>

<header id="main_header">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-light">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item <?php echo preg_match_all('/(\/)?$/', $currentURL) > 0 ? "active" : "" ?>"><a class="nav-link" href="<?php echo site_url()?>" target="_self">Home</a></li>
                        <li class="nav-item <?php echo preg_match_all('/.\/contatos(\/)?/', $currentURL) > 0 ? "active" : "" ?>"><a class="nav-link" href="<?php echo site_url()?>contatos/" target="_self">Contatos</a></li>
                        <li class="nav-item <?php echo preg_match_all('/.\/usuarios(\/)?/', $currentURL) > 0 ? "active" : "" ?>"><a class="nav-link" href="<?php echo site_url()?>contatos/" target="_self">Usuários</a></li>
                        <li class="nav-item <?php echo preg_match_all('/.\/usuarios(\/)?/', $currentURL) > 0 ? "active" : "" ?>"><a class="nav-link" href="<?php echo site_url()?>contatos/" target="_self">Pedidos</a></li>
                        <li class="nav-item <?php echo preg_match_all('/.\/usuarios(\/)?/', $currentURL) > 0 ? "active" : "" ?>"><a class="nav-link" href="<?php echo site_url()?>contatos/" target="_self">Fornecedores</a></li>

                        <li class="nav-item <?php echo preg_match_all('/.\/usuarios(\/)?/', $currentURL) > 0 ? "active" : "" ?>"><a class="nav-link" href="<?php echo site_url()?>contatos/" target="_self">Produtos</a></li>

                        <li class="nav-item <?php echo preg_match_all('/.\/usuarios(\/)?/', $currentURL) > 0 ? "active" : "" ?>"><a class="nav-link" href="<?php echo site_url()?>contatos/" target="_self">Categorias</a></li>
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
