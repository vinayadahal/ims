<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?> - Inventory Management</title>
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(); ?>css/font-awesome.min.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet"/>
        <script src="<?php echo base_url(); ?>js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/script.js" type="text/javascript"></script>
    </head>
    <body>
        <?php if ($title != 'Login') { ?>
            <nav class="navbar navbar-default navbar-override">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="<?php echo base_url() . 'dashboard/index' ?>" class="navbar-brand">
                            <i class="fa fa-cubes"
                               style="font-size: 23px; float: left; margin-right: 10px;"></i>Inventory Management
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" id="menu_item">
                            <li><a href="<?php echo base_url() . 'dashboard/index' ?>"><i class="fa fa-tachometer" style="font-size: 16px;"></i> Dashboard</a></li>
                            <li><a href="#"><i class="fa fa-users" style="font-size: 16px;"></i> Users</a></li>
                            <li><a href="#"><i class="fa fa-universal-access" style="font-size: 16px;"></i> Role</a></li>
                            <li><a href="#"><i class="fa fa-newspaper-o" style="font-size: 16px;"></i> UserRole</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right" id="dropdown_menu">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user" style="font-size: 16px;"></i>
                                    <?php echo ucfirst($_SESSION['username']); ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" id="dropdown_menu_item">
                                    <li><a href="<?php echo base_url() . 'logout' ?>"><i class="fa fa-sign-out" style="font-size: 16px;"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        <?php } ?>
        <div class="popupBack" id="popupBack">
            <div class="popupConfirmBox" id="popupConfirmBox">
                <div class="popupCofirmBoxHeader">
                    Confirm Action
                    <a href="javascript:void(0);"  onclick="closeConfirmBox();" style="float:right;color: #222"><i class="fa fa-times popupCloseBtn"></i></a>
                </div>
                <div id="messageArea" class="confirmMsg">
                    Are you sure you want to do this?
                </div>
                <div class="confirmBtnArea">
                    <a href="bla" id="url">
                        <button type="button" class="btn btn-default btn-back">Yes</button>
                    </a>
                    <a href="javascript:void(0);" onclick="closeConfirmBox();">
                        <button type="button" class="btn btn-default btn-back" style="margin-left: 10px;">No</button>
                    </a>
                </div>
            </div>
        </div>