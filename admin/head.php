<?php
session_start();

include 'system/config1.php';
$re = mysql_query("select * from user where username = '".$_SESSION['username']."'  AND password = '".$_SESSION['password']."' " );
echo mysql_error();
if(mysql_num_rows($re) > 0)
{

} 
else
{
session_destroy();
header("location: index.htm");
}
?>
<!DOCTYPE html>
<!-- saved from url=(0044)http://getbootstrap.com/examples/dashboard/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
    <meta name="description" content="">
    <meta name="author" content="">
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Booking System</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.js"></script>	
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--script src="js/ie-emulation-modes-warning.js"></script-->
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/animation.css">


 </head>
	<script>
	  $(document).ready(function() {
			$("#checkout").datepicker();
			$("#checkin").datepicker();
			
		
	  });

function fnSearch()
		{
			var checkin=document.getElementById('checkin').value;
			var checkout=document.getElementById('checkout').value;
			//var bookingid=document.getElementById('bookingid').value;
			//var firstname=document.getElementById('firstname').value;
			$.ajax({
				type: "POST",
				url: "search.php",
				data: "checkin=" + checkin + "&checkout=" + checkout,
				success: function(resPonsE) 
					{
						document.getElementById('bookindetails').style.display='block'
						document.getElementById('bookinginfo0').style.display='none'
						document.getElementById('bookinginfo1').style.display='none'
						document.getElementById('bookinginfo2').style.display='none'
						document.getElementById('statistics').style.display='none'
						document.getElementById('bookinginfo').innerHTML=resPonsE;
							$('.delete').click (function () {
							return confirm ("Are you sure you want to delete?") ;
							});
						return true;
					}
			});
		}
function more1()
		{
						document.getElementById('bookindetails').style.display='none'
						document.getElementById('bookinginfo0').style.display='block'
						document.getElementById('bookinginfo1').style.display='none'
						document.getElementById('bookinginfo2').style.display='none'
						document.getElementById('statistics').style.display='none'
						
		}
function more2()
		{
						document.getElementById('bookindetails').style.display='none'
						document.getElementById('bookinginfo1').style.display='block'
						document.getElementById('bookinginfo0').style.display='none'
						document.getElementById('bookinginfo2').style.display='none'
						document.getElementById('statistics').style.display='none'
						
		}
function more3()
		{
						document.getElementById('bookindetails').style.display='none'
						document.getElementById('bookinginfo2').style.display='block'
						document.getElementById('bookinginfo0').style.display='none'
						document.getElementById('bookinginfo1').style.display='none'
						document.getElementById('statistics').style.display='none'
						
		}		
	</script>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid" style="background-color: #4aa3df;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color: #ffffff;">Admin Booking Panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="././index.php" style="color: #ffffff;">Sign Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
	
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="dashboard.php"><i class="icon-gauge"></i> Dashboard <span class="sr-only">(current)</span></a></li>          
			<li><a href="room.php"><i class="glyphicon-home"></i>Data Kamar</a></li>
			<li><a href="datapesan.php"><i class="glyphicon-list-alt"></i> Data Pesan</a></li>
			<li><a href="datatransaksi.php"><i class="glyphicon-usd"></i>Data Transaksi</a></li>
			

          </ul>

        </div>