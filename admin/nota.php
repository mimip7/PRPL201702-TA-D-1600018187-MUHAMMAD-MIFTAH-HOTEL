<?php
include_once 'system/config.php';


?>
 <table class="table table-bordered">  
                          <tr>  <th>No. Pesanan</th>
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
                               <td>".$row['tanggal_pesan']."</td>  
                               <td>".$row['Nama']."</td>
                               <td>".$row['jumlah_bayar']."</td> 
                               <td>".$row['payment_status']."</td>
                            
                          </tr>";      
                          
                     }  }}
                     ?>  
                     </table>  