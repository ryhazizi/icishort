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
	<title>iCiShort - Daftar</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $baseurl->get(); ?>assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl->get(); ?>assets/css/style.css">
      <script src="<?php echo $baseurl->get(); ?>assets/plugin/sweetalert/sweetalert.min.js"></script>
   <link rel="stylesheet" type="text/css" href="<?php echo $baseurl->get(); ?>assets/plugin/sweetalert/sweetalert.css">
</head>
<body>
<?php

   if (isset($_POST['keyheP3z8qglJ']))
   {
     $RegisterData = array
                      ( 'NamaDepan'     => $register->set_real_escape_string($securityf->Data($_POST['NamaDepan'])),
                        'NamaBelakang'  => $register->set_real_escape_string($securityf->Data($_POST['NamaBelakang'])),
                        'Alamat'        => $register->set_real_escape_string($securityf->Data($_POST['Alamat'])),
                        'Email'         => $register->set_real_escape_string($securityf->Data($_POST['Email'])),
                        'Katasandi'     => $register->set_real_escape_string($securityf->Data($_POST['Katasandi'])),
                        'TanggalLahir'  => $_POST['TanggalLahir'],
                        'BulanLahir'    => $_POST['BulanLahir'],
                        'TahunLahir'    => $_POST['TahunLahir'],
                        'JenisKelamin'  => $_POST['JenisKelamin'],
                        'Ponsel'        => $_POST['Ponsel']
                      );

      if ($validation->empty_field($RegisterData['NamaDepan']) == "TRUE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Nama depan masih kosong.', 'error');</script>";
      }
      else if ($validation->empty_field($RegisterData['NamaBelakang']) == "TRUE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Nama belakang masih kosong.', 'error');</script>";
      }
      else if ($validation->empty_field($RegisterData['TanggalLahir']) == "TRUE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Tanggal lahir masih kosong.', 'error');</script>";
      }
      else if ($validation->empty_field($RegisterData['BulanLahir']) == "TRUE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Bulan lahir masih kosong.', 'error');</script>";
      }
      else if ($validation->empty_field($RegisterData['TahunLahir']) == "TRUE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Tahun lahir masih kosong.', 'error');</script>";
      }
      else if ($validation->empty_field($RegisterData['JenisKelamin']) == "TRUE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Jenis kelamin masih kosong.', 'error');</script>";
      }
      else if ($validation->empty_field($RegisterData['Alamat']) == "TRUE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Alamat masih kosong.', 'error');</script>";
      }
      else if ($validation->empty_field($RegisterData['Email']) == "TRUE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Email masih kosong.', 'error');</script>";
      }
      else if ($validation->empty_field($RegisterData['Katasandi']) == "TRUE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Katasandi masih kosong.', 'error');</script>";
      }
      else if ($validation->empty_field($RegisterData['Ponsel']) == "TRUE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Nomor ponsel masih kosong.', 'error');</script>";
      }
      else if ($validation->regex_name($RegisterData['NamaDepan']) == "FALSE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Nama depan hanya boleh berisi huruf dan spasi.', 'warning');</script>";
      }
      else if ($validation->regex_name($RegisterData['NamaBelakang']) == "FALSE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Nama belakang hanya boleh berisi huruf dan spasi.', 'warning');</script>";
      }
      else if ($validation->regex_address($RegisterData['Alamat']) == "FALSE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Alamat hanya boleh berisi huruf, angka dan spasi.', 'warning');</script>";
      }
      else if ($validation->regex_email($RegisterData['Email']) == "FALSE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Format email anda salah. Contoh format yang benar : example@email.com .', 'warning');</script>";
      }
      else if ($validation->regex_password($RegisterData['Katasandi']) == "FALSE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Katasandi hanya boleh berisi huruf, angka dan spasi.', 'warning');</script>";
      }
      else if ($validation->regex_phone($RegisterData['Ponsel']) == "FALSE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Format nomor ponsel harus diawali 08 dan hanya boleh berisi 12 angka.', 'warning');</script>";
      }
      else if ($validation->amount_character($RegisterData['NamaDepan']) == "Short")
      {
            echo "<script>sweetAlert('Kesalahan', 'Nama depan minimal lebih dari 4 huruf.', 'warning');</script>";
      }
      else if ($validation->amount_character($RegisterData['NamaDepan']) == "Long")
      {
            echo "<script>sweetAlert('Kesalahan', 'Nama depan tidak boleh lebih dari 30 huruf.', 'warning');</script>";
      }
      else if ($validation->amount_character($RegisterData['NamaBelakang']) == "Short")
      {
            echo "<script>sweetAlert('Kesalahan', 'Nama belakang minimal lebih dari 4 huruf.', 'warning');</script>";
      }
      else if ($validation->amount_character($RegisterData['NamaBelakang']) == "Long")
      {
            echo "<script>sweetAlert('Kesalahan', 'Nama belakang tidak boleh lebih dari 30 huruf.', 'warning');</script>";
      }
      else if ($validation->amount_character($RegisterData['Alamat']) == "Short")
      {
            echo "<script>sweetAlert('Kesalahan', 'Alamat minimal lebih dari 4 karakter.', 'warning');</script>";
      }
      else if ($validation->amount_character($RegisterData['Alamat']) == "Long")
      {
            echo "<script>sweetAlert('Kesalahan', 'Alamat tidak boleh lebih dari 30 karakter.', 'warning');</script>";
      }
      else if ($validation->amount_character($RegisterData['Email']) == "Short")
      {
            echo "<script>sweetAlert('Kesalahan', 'Email minimal lebih dari 4 karakter.', 'warning');</script>";
      }
      else if ($validation->amount_character($RegisterData['Email']) == "Long")
      {
            echo "<script>sweetAlert('Kesalahan', 'Email tidak boleh lebih dari 30 karakter.', 'warning');</script>";
      }
      else if ($Status = $validation->check_email($RegisterData['Email']) AND $Status == "FALSE")
      { 
         echo "<script>sweetAlert('Kesalahan', 'Email yang anda gunakan sudah terdaftar di sistem kami.', 'warning');</script>";
      }
      else if ($validation->amount_character($RegisterData['Katasandi']) == "Short")
      {
            echo "<script>sweetAlert('Kesalahan', 'Katasandi minimal lebih dari 4 karakter.', 'warning');</script>";
      }
      else if ($validation->amount_character($RegisterData['Katasandi']) == "Long")
      {
            echo "<script>sweetAlert('Kesalahan', 'Katasandi tidak boleh lebih dari 30 karakter.', 'warning');</script>";
      }
      else if ($validation->amount_number($RegisterData['Ponsel']) == "FALSE")
      {
            echo "<script>sweetAlert('Kesalahan', 'Nomor ponsel harus terdiri dari 12 angka.', 'warning');</script>";
      }
      else if ($Status = $validation->check_phone($RegisterData['Ponsel']) AND $Status == "FALSE")
      { 
            echo "<script>sweetAlert('Kesalahan', 'Nomor ponsel yang anda gunakan sudah terdaftar di sistem kami.', 'warning');</script>";
      }
      else
      {
        if($register->insert($RegisterData['NamaDepan'], $RegisterData['NamaBelakang'], $RegisterData['TanggalLahir'], $RegisterData['BulanLahir'], $RegisterData['TahunLahir'], $RegisterData['JenisKelamin'], $RegisterData['Alamat'], $RegisterData['Email'], $register->hash($RegisterData['Katasandi']), $RegisterData['Ponsel'], $code->create()))
        {
          if ($register->success())
          {
             echo "<script>sweetAlert('Sukses', 'Pendaftaran berhasil anda sekarang dapat mengakses akun anda.', 'success');</script>";     
          }
          else
          {
             echo "<script>sweetAlert('Kesalahan', 'Terjadi kesalahan sistem yang menyebabkan pendaftaran anda tidak berhasil silahkan mencoba kembali.', 'error');</script>";     
          }
        }
      }


    }

