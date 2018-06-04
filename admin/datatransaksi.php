<?php include 'head.php'; ?>
<?php require_once("system/config.php");?>  
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="roomdetail">
<h3><span class="glyphicon glyphicon-briefcase"></span> Data Transaksi</h3>

<form action="" method="get">
  <div class="input-group col-md-5 col-md-offset-7" style="margin-top: -3%">
    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
    <select type="submit" name="cekin" class="form-control" onchange="this.form.submit()">
      <option>Pilih tanggal ..</option>
      <?php 
      $pil="select distinct cekin from pesan order by cekin desc";
      $hasil=mysqli_query ($konek,$pil);  
      while($p=mysqli_fetch_array($hasil)){
        ?>
        <option><?php echo $p['cekin'] ?></option>
        <?php
      }
      ?>      
    </select>
  </div>

</form>
<br/>
<?php 
if(isset($_GET['cekin'])){
  $cekin=$_GET['cekin'];
  $tg="datajualact.php?cekin='$cekin'";  
}
  ?>


<table class="table table-striped">
  <tr>

    <th>ID. pesan</th>
    <th>Nama Pemesan</th>
    <th>Tanggal Masuk</th>
    <th>Jumlah Bayar</th>  
    <th>Opsi</th>
  </tr>
  <?php 
  if(isset($_GET['cekin'])){
    $cekin=$_GET['cekin'];
    $brg="select * from pesan where cekin like '$cekin' order by cekin desc";
  }else{
    $brg="select * from pesan order by cekin desc";
  }
  $hasil=mysqli_query ($konek,$brg);  
  while($b=mysqli_fetch_array($hasil)){

    ?>
    <tr>
      
      <td><?php echo $b['id_pesan'] ?></td>
      <td><?php echo $b['nama_awal'] ?></td>
      <td><?php echo $b['cekin'] ?></td>
      <td><?php echo $b['jumlah_bayar'] ?></td>
       <td><a href='hapustransaksi.php?id=".$b['id_pesan']."'>Hapus</a></td>
            
    </tr>

    <?php 
  }
  ?>
  
  
</table>
</div>

<!-- modal input -->

  <script type="text/javascript">
    $(document).ready(function(){
      $("#tgl").datepicker({dateFormat : 'yy/mm/dd'});              
    });
  </script>
  