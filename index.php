<?php

    require_once 'core/init.php';
    $session->start();
    $Result = "";
    
    if ($Result = $session->check('Email') AND $Result == "FALSE")
    {
?>

<!DOCTYPE html>
<html>
<head>
	<title>iCiShort - Pemendek URL</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $baseurl->get(); ?>assets/css/font.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $baseurl->get(); ?>assets/css/style.css">
      <script src="<?php echo $baseurl->get(); ?>assets/plugin/sweetalert/sweetalert.min.js"></script>
   <link rel="stylesheet" type="text/css" href="<?php echo $baseurl->get(); ?>assets/plugin/sweetalert/sweetalert.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
  <header><a href="index.php">iCiShort</a></header>
    <div id="content" style="text-align: center;">
       <div class="box">
        <form name="PendekkanURL" method="POST">
          <input type="text" class="InputURL" placeholder="http://" name="URL"> <input type="submit" class="ButtonShort" value="Generate" name="Proses">
         </form>
         <br/>
          <br/>
           <?php

              if (isset($_POST['Proses']))
                {
                     $URL    = $securityf->Data($_POST['URL']);
                     $Nama   = "Anonim"; 

                     if ($validation->empty_field($URL) == "TRUE")
                     {
                       echo "<script>sweetAlert('Kesalahan', 'URL masih kosong.', 'error');</script>";
                     }
                     else
                     {
                       if ($system->insert($URL, $urlshort, $Nama, "0",$code->create()) == "TRUE")
                       {
                        ?>
                        <center>
                          <table>
                            <tr>
                              <td><?php echo "Berhasil url anda telah di pendekkan menjadi <a href='".$baseurl->get().$urlshort."' class='aShortURL'>".$baseurl->get().$urlshort."";?></td>
                            </tr>
                          </table>
                        </center>
                        <?php
                       }
                       else
                       {
                          echo "<script>sweetAlert('Kesalahan', 'Tidak dapat memperpendek url anda silahkan ulangi lagi.', 'error');</script>";
                       }
                    }
                }
           ?>
           <br/><br/>
           <a href="daftar.php"><button type="submit" class="regButton">Mendaftar</button></a> <a href="masuk.php"><button type="submit" class="logButton">Masuk</button></a>
         </div>
       </div>
       <div id="footer">2017 - iCiShort</div>
</body>
</html>
<?php

     }
     else
     {
       ?>
       <!DOCTYPE html>
<html>
<head>
  <title>iCiShort - Pemendek URL</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl->get(); ?>assets/css/font.css">
      <link rel="stylesheet" type="text/css" href="<?php echo $baseurl->get(); ?>assets/css/style.css">
      <script src="<?php echo $baseurl->get(); ?>assets/plugin/sweetalert/sweetalert.min.js"></script>
   <link rel="stylesheet" type="text/css" href="<?php echo $baseurl->get(); ?>assets/plugin/sweetalert/sweetalert.css">
</head>
<body>
  <header><a href="index.php">iCiShort</a></header>
    <div id="content" style="text-align: center;">
       <br/>
        <br/>
       Selamat Datang <strong><?php echo $session->get($Result); ?></strong>.
       <div class="box">
        <form name="PendekkanURL" method="POST">
          <input type="text" class="InputURL" placeholder="http://" name="URL"> <input type="submit" class="ButtonShort" value="Generate" name="Proses">
         </form>
         <br/>
          <br/>
          <div class="history">
           <?php

                if (isset($_POST['Proses']))
                {
                     $URL    = $securityf->Data($_POST['URL']);
                     $Nama   =  $session->get($Result);

                     if ($validation->empty_field($URL) == "TRUE")
                     {
                       echo "<script>sweetAlert('Kesalahan', 'URL masih kosong.', 'error');</script>";
                     }
                     else
                     {
                       if ($Result = $system->insert($URL, $urlshort, $Nama, "0", $code->create()) AND $Result == "TRUE")
                       {
                         ?>
                        <center>
                          <table>
                            <tr>
                              <td><?php echo "Berhasil url ".$Nama." telah di pendekkan menjadi <a href='".$baseurl->get().$urlshort."' class='aShortURL'>".$baseurl->get().$urlshort."";?></td>
                            </tr>
                          </table>
                        </center>
                        <?php
                       }
                       else
                       {  
                          echo "<script>sweetAlert('Kesalahan', 'Tidak dapat memperpendek url anda silahkan ulangi lagi.', 'error');</script>";
                       }
                    }
                 }

                 $getHistory = $system->gethistory($session->get($Result));
                
                 if ($getHistory->num_rows > 0)
                 {
                   ?>
                   <center>
                    <h1 class="h1history">Riwayat</h1>
                     <br/>
                      <br/>
                      <table>
                       <thead>
                        <tr>
                          <th>URL Asli</th>
                          <th>URL Pendek</th>
                          <th>Dikunjungi</th>
                         </tr>
                      </thead>
                      <tbody>
                   <?php
                    while ($history = $getHistory->fetch_assoc()) 
                    {
                      ?>
                         <tr>
                           <td>
                             <p><?php echo $history['URLAsli'];?></p>
                           </td>
                           <td>
                            <a href="<?php echo $baseurl->get().$history['URLPendek'];?>"><?php echo $baseurl->get().$history['URLPendek'];?></a>
                           </td>
                           <td>
                             <?php echo $history['Dikunjungi']; ?> x
                           </td>
                         </tr>
                     <?php  
                    }?></tbody></table></center><?php
                 }
                 else
                 {
                   ?>

                    <center>
                    <h1 class="h1history">Riwayat</h1>
                     <br/>
                      <br/>
                      <table>
                       <thead>
                        <tr>
                          <th>URL Asli</th>
                          <th>URL Pendek</th>
                          <th>Dikunjungi</th>
                         </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td>Tidak ada data yang dapat ditampilkan.</td>
                          <td></td>
                        </tr>
                      </tbody></table></center>

                   <?php
                 }

           ?>
           </div>
            <br/>
            <br/>
           <center><a href="keluar.php"><button type="submit" class="logOutButton">Keluar</button></a></center>
         </div>
       </div>
       <div id="footer">2017 - iCiShort</div>
</body>
</html>

<?php } ?>