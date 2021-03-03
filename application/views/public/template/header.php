<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Welcome to Kyoob Studio | The easiest way to create interactive ads</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/kyoobmain.css">


    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;700&display=swap" rel="stylesheet">


</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="<?=base_url()?>assets/images/logo_home.png">
            </div>

            <ul class="list-unstyled components">

                <?php 
                    if (($this->uri->segment(1)) == 'studio'){
                        echo '<li class="active">';
                    }else{
                        echo '<li>';
                    }
                 ?>
                    <a href="<?=base_url();?>">Overview</a>
                </li>
                <?php 
                    if (($this->uri->segment(1)) == 'Workspace'){
                        echo '<li class="active">';
                    }else{
                        echo '<li>';
                    }
                 ?>
                    <a href="<?=base_url('Workspace')?>">My Workspace</a>
                </li>
                <?php 
                    if (($this->uri->segment(1)) == 'Create'){
                        echo '<li class="active">';
                    }else{
                        echo '<li>';
                    }
                 ?>
                    <a href="<?=base_url('Create');?>">Template Ads</a>
                </li>
                <li>
                    <a href="https://kyoob-ads.com/" target="_blank">Showcase</a>
                </li>
                <?php 
                    if (($this->uri->segment(1)) == 'user'){
                        echo '<li class="active">';
                    }else{
                        echo '<li>';
                    }
                 ?>
                    <a href="<?=base_url('User');?>">User Profile</a>
                </li>
                <li>
                    <a href="<?=base_url('Login/logout');?>">Log Out</a>
                </li>

            </ul>


        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="filter-bar shadow-pink">
                <div class="container-fluid">
                    
                        <div class="row">
                        <div class="col-7">
                            <ul class="nav" style="list-style:none;">
                            <li class='li-pdr-20'>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Advertiser</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Dentsu Aegis</option>
                                        <option>Dentsu Aegis</option>
                                        <option>Dentsu Aegis</option>
                                    </select>
                                </div>
                            </li>
                            <li class='li-pdr-20'>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Campaign</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>All Campaign</option>
                                        <option>Disney Frozen</option>
                                        <option>Disney Toy's Story</option>
                                        <option>Disney Terminator 6</option>
                                    </select>
                                </div>
                            </li>

                        </ul>
                            </div>
                        <div class="col-5 float-right ">
                            <div class="row">
                            <div class="col-lg-10 text-right">
                                    
                                <div class="text-right fs-18">Welcome <?= $_SESSION['fullName'] ?>,</div>
                                </div>
                                <div class="col-2"><img class="img-fluid float-right" src="<?=base_url()?>assets/images/avatar.png"></div>
                            </div>
                            </div>
                        </div>
                        
                        
                    
                </div>
            </nav>
