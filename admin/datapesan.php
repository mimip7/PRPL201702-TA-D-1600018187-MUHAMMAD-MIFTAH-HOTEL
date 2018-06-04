<?php include 'head.php'; ?>
<?php require_once("system/config.php");?>  
<!DOCTYPE html>  
<html>  
<head>  
 <title>laporan reservasi</title>  

</head>  

<body>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="roomdetail">




   <h3><span class="glyphicon glyphicon-briefcase"></span>  Data Reservasi</h3>

   <form action="datapesan.php" method="post" name="postform">

    
     <div class="col-md-3" style="float: right; margin-right:-13%; margin-top: -3%">  
      <input type="submit"  class="btn btn-info" name="pencarian"/> </div> 

      <div class="col-md-3" style="float: right; margin-top: -3%">  
        <input type="Date"   class="form-control" name="cekout"  placeholder="hingga tanggal" /></div>  
        <div class="col-md-3" style="float: right; margin-left:8%;  margin-top: -3%">  
          <input  type="Date" class="form-control"  name="cekin" placeholder="dari tanggal" /></div>  
          <div style="clear:both"></div>        

          <?php
          if(isset($_POST['pencarian'])){
            $cekin=$_POST['cekin'];
            $cekout=$_POST['cekout'];
            if(empty($cekin) || empty($cekout)){
              ?>
              <script language="JavaScript">
                alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
                document.location='datapesan.php';
              </script>
              <?php
            }else{
              ?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['cekin']?></b> s/d <b><?php echo $_POST['cekout']?></b></i>
              <?php
              $query=mysql_query("select * from pesan where cekin between '$cekin' and '$cekout'");
            }
            ?>
          </p>
          <table class="table table-striped">
            <tr>
             <th >ID</th>  
             <th >Nama Customer</th>
             <th >tanggal awal</th>  
             <th >tanggal akhir</th>   
             <th >status</th>   
             <td colspan="2"></td>
           </tr>
           <?php
            //menampilkan pencarian data
           while($row=mysql_fetch_array($query)){
            ?>
            <tr>
              <td><?php echo $row['id_pesan']; ?></td>
              <td><?php echo $row['nama_awal']; ?></td>  
              <td><?php echo $row['cekin']; ?></td>
              <td><?php echo $row['cekout']; ?></td>
              <td><?php echo $row['payment_status']; ?></td>                          
           
              <td><a href='hapuspesan.php?id=".$row['id_pesan']."'>Hapus</a></td>
            </tr>
            <?php
          }
          ?>    
          <tr>
            <td colspan="4" align="center"> 
              <?php
                //jika pencarian data tidak ditemukan
              if(mysql_num_rows($query)==0){
                echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
              }
              ?>
            </td>
          </tr> 
        </table>
        <?php
      }
      else{
        unset($_POST['pencarian']);
      }
      ?>
    </body>
    </html>