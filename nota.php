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
<?php
include_once 'system/config.php';



?>

<center><h2>Nota Transaksi</h2>
  <br>
 <table class="table table-bordered" style="width: 50%;">  
                          <tr>  <td>No. Pesanan</td>
                               <th >Tanggal Pesan</th>  
                                <th >Nama</th>  
                               <th >Jumlah Bayar</th>  
                               <th >Status</th>  
                              
                          </tr>  
                     <?php 
                     $queri = "select * from pesan order by id_pesan desc limit 1";  
                      $hasil=mysqli_query ($konek,$queri);   
                        if ($hasil->num_rows > 0){
                      while ($row = $hasil->fetch_assoc()) { 
                    
                     {  echo"
                       
                          <tr> <td>".$row['id_pesan']."</td>
                           
                           <td>".$row['cekin']."</td>  
                               <td>".$row['nama_awal']."</td>
                               <td>".$row['jumlah_bayar']."</td> 
                               <td>".$row['payment_status']."</td>
                            
                          </tr>";      
                          
                     }  }}
                     ?>  
                     </table>  

</center>



                 