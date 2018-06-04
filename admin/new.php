<?php  

require_once("system/config.php");

 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>laporan reservasi</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
      </head>  
      <body>  
                <h1 align="center" style="font-size: 40px;">Laporan Data Sewa Hotel</h1>  <br>
                <h3 align="center"></h3><br/>
                <div style="position: absolute; font-size: 20px; margin-top: -30px; margin-left: 15px;"> cari tanggal</div>

                <div class="col-md-3">  
                     <input  type="Date" name="from_date" id="from_date" class="form-control" placeholder="dari tanggal" />  
                </div>  
                <div class="col-md-3">  
                     <input type="Date" name="to_date" id="to_date" class="form-control" placeholder="hingga tanggal" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="fetch" id="fetch" value="Filter" class="btn btn-info" />  
                </div>  
                
                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                             
                               <th >tanggal awal</th>  
                               <th >tanggal akhir</th>   

                               <th >nama</th>   
                               <td colspan="2">Aksi</td>
                              
                          </tr>  
                     <?php 
                     $queri = "SELECT * FROM pesan";  
                      $hasil=mysqli_query ($konek,$queri);   
                        if ($hasil->num_rows > 0){
                      while ($row = $hasil->fetch_assoc()) { 
                    
                     {  echo"
                       
                          <tr> 
                              
                               <td>".$row['cekin']."</td>
                               <td>".$row['cekout']."</td>
                               <td>".$row['nama_awal']."</td>                          
                               <td><a href='#?id_sewa=".$row['id_pesan']."'>Edit</a></td>
                               <td><a href='delete_reservasi.php?id_sewavasi=".$row['id_pesan']."'>Hapus</a></td>
              </tr>";      
                          
                     }  }}
                     ?>  
                     </table>  
                </div>  
           
          
              
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
            fromat:"yyyy-mm-dd",
                     
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#fetch').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"fet.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>
