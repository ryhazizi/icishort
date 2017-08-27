<?php

    require_once 'core/init.php';
    $session->start();
    $Result = "";
    if ($Result = $session->check('Email') AND $Result == "TRUE")
    {
       header("location: ".$baseurl->get()."");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>iCiShort - Masuk</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $baseurl->get(); ?>assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl->get(); ?>assets/css/style.css">
     <script src="<?php echo $baseurl->get(); ?>assets/plugin/sweetalert/sweetalert.min.js"></script>
   <link rel="stylesheet" type="text/css" href="<?php echo $baseurl->get(); ?>assets/plugin/sweetalert/sweetalert.css">
</head>
<body>
   <?php

      if (isset($_POST['keyUpsjsZqwIB']))
      {

         $LoginData  = array
                       (
                          "Email"       => $securityf->Data($_POST['Email']),
                          "Katasandi"   => $securityf->Data($_POST['Katasandi'])
                       );

         if ($validation->empty_field($LoginData['Email']) == "TRUE")
         {
            echo "<script>sweetAlert('Kesalahan', 'Email masih kosong.', 'error');</script>";
         }
         else if ($validation->empty_field($LoginData['Katasandi']) == "TRUE")
         {
            echo "<script>sweetAlert('Kesalahan', 'Katasandi masih kosong.', 'error');</script>";
         }
         else if ($Result = $login->check_email($LoginData['Email']) AND $Result == "TRUE")
         {
            if ($Result = $login->check_password($LoginData['Katasandi']) AND $Result == "TRUE")
            {
               $session->give('Email', $LoginData['Email']);
               header("location: ".$baseurl->get()."");
            }
            else
            { 
               echo "<script>sweetAlert('Kesalahan', 'Katasandi yang anda masukkan salah.', 'error');</script>";
            }
         }
         else
         {
            echo "<script>sweetAlert('Kesalahan', 'Email yang anda masukkan salah.', 'error');</script>";
         }
      }

   ?>
   <header><a href="index.php">iCiShort</a></header>
    <div class="box3">
     <div id="FormMsk">
     <center>
      <form name="Form-Masuk-iCiShort" method="POST">
       <input type="email" class="FormMskInputText" placeholder="Email" name="Email">
     	   <input type="password" class="FormMskInputText" placeholder="Katasandi" name="Katasandi">
         <center>
          <button type="submit" id="mskButton" style="text-align: center" name="keyUpsjsZqwIB">Masuk</button>
         </center>
     </div>
     </div>
     <div id="footer">2017 - iCiShort</div>
</body>
</html>