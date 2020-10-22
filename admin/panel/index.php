<?php

include "../config/config.php";

session_start();

// For logout

if(isset($_GET["sign"]))
{
  $sign=$_GET["sign"];
  if($sign=="out")
  {
        unset($_SESSION["username"]);
    
    header("location:../index.php");}
    }
    

// For checking if the user logged in

if(isset($_SESSION['username']) == false){
    header("Location:../index.php");
}else{
    ?>

<!doctype html>

<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Car Transported - Dar</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../asset/images/log.png">
    <link rel="shortcut icon" href="../asset/images/log.png"> 

    <link rel="stylesheet" href="../asset/css/normalize.css">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/css/themify-icons.css">
    <link rel="stylesheet" href="../asset/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="../asset/css/flag-icon.min.css">
    <link rel="stylesheet" href="../asset/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="../asset/css/bootstrap-select.less"> --> 
    <link rel="stylesheet" href="../asset/css/style.css"> 
 
</head>


<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    <?php

                        $sql5=" SELECT * from tbl_users_login where username='$_SESSION[username]' ";
                        $result5=$conn->query($sql5);
                        while ($row5 = $result5->fetch()) {
                            $login_id=$row5['login_id'];
                            $names=$row5['f_name'];
                            $phone=$row5['telephone'];
                            $prof_id=$row5['profile_id'];
                        }

                    ?>


                    <li>
                       <a href="index.php?home"><i class="menu-icon active fa fa-laptop"></i><strong><?php echo $names; ?></strong> Dashboard </a>
                    </li>
                    <li class="menu-title">Admin Elements</li><!-- /.menu-title -->

                    <li>
                       <a href="index.php?home"><i class="menu-icon active fa fa-laptop"></i> Dashboard </a>
                    </li>

                    <li>
                       <a href="index.php?site_details"><i class="menu-icon active fa fa-tasks"></i> Site Details </a>
                    </li>

                    <li>
                       <a href="index.php?service"><i class="menu-icon active fa fa-tasks"></i> Service </a>
                    </li>

                    <li>
                       <a href="index.php?faq"><i class="menu-icon active fa fa-th-large"></i> FAQ's </a>
                    </li>

                    <li>
                       <a href="index.php?partner"><i class="menu-icon active fa fa-tasks"></i> Partner </a>
                    </li>

                    <li>
                       <a href="index.php?quote"><i class="menu-icon active fa fa-tasks"></i> Quotes </a>
                    </li>

                    <li>
                       <a href="index.php?feedback"><i class="menu-icon active fa fa-tasks"></i> Feedback </a>
                    </li> 

                    <li>
                       <a href="index.php?tax"><i class="menu-icon active fa fa-tasks"></i> Tax Calculations </a>
                    </li>     
                    
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->


    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">  
            <div class="top-left">
                <div class="navbar-header"> 
                    <a class="navbar-brand" href="index.php"><img src="../asset/images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="../asset/images/logo.png" alt="Logo"></a> 
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a> 
                </div> 
            </div>
            <div class="top-right"> 
                <div class="header-menu"> 

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../img/avatar.png"  >
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="?sign=out" id="logout"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>
 
                </div>  
            </div>
        </header><!-- /header -->
        <!-- Header-->

    <?php
        if(isset($_GET['home']))
        {
            include("home.php");
        }

        elseif(isset($_GET['site_details']))
        {           
            include("site_details.php");
        }

        elseif(isset($_GET['faq']))
        {           
            include("faq.php");
        }

        elseif(isset($_GET['service']))
        {           
            include("service.php");
        }

        elseif(isset($_GET['partner']))
        {           
            include("partner.php");
        }

        elseif(isset($_GET['member']))
        {           
            include("member.php");
        }

        elseif(isset($_GET['edit_service']))
        {           
            include("service_edit.php");
        }

        elseif(isset($_GET['edit_faq']))
        {           
            include("faq_edit.php");
        }

        elseif(isset($_GET['tax']))
        {           
            include("tax.php");
        }

        elseif(isset($_GET['edit_partner']))
        {           
            include("partner_edit.php");
        }

        elseif(isset($_GET['quote']))
        {           
            include("quote.php");
        }

        elseif(isset($_GET['feedback']))
        {           
            include("feedback.php");
        }

        else
        {
            include("home.php");
        }

    ?>


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; <?php echo  date("Y"); ?> Car Transporter Dar
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="#" target="_blank">Intare Security Lab</a>
                    </div>
                </div>
            </div>
        </footer>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="../asset/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../asset/js/popper.min.js"></script>
    <script src="../asset/js/plugins.js"></script>
    <script src="../asset/js/main.js"></script>



    <!--Flot Chart-->

    <script src="../asset/js/lib/flot-chart/jquery.flot.js"></script>
    <script src="../asset/js/lib/flot-chart/jquery.flot.spline.js"></script>

    <script src="../asset/js/widgets.js"></script>


    <script src="../asset/js/lib/data-table/datatables.min.js"></script>
    <script src="../asset/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../asset/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../asset/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <!-- <script src="../asset/js/lib/data-table/jszip.min.js"></script>
    <script src="../asset/js/lib/data-table/pdfmake.min.js"></script> -->
    <script src="../asset/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../asset/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../asset/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../asset/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../asset/js/lib/data-table/datatables-init.js"></script>

        <!--  Chart js -->
    <script src="../js/princeop.js"></script>
    <script src="../js/check.js"></script>
    <script src='../js/jspdf.min.js'></script>

            <!--  Rich Text area -->
    <script type="text/javascript" src="../asset/src/jquery.min.js"></script>
    <script type="text/javascript" src="../asset/src/jquery.richtext.js"></script>
    <link rel="stylesheet" href="../asset/src/richtext.min.css">



</body>
</html>
<?php
}
?>