?>
   <header><a href="index.php">iCiShort</a></header>
    <div class="box2">
     <div id="FormDftr">
     <form name="Form-Pendaftaran-iCiShort" method="POST">
       <input type="text" class="FormDftrInputText" placeholder="Nama Depan" name="NamaDepan" id="NamaDepan">
     	 <input type="text" class="FormDftrInputText" placeholder="Nama Belakang" name="NamaBelakang" id="NamaBelakang">
     	   <select class="FormDftrSelectOptions" name="TanggalLahir" id="TanggalLahir">  
     	     <option selected="selected" value="">Tanggal Lahir</option>
     	      <option value="1">1</option>
             <option value="2">2</option>
               <option value="3">3</option>
                 <option value="4">4</option>
                  <option value="5">5</option>
                    <option value="6">6</option>
                     <option value="7">7</option>
                      <option value="8">8</option>
                       <option value="9">9</option>
                        <option value="10">10</option>
                         <option value="11">11</option>
                          <option value="12">12</option>
                           <option value="13">13</option>
                            <option value="14">14</option>
                             <option value="15">15</option>
                            <option value="16">16</option>
                           <option value="17">17</option>
                          <option value="18">18</option>
                         <option value="19">19</option>
                        <option value="20">20</option>
                       <option value="21">21</option>
                      <option value="22">22</option>
                     <option value="23">23</option>
                    <option value="24">24</option>
                   <option value="25">26</option>
                  <option value="27">27</option>
                 <option value="28">28</option>
                <option value="29">29</option>
               <option value="30">30</option>
              <option value="31">31</option>
            </select>
           <select class="FormDftrSelectOptions" name="BulanLahir" id="BulanLahir">  
     	      <option selected="selected" value="">Bulan Lahir</option>
     	        <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                  <option value="Maret">Maret</option>
                    <option value="April">April</option>
                     <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                   <option value="Juli">Juli</option>
                  <option value="Agustus">Agustus</option>
                 <option value="September">September</option>
                <option value="Oktober">Oktober</option>
               <option value="November">November</option>
              <option value="Desember">Desember</option>
            </select>
            <select class="FormDftrSelectOptions" name="TahunLahir" id="TahunLahir">  
     	       <option selected="selected" value="">Tahun Lahir</option>
               <option value="1972">1972</option>
                 <option value="1973">1973</option>
                   <option value="1974">1974</option>
                     <option value="1975">1975</option>
                       <option value="1976">1976</option>
                         <option value="1977">1977</option>
                           <option value="1978">1978</option>
                             <option value="1979">1979</option>
                               <option value="1980">1980</option>
                                 <option value="1981">1981</option>
                                   <option value="1982">1982</option>
                                     <option value="1983">1983</option>
                                       <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                       <option value="1986">1986</option>
                                      <option value="1987">1987</option>
                                     <option value="1988">1988</option>
                                    <option value="1989">1989</option>
                                   <option value="1990">1990</option>
                                  <option value="1991">1991</option>
                                 <option value="1992">1992</option>
                                <option value="1993">1993</option>
                               <option value="1994">1994</option>
                              <option value="1995">1995</option>
                            <option value="1996">1996</option>
                          <option value="1997">1997</option>
                        <option value="1998">1998</option>
                      <option value="1999">1999</option>
                    <option value="2000">2000</option>
                  <option value="2001">2001</option>
                <option value="2002">2002</option>
              <option value="2003">2003</option>
            </select>
            <select class="FormDftrSelectOptions2" name="JenisKelamin" id="JenisKelamin">  
     	        <option selected="selected" value="">Jenis Kelamin</option>
     	           <option value="Pria">Pria</option>
                <option value="Pria">Wanita</option>
            </select>
              <input type="text" class="FormDftrInputText2" placeholder="Alamat" name="Alamat" id="Alamat">
                <input type="email" class="FormDftrInputText2" placeholder="Email" name="Email" id="Email">
                  <input type="password" class="FormDftrInputText2" placeholder="Katasandi" name="Katasandi" id="Katasandi">
                    <input type="number" class="FormDftrInputText2" placeholder="Ponsel" name="Ponsel" id="Ponsel">
                 <div class="InfoTmbhn">
                   Dengan mendaftar anda menyetujui ketentuan dan layanan yang ada.
                </div>
               <center>
                  <button type="submit" id="dftrButton" style="text-align: center" name="keyheP3z8qglJ">Mendaftar</button>
              </center>
          </form>
        </div>
     </div>
  <div id="footer">2017 - iCiShort</div>
 </body>
</html>