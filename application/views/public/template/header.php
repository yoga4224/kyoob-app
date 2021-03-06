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
    <link rel="stylesheet" href="<?=base_url()?>assets/css/kyoobmain.css?ver=1">


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
                    if (($this->uri->segment(1)) == 'workspace'){
                        echo '<li class="active">';
                    }else{
                        echo '<li>';
                    }
                 ?>
                <a href="<?=base_url('workspace')?>">My Workspace</a>
                </li>
                <?php 
                    if (($this->uri->segment(1)) == 'create'){
                        echo '<li class="active">';
                    }else{
                        echo '<li>';
                    }
                 ?>
                <a href="<?=base_url('create');?>">Template Ads</a>
                </li>
                <li>
                    <a href="https://kyoob-ads.com/" target="_blank">Showcase</a>
                </li>

                <?php 
                    if (($this->uri->segment(1)) == 'campaign'){
                        echo '<li class="active">';
                    }else{
                        echo '<li>';
                    }
                 ?>
                <a href="<?=base_url('campaign');?>">Campaign</a>
                </li>

                <?php 
                    if (($this->uri->segment(1)) == 'account'){
                        echo '<li class="active">';
                    }else{
                        echo '<li>';
                    }
                 ?>
                <a href="<?=base_url('account');?>">Advertiser</a>
                </li>
                <?php 
                    if (($this->uri->segment(1)) == 'user'){
                        echo '<li class="active">';
                    }else{
                        echo '<li>';
                    }
                 ?>
                <a href="<?=base_url('user');?>">User Profile</a>
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

                <form action='<?= base_url().$this->uri->segment(1) ?>' method='GET'>
                    <div class="row">
                        <div class="col-7">
                            <ul class="nav" style="list-style:none;">
                                <li class='li-pdr-20'>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Advertiser</label>
                                        <select <?= ($_SESSION['accountId'] != 0 ? 'disabled': '') ?> name="advertiser" class="form-control" id="exampleFormControlSelect1">
                                            <?php 
                                                foreach($account as $row){
                                                    echo "<option ".($_SESSION['accountId'] != 0 ? 'selected': ($_GET['advertiser']==$row->id?'selected':''))." value='".$row->id."' >".$row->account_name."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </li>
                                <li class='li-pdr-20'>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Campaign</label>
                                        <select name="campaign" class="form-control" id="exampleFormControlSelect1">
                                            <option value="ALL">All Campaign</option>
                                            <?php 
                                                foreach($campaign as $row){
                                                    echo "<option ".($_GET['campaign']==$row->id?'selected':'')." value='".$row->id."' >".$row->campaign_name."</option>";
                                                }
                                            ?>
                                        </select>

                                    </div>
                                </li>
                                <li class='li-pdr-20'>

                                    <button type="submit" class="btn btn-kyoob text-center my-4 btn-kyoob-purple filter-btn">Filter</button>

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

                </form>

                </div>
            </nav>
