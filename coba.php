<?php
include 'system/config1.php';
?>
<html>
    <head>

        <title>Script PHP Pencarian Data Berdasarkan Periode Tanggal</title>
    </head>
    <body>
        <div style="border:1px solid #B0C4DE; padding:10px; overflow:auto; width:1113px; height:500px;">
      
        <form action="coba.php" method="post" name="postform">
            <p align="center"><font color="orange" size="3"><b>Pencarian Data Berdasarkan Periode Tanggal</b></font></p><br />
            <table border="0">
                <tr>
                    <td width="125"><b>Dari Tanggal</b></td>
                    <td colspan="2" width="190">: <input type="date" name="cekin" size="16" /></td>
                    <td width="125"><b>Sampai Tanggal</b></td>
                    <td colspan="2" width="190">: <input type="date" name="cekout" size="16" /></td>
                    <td colspan="2" width="190"><input type="submit" value="Pencarian Data" name="pencarian"/></td>
                    <td colspan="2" width="70"><input type="reset" value="Reset" /></td>
                </tr>
            </table>
        </form><br />
        <p>
        <?php
          
            if(isset($_POST['pencarian'])){
          
            $cekin=$_POST['cekin'];
            $cekout=$_POST['cekout'];
            if(empty($cekin) || empty($cekout)){
          
            ?>
            <script language="JavaScript">
                alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
                document.location='coba.php';
            </script>
            <?php
            }else{
            ?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['cekin']?></b> s/d <b><?php echo $_POST['cekout']?></b></i>
            <?php
            $query=mysql_query("select * from pesan where cekin between '$cekin' and '$cekout'");
            }
        ?>
        </p>
        <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#FF6600">
                <th width="10" height="40">cekin</td> 
                <th width="60">cekout</td> 
                      
            </tr>
            <?php
            //menampilkan pencarian data
            while($row=mysql_fetch_array($query)){
            ?>
            <tr>
                <td align="center" height="30"><?php echo $row['cekin']; ?></td>
                   <td align="center" height="30"><?php echo $row['cekout']; ?></td>
          
            </tr>
            <?php
            }
            ?>    
            <tr>
                <td colspan="4" align="center"> 
                <?php
                //jika pencarian data tidak ditemukan
                if(mysql_num_rows($query)==0){
                    echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                }
                ?>
                </td>
            </tr> 
        </table>
        <?php
        }
        else{
            unset($_POST['pencarian']);
        }
        ?>
    
    </body>
</html>