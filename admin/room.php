 <?php

include_once 'head.php';
 ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="roomdetail">
<h3><span class="glyphicon glyphicon-briefcase"></span> Data Kamar</h3><a href="tambahkamar.php">
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Tambah</button></a>
  
          

          <h2 class="sub-header"></h2>         
          <h2 class="sub-header"></h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nama Kamar</th>
                  <th>Gambar</th>
                  <th>Jumlah Kamar</th>
				  <th>Ukuran</th>
                  
			      <th>Daya Tampung</th>
                  <th>Harga</th>
                </tr>
              </thead>
              <tbody id="roominfo"  >
					<?php 
						include 'system/config1.php';
						$result = mysql_query("select * from kamar");
						if(mysql_num_rows($result) > 0){
							while ($row = mysql_fetch_array($result) ){
								print "<tr style=\"\">		 <td>".$row['nama_kamar']."</td>\n";
								print "                  <td><img src=\"../".$row['imgpath']."\" style=\"height:50px;width:50px;\"\"></td>\n";
								print "                  <td>".$row['jumlah_kamar']."</td>\n";
								print "                  <td>".$row['size']." </td>\n";
								
								print "                  <td>".$row['occupancy']."</td>\n";
								print "                  <td>".$row['harga']."</td>\n";             
							print "	 <td><a href='editkamar.php?id=".$row['id_kamar']."'>Edit</a></td>
              <td><a href='hapuskamar.php?id=".$row['id_kamar']."'>Hapus</a></td>";
				
							}
						}			
					
					?>
				
               
              </tbody>
            </table>
          </div>
		 
		 
        </div>
        </html>
        