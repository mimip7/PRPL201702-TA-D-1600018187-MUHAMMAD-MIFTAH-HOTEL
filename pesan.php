<?php
include_once 'header.php';
include_once 'system/config1.php';
?>
<?php
session_start();
if(isset($_POST["cekin"]) && !empty($_POST["cekin"]) && isset($_POST["cekout"]) && !empty($_POST["cekout"])){
	$_SESSION['checkin_date'] = date('d-m-y', strtotime($_POST['cekin'])); 
	$_SESSION['checkout_date'] = date('d-m-y', strtotime($_POST['cekout']));
	$_SESSION['checkin_db'] = date('y-m-d', strtotime($_POST['cekin'])); 
	$_SESSION['checkout_db'] = date('y-m-d', strtotime($_POST['cekout']));
	$_SESSION['datetime1'] = new DateTime($_SESSION['checkin_db']);
	$_SESSION['datetime2'] = new DateTime($_SESSION['checkout_db']);
	$_SESSION['checkin_unformat'] = $_POST["cekin"]; 
	$_SESSION['checkout_unformat'] = $_POST["cekout"];
	$_SESSION['interval'] = $_SESSION['datetime1']->diff($_SESSION['datetime2']);

	$_SESSION['durasi'] = $_SESSION['interval']->format('%d');

}
if(isset( $_POST["tamudewasa"] ) ){
$_SESSION['dewasa'] = $_POST["tamudewasa"];
}

if(isset( $_POST["tamuanak"] ) ){
$_SESSION['anak'] = $_POST["tamuanak"];
}


?>
	<div class="banner">
	<div class="container" style="float: left; position: absolute;  margin-top: 3%; width: 75%;">
	
		<div class="banner-top">
			
		<center><h3 style="margin-bottom: -7%;">Your Reservation</h3></center>	
			<hr style="width: 5px">
				<form action="batal.php" method="post">
				
				
			<table style="margin-left: 5%; margin-top: -2%;">

				<tr>
				
					<div style="width: 100%;">
					<td ><p >Check In</p></td>
					<td><p> :</p></td>
					<td ><p> <?php echo $_SESSION['checkin_date'];?></p><td>				
					</div>	
				</tr>

				<hr>
				<tr>
					<div style="width: 100%;">
					<td ><p >Check Out</p></td>
					<td><p> :</p></td>
					<td><p> <?php echo $_SESSION['checkout_date'];?></p><td>				
					</div>	
				</tr>


				<tr>
					<div style="width: 100%;">
					<td ><p >Jumlah Dewasa</p></td>
					<td><p> :</p></td>
					<td ><p> <?php echo $_SESSION['dewasa'];?></p><td>				
					</div>	
				</tr>

				<tr>
					<div style="width: 100%;">
					<td><p >Jumlah Anak</p></td>
					<td><p> :</p></td>
					<td><p> <?php echo $_SESSION['anak'];?></p><td>				
					</div>	
				</tr>
				
									
				
				<tr>
					<div style="width: 100%;">
					<td style="padding-right:20px;"><p >Jumlah Hari</p></td>
					<td><p> :</p></td>
					<td style="padding-left:  10px;"><p> <?php echo $_SESSION['durasi'];?></p><td>				
					</div>	
				</tr>							
			</table>	

			<div class="large-12 columns" style="margin-top: -4%;">
						<br><button name="submit" href="#" class="button small fontslabo" style="background-color:#2ecc71; width:100%; margin-bottom: -5%" >Edit Reservation</button>
			</div>
				
			</form>
			<div class="large-12 columns" id="roomselected" style="display:none;" >
				<hr>
							<br><label for="submit-form" class="book button small fontslabo" style="background-color:#2ecc71; margin-top:-7% ; margin-bottom: -5% ; width:100%; height:45px; !important;">Proceed To Book</label><!--button name="submit" href="#" class="button small fontslabo" style="background-color:#2ecc71; width:100%;" >Proceed Booking</button-->

		</div>
			

	</div>
</div>

<div class="container">

<div class="large-8 columns blackblur fontcolor" style="padding:10px; float: right; position: relative; margin-top: 3%;">
	
		<div class="large-12 columns" style="background-color: rgba(255,255,255,0.5)" >
			<?php
				include 'system/config.php';
				// check available room
				$datestart =  date('y-m-d', strtotime($_SESSION['checkin_unformat']) );
				$dateend =  date('y-m-d', strtotime($_SESSION['checkout_unformat']));
				
				$result = mysql_query("SELECT r.id_kamar, (r.jumlah_kamar-br.total) as availableroom from kamar as r LEFT JOIN ( 
				
										SELECT pesankamar.id_kamar, sum(pesankamar.jumlah_pesan) as total from pesankamar where pesankamar.id_pesan IN 
											(
												SELECT b.id_pesan as bookingID from pesan as b 
												where 
												(b.cekin between '".$datestart."' AND '".$dateend."') 
												OR 
												(b.cekout between '".$dateend."' AND '".$datestart."')
												
												
											)
										
										group by pesankamar.id_kamar
										)
										as br
					 
					 ON r.id_kamar = br.id_kamar");
				echo mysql_error();
				if(mysql_num_rows($result) > 0){
					echo "<p><h3 style='size:20px;'>Kamar Yang Tersedia</h3></p><hr class=\"line\">";
					echo "				<form action=\"cekpesan.php\" method=\"post\">\n";
					
							
					while ($row = mysql_fetch_array($result)) {
				
								
						if($row['availableroom'] != null && $row['availableroom'] > 0  )
						{
							
							$sub_result = mysql_query("select kamar.* from kamar where kamar.id_kamar = ".$row['id_kamar']." ");
							
							if(mysql_num_rows($sub_result) > 0)
							{
								
								while($sub_row = mysql_fetch_array($sub_result)){
								
								
								print "					<p><h4>".$sub_row['nama_kamar']."</h4></p>\n";
								print "					<div class=\"row\">\n";
								print "					\n";
								print "						<div class=\"large-4 columns\">\n";
								print "							<img src=\"".$sub_row['imgpath']."\"></img>\n";
								print "						</div>\n";
								print "						<div class=\"large-4 columns\">\n";
								print "						<p><span class=\"fontgrey\">Daya Tampung : </span> ".$sub_row['occupancy']."<br>\n";
								print "						<span class=\"fontgrey\">Luas Kamar : </span> ".$sub_row['size']."\n";
								
								print "						</div>\n";
								print "						<div class=\"large-4 columns\">\n";
								print "						<p ><span class=\"fontgrey\">Harga : Rp. </span><span style=\"font-size:24px;\"							>".$sub_row['harga']."</span><span class=\"fontgrey\">/ night</span><br>\n";
								print "						<span style=\"text-align:right;\">".$row['availableroom']." room available</span>\n";
								print "						</p>\n";
								print "							<div class=\"row\">\n";
								print "								<div class=\"large-11 columns\">\n";
								print "									<label class=\"fontcolor\">\n";
								print "									<span>Jumlah Kamar </span>	<select style='width:100px' class=\"no_of_room\" name=\"qtyroom".$sub_row['id_kamar']."\" id=\"room".$sub_row['id_kamar']."\" onChange=\"selection(".$sub_row['id_kamar'].")\"  style=\"width:100%; color:black; height:45px;\" ;\">\n";
								print "											<option  value=\"0\">0</option>\n";
																				$i = 1;
																				while($i <= $row['availableroom'])
																				{
								print "											<option value=\"".$i."\">".$i."</option>\n";	
																				$i = $i+1;
																				}
								print "										</select>\n";
								print "									</label>\n";
								print "								</div>\n";
								print "								<div class=\"large-1 columns\">\n";
							    print "<input type=hidden name=\"selectedroom".$sub_row['id_kamar']."\"  id=\"selectedroom".$sub_row['id_kamar']."\" value=\"".$sub_row['id_kamar']."\">";
								print "<input type=hidden name=\"nama_kamar".$sub_row['id_kamar']."\" id=\"nama_kamar".$sub_row['id_kamar']."\" value=\"".$sub_row['nama_kamar']."\">";
								print "								</div>\n";
								print "							</div>\n";
								print "						</div>\n";
								print "						\n";
								print "					</div>\n";
								print "					\n";
								print "				<hr>";
								}
								
							}
						}
						else if($row['availableroom'] == null ){
							$sub_result2 = mysql_query("select kamar.* from kamar where kamar.id_kamar = ".$row['id_kamar']." ");
							if(mysql_num_rows($sub_result2) > 0)
							{
								while($sub_row2 = mysql_fetch_array($sub_result2)){
								
								print "					<p><h4>".$sub_row2['nama_kamar']."</h4></p>\n";
								print "					<div class=\"row\">\n";
								print "					\n";
								print "						<div class=\"large-4 columns\">\n";
								print "							<img src=\"".$sub_row2['imgpath']."\"></img>\n";
								print "						</div>\n";
								print "						<div class=\"large-4 columns\">\n";
								print "						<p><span class=\"fontgrey\">Daya Tampung : </span> ".$sub_row2['occupancy']."<br>\n";
								print "						<span class=\"fontgrey\">Luas Kamar : </span> ".$sub_row2['size']."\n";
								
								print "						</div>\n";
								print "						<div class=\"large-4 columns\">\n";
								print "						<p ><span class=\"fontgrey\">Harga : Rp. </span><span style=\"font-size:24px;\">".$sub_row2['harga']."</span><span class=\"fontgrey\">/ night</span><br>\n";
								print "						<span style=\"text-align:right;\">".$sub_row2['jumlah_kamar']." Kamar Tersedia</span>\n";
								print "						</p>\n";
								print "							<div class=\"row\">\n";
								print "								<div class=\"large-11 columns\">\n";
								print "									<label class=\"fontcolor\">\n";
								print "									<span>Jumlah Kamar </span>	<select style='width:100px;' class=\"no_of_room\" name=\"qtyroom".$sub_row2['id_kamar']."\"  id=\"room".$sub_row2['id_kamar']."\" onChange=\"selection(".$sub_row2['id_kamar'].")\" style=\"width:100%; color:black; height:45px;\" >\n";

								print "											<option  value=\"0\">0</option>\n";
																				$i = 1;
																				while($i <= $sub_row2['jumlah_kamar'])
																				{
								print "											<option value=\"".$i."\">".$i."</option>\n";	
																				$i = $i+1;
																				}
								print "										</select>\n";
								print "									</label>\n";
								print "								</div>\n";
								print "								<div class=\"large-1 columns\">\n";
							    print "<input type=hidden name=\"selectedroom".$sub_row2['id_kamar']."\" value=\"".$sub_row2['id_kamar']."\">";
								print "<input type=hidden name=\"nama_kamar".$sub_row2['id_kamar']."\" value=\"".$sub_row2['nama_kamar']."\">";
								//print "				<button type=\"submit\"  class=\"book button small\" style=\"background-color:#2ecc71; width:100%; height:45px; !important;\" >Book</button>\n";	
								print "								</div>\n";
								print "							</div>\n";
								print "						</div>\n";
								print "						\n";
								print "					</div>\n";
								print "					\n";
								print "				<hr>";
								}
								
							}		
						}
					}
				}		
				else{
				echo "<p><b>No room available</b></p><hr>";
				}
					print "<button type=\"submit\" id=\"submit-form\" class=\"hidden\" style=\"display:none\">Book</button>\n";
							print "	</form>";	

			?>
		</div>
	


	</div>

</div>
<script>
function selection(id) {
	var e = document.getElementById('roomselected').style.display='block';

}
</script>
<div >


</div>
	<?php

include_once 'footer.php';
	?>