<?php 
include_once 'header.php';
 ?>


	<div class="banner">



		<div class="large-3 columns blackblur fontcolor" style="padding-top:10px; float: left; margin-top: 2%;margin-left: 4%; background-color: rgba(255,255,255,0.5)" >
			    	 	<h3>Find Us Here</h3>
			    	 		<div class="map">
					   			<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color: #242424;text-shadow: 0 1px 0 #ffffff;text-align: left;font-size: 0.7125em;padding: 5px;font-weight: 600;">View Larger Map</a></small>
					   		</div>
      				</div>
      	

<div class="large-7 columns blackblur fontcolor" style="padding-top:10px; float: right; margin-top: 2%; margin-right: 4%; background-color: rgba(255,255,255,0.5)" >
		<p><h2 style='size:20px;'>Hubungi Kami</h2><hr class="line"></p>
		<form action="simpankontak.php" method="post"  onSubmit="return validateForm(this);">
		  <div class="row">

			<div class="large-6 columns">
			  <label class="fontcolor">Nama *
				<input name="nama" type="text" value="<?php if(isset($_SESSION['nama_awal']) && !empty($_SESSION['nama_awal'])){echo  $_SESSION['nama_awal'];}?>" pattern="[a-zA-Z\s]+" Title="Only alphabet characters allowed" placeholder="" size="35" />
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Email*
				<input name="email" type="email" value="<?php if(isset($_SESSION['email']) && !empty($_SESSION['email'])){echo  $_SESSION['email'];}?>" placeholder="" size="35" />
			  </label>
			</div>
			
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Alamat*
				<input name="alamat" type="text" value="<?php if(isset($_SESSION['alamat']) && !empty($_SESSION['alamat'])){echo  $_SESSION['alamat'];}?>"   placeholder="" size="35"/>
			  </label>
			</div>
			
		  
		  <div class="row">
			<div class="large-12 columns">
			  <label class="fontcolor"  style="margin-left: 2%;" >Pesan
				<textarea name="pesan" placeholder=""><?php if(isset($_SESSION['lain_lain']) && !empty($_SESSION['lain_lain'])){echo  $_SESSION['lain_lain'];}?></textarea>
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
</div>

	<?php

include_once 'footer.php';
	?>