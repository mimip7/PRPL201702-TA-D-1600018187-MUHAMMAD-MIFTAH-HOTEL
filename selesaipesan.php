<?php
session_start();
include 'system/config1.php';
include_once 'header.php';
if(!isset($_SESSION['id_kamar'])){

	$_SESSION['id_kamar'] = array();
	$_SESSION['nama_kamar'] = array();						
	$_SESSION['roomqty'] = array();
	$_SESSION['ind_rate'] = array();
	$_SESSION['jumlah_bayar'] = 0;

}

$result = mysql_query("select * from kamar");
if(mysql_num_rows($result) > 0){
	

	$count = 0;

	while($row = mysql_fetch_array($result)){

		if (isset($_POST["qtyroom".$row['id_kamar'].""])   && !empty($_POST["qtyroom".$row['id_kamar'].""]) )
		{
			$_SESSION['id_kamar'][$count] = $_POST["selectedroom".$row['id_kamar'].""];
			$_SESSION['roomqty'][$count] = $_POST["qtyroom".$row['id_kamar'].""];
			$_SESSION['nama_kamar'][$count] = $_POST["nama_kamar".$row['id_kamar'].""];
			$_SESSION['ind_rate'][$count] = $row['harga']  * $_POST["qtyroom".$row['id_kamar'].""];
			$_SESSION['jumlah_bayar'] =  ( $row['harga']  * $_POST["qtyroom".$row['id_kamar'].""] * $_SESSION['durasi'] ) + $_SESSION['jumlah_bayar'] ;
				
								$count = $count + 1;

		}
	}


}
?>

<div class="banner">
	<div class="container" style="float: left; position: absolute;  margin-top: 2%; width: 75%;">

		<div class="banner-top">
			
			<center><p style="margin-bottom: -10%; margin-top: -4%; font-size: 20px;">Detail Reservasi</p></center>	
			<hr style="width: 5px">
			<form action="nota.php" method="post">
				
				
				<table style="margin-left: 5%; margin-top: -2%;">

					<tr >

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
									<div style="margin-left: 5%;">

										<div class="row" style="margin-top: -15%;"><hr>
											<div class="large-6 columns" style="max-width:100%;">
												<span class="fontgreysmall" ><b>Kamar terpilih</b></span></div>
												<div class="large-4 columns" style="max-width:100%;">
													<span class="fontgreysmall"><b>Jumlah</b></span>	</div>
												</div>


												<div class="row">
													<div class="large-6 columns" style="max-width:100%;">
														<span class="" ><?php 

														foreach ($_SESSION['nama_kamar'] as &$value0 ) {
															echo $value0;
															print "<br>";
														} ;

														?>

													</span>
												</div>

												<div class="large-4 columns" style="max-width:100%;">
													<span class="">
														<?php foreach ($_SESSION['roomqty'] as &$value1 ) {
															echo $value1;
															print "<br>";
														} ;

														?>
													</span>				

												</div>		
											</div>


											<div class="row">					
												<div class="large-12 columns" style="max-width:100%; margin-top: -2%">	
													<br><span class="fontgrey" style="text-align:center;">Total</span><br>
													<span class="fontslabo" style="font-size:32px; text-align:center;">Rp. <?php echo $_SESSION['jumlah_bayar'];?></span></p>	
												</div>
											</div>

											<div class="large-12 columns" style="margin-top: -4%;">
											<a href="nota.php">	<br><button name="submit" href="nota.php" class="button small fontslabo" style="background-color:#2ecc71; width:100%; margin-bottom: -5%" >Cetak Nota</button></a>
											</div>
										</form>

									</div>

								</div>
							</div>



		<div class="large-7 columns blackblur fontcolor" style="padding-top:10px; float: right; margin-top: 2%; margin-right: 4%; background-color: rgba(255,255,255,0.5)">
		<div class="large-12 columns" >
		<p><b>Reservation Complete</b></p><hr class="line">
		<p>Silahkan Melakukan Pembayaran dengan rekening bank dibawah ini. kami juga menerima pembayaran rekening via paypal. setelah melakukan pembayaran harap melakukan konvirmasi via SMS, Telepon dan Email sesuai yang tertera di bawah ini. enjoy your reservation :)</p><br><br>
		<p>
		<i class="icon-phone" style="font-size:24px"></i> <span class="i-name fontgrey">Phone</span><span class="i-code">&emsp; 08787876564</span><br>
        <i class="icon-fax" style="font-size:24px"></i> <span class="i-name fontgrey">Fax</span><span class="i-code"> &emsp;&emsp;08567676434</span><br>
        <i class="icon-mail-alt"style="font-size:24px"> </i> <span class="i-name fontgrey">Email</span><span class="i-code">&emsp; WAW1891@gmail.com</span>
		</p><hr>
		<div class="row">
			<div class="large-12 columns" >
					
					<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="3FWZ42DLC5BJ2">
					
					<img type="image" src="img/paypal.jpg" style="background-color:white; width:32%; height:14%; padding:2px; " ></img>
					<br><button class="button small " border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" style="width:32%;background-color:#2ecc71; ">Bayar Sekarang</button>
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>


			</div>
		</div>
		</div>
	


	</div>


</div>
