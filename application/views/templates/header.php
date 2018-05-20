<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="ECTM Jr">
        <link rel="icon" href="<?=base_url("assets/img/icon.ico");?>">
        
        <title>Thoth</title>


        <!-- <link rel="stylesheet" type="text/css" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>"> -->

        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')?>">

        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/animate/animate.css')?>">
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css-hamburgers/hamburgers.min.css')?>">
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/select2/select2.min.css')?>">
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/semantic/dist/semantic.min.css')?>">
        
        <!-- Bootstrap core CSS-->
        <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- Custom fonts for this template-->
        <!-- <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->

        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/util.css')?>">
	    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/general.css')?>">
        
    <!-- LOADING PAGE ASSETS -->
    <?php 
            // dentro de assets/css e assets/js podem ter arquivos especificos pra cada página. No controlador eu especifico que arquivos eu quero carregar dessas páginas
            // e nos loops abaixo eu pego esses arquivos especificados no controlador e puxo eles
            // pra ver um exemplo é só olhar em admin/login
            if(isset($assets)){
                foreach ($assets as $folder => $files){
                    if($folder == 'css'){
                        foreach($files as $file){
                            ?><link href="<?php echo base_url('assets/css/'.$file); ?>" rel="stylesheet" type="text/css" /><?php
                        }
                    }
                }
            }
        ?>
        
        <link href="<?=base_url('assets/datatables/dataTables.bootstrap4.css')?>" rel="stylesheet">

    </head>
    <body>