<?php

include_once 'head.php';
?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         
		 
			<div class="container-fluid">
			 <h4 class="sub-header">Dashboard</h4>
				<div class="row">	
					<?php
					include 'system/config1.php';
					$re = mysql_query("select count(id_pesan) as total_row from pesan WHERE DATEDIFF(NOW(), cekin) <= 7;");
					$re2 = mysql_query("select count(id_pesan) as total_row from pesan WHERE payment_status like 'pend%';");
					$re3 = mysql_query("select count(id_pesan) as total_row from pesan WHERE payment_status like 'conf%';");
					if(mysql_num_rows($re) > 0)
					{
						while($row = mysql_fetch_array($re))
						{
						echo "					<div class=\"col-xs-4\">\n";
						echo "							<div class=\"small-box bg-aqua\">\n";
						echo "                                <div class=\"inner\">\n";
						echo "                                    <h3>\n";
						echo "                                        ".$row['total_row']."\n";
						echo "                                    </h3>\n";
						echo "                                    <p>\n";
						echo "                                       Jumlah Pesanan 7 Hari Terakhir\n";
						echo "                                    </p>\n";
						echo "                                </div>\n";
						echo "                                <div class=\"icon\">\n";
						echo "                                    <i class=\"ion ion-person-add\"></i>\n";
						echo "                                </div>                                
                                </a>\n";
						echo "\n";
						echo "                            </div>			\n";
						echo "					</div>";

						}
					}
					if(mysql_num_rows($re2) > 0)
					{
						while($row2 = mysql_fetch_array($re2))
						{
						echo "					<div class=\"col-xs-4\">\n";
						echo "							<div class=\"small-box bg-green\">\n";
						echo "                                <div class=\"inner\">\n";
						echo "                                    <h3>\n";
						echo "                                        ".$row2['total_row']."\n";
						echo "                                    </h3>\n";
						echo "                                    <p>\n";
						echo "                                     Jumlah Pesanan Masih Pending\n";
						echo "                                    </p>\n";
						echo "                                </div>\n";
						echo "                                <div class=\"icon\">\n";
						echo "                                    <i class=\"ion ion-person-add\"></i>\n";
						echo "                                </div>                
                                </a>\n";
						echo "\n";
						echo "                            </div>			\n";
						echo "					</div>";
						
						}
					}
					if(mysql_num_rows($re3) > 0)
					{
						while($row3 = mysql_fetch_array($re3))
						{
						echo "					<div class=\"col-xs-4\">\n";
						echo "							<div class=\"small-box bg-yellow\">\n";
						echo "                                <div class=\"inner\">\n";
						echo "                                    <h3>\n";
						echo "                                        ".$row3['total_row']."\n";
						echo "                                    </h3>\n";
						echo "                                    <p>\n";
						echo "                                        Jumlah Pesanan Terbayar\n";
						echo "                                    </p>\n";
						echo "                                </div>\n";
						echo "                                <div class=\"icon\">\n";
						echo "                                    <i class=\"ion ion-person-add\"></i>\n";
						echo "                                </div>       
                                </a>\n";
						echo "\n";
						echo "                            </div>			\n";
						echo "					</div>";
						
						}
					}
					
					?>