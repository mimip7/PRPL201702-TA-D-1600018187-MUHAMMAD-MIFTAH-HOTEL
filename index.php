<?php

include_once 'header.php';
?>
<!DOCTYPE html>
<html>
	<head>
		
	</head>

<body>
	<div class="banner">
		<div class="container">
			<div class="banner-top" style="margin-top: -4%;">
				<h1>Pesan Hotel</h1>
				<form action="pesan.php" method="post" onSubmit="return validateForm(this);">
				<div class="banner-bottom">
					<div class="bnr-one">
						<div class="bnr-left">
							<p>Ckeck In</p>
						</div>
						<div class="bnr-right">
							<input type="date" name="cekin"  value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="bnr-one">
						<div class="bnr-left">
							<p>Ckeck Out</p>
						</div>
						<div class="bnr-right">
							<input type="date" name="cekout" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="bnr-one">
						<div class="bnr-left">
							<p>Dewasa</p>
						</div>
						<div class="bnr-right">
							<select name="tamudewasa"  id="tamudewasa">
								<option  class="rm" value="0">0</option>
								<option  class="rm" value="1">1</option>
								<option  class="rm" value="2">2</option>
								<option  class="rm" value="3">3</option>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="bnr-one">
						<div class="bnr-left">
							<p>Anak</p>
						</div>
						<div class="bnr-right">
							<select name="tamuanak" id="tamuanak">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="bnr-btn">
					
							<input type="submit" name="submit" value="Next">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end-banner-->
	<!---start-date-piker---->
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
			<script>
				$(function() {
				$( "#datepicker,#datepicker1" ).datepicker();
				});
			</script>
	<!---/End-date-piker---->




<script>
	function validateForm(form) {
		var a = form.datepicker.value;
		var b = form.datepicker1.value;
		var c = form.tamudewasa.value;
		var d = form.tamuanak.value;
			if(a == null || b == null || a == "" || b == "") 
			{
			 alert("masukkan tanggal");
			 return false;
			}
			if(c == 0) 
			{
			 	if(d == 0) 
				{
				 alert("harap pilih jumlah tamu");
				 return false;
				}
			}
			if(d == 0) 
			{
			 	if(c == 0) 
				{
				 alert("harap pilih jumlah tamu");
				 return false;
				}
			}

	}
</script>

<?php 
include_once 'footer.php';
 ?>
	