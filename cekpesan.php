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
			
			<center><p style="margin-bottom: -10%; margin-top: -4%; font-size: 20px;">Your Reservation</p></center>	
			<hr style="width: 5px">
			<form action="batal.php" method="post">
				
				
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
												<br><button name="submit" href="#" class="button small fontslabo" style="background-color:#2ecc71; width:100%; margin-bottom: -5%" >Edit Reservation</button>
											</div>
										</form>

									</div>

								</div>
							</div>





<div class="large-7 columns blackblur fontcolor" style="padding-top:10px; float: right; margin-top: 2%; margin-right: 4%; background-color: rgba(255,255,255,0.5)" >
		<p><h2 style='size:20px;'>Info Pemesan</h2><hr class="line"></p>
		<form action="savepesan.php" method="post"  onSubmit="return validateForm(this);">
		  <div class="row">

			<div class="large-6 columns">
			  <label class="fontcolor">First Name*
				<input name="nama_awal" type="text" value="<?php if(isset($_SESSION['nama_awal']) && !empty($_SESSION['nama_awal'])){echo  $_SESSION['nama_awal'];}?>" pattern="[a-zA-Z\s]+" Title="Only alphabet characters allowed" placeholder="" size="35" />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Last Name*
				<input name="nama_akhir" type="text" value="<?php if(isset($_SESSION['nama_akhir']) && !empty($_SESSION['nama_akhir'])){echo  $_SESSION['nama_akhir'];}?>" pattern="[a-zA-Z\s]+" Title="Only alphabet characters allowed" placeholder="" size="35"/>
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Email Address*
				<input name="email" type="email" value="<?php if(isset($_SESSION['email']) && !empty($_SESSION['email'])){echo  $_SESSION['email'];}?>" placeholder="" size="35" />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="" style="color:black !important;">Telephone Number*
				<input name="telepone" type="text" id="phone" value="<?php if(isset($_SESSION['telepone']) && !empty($_SESSION['telepone'])){echo  $_SESSION['telepone'];}?>" pattern= "[^a-zA-Z]+" Title="Only numbers are allowed"  placeholder="" size="35"/>
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Address Line 1*
				<input name="alamat" type="text" value="<?php if(isset($_SESSION['alamat']) && !empty($_SESSION['alamat'])){echo  $_SESSION['alamat'];}?>"   placeholder="" size="35"/>
			  </label>
			</div>
			
		  
		  <div class="row">
			<div class="large-12 columns">
			  <label class="fontcolor"  style="margin-left: 2%;" >Special Requirements
				<textarea name="lain_lain" placeholder=""><?php if(isset($_SESSION['lain_lain']) && !empty($_SESSION['lain_lain'])){echo  $_SESSION['lain_lain'];}?></textarea>
			  </label>
			</div>
		  </div><br><br>
		  <div class="row">
			<div class="large-7 columns" style="text-align:right;"><button type="submit" class="button small fontslabo" style="background-color:#2ecc71; width: 40% ;margin-bottom: 6%;" onclick="return confirm('Are you sure you want to continue?')" >Confirm</button>
		  </div>

		  </div>
		</form>

	</div>

</div>



<script>
	function validateForm(form) {
		var fname = form.nama_awal.value;
		var lname = form.nama_akhir.value;
		var email = form.email.value;
		var phone = form.telepone.value;
		var add1 = form.alamat.value;
			if(fname == null || lname == null || email == null || phone == null || add1 == null) 
			{
			 alert("Please fill in all the fields mark with *.");

			 return false;
			}
			
	}
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</div>
	<?php

include_once 'footer.php';
	?>