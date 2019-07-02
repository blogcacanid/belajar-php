<h2>Coba Encryption & Decryption OOP PHP</h2>
<?php
class MY_Encryption {

     var $skey = "3JtYFFmFYByQYseg4ZGWmv7w"; // kata kunci bisa di ganti sesuai keingginan kita

     public function safe_b64encode($string) {
          $data = base64_encode($string);
          $data = str_replace(array('+', '/', '='),array('-', '_', ''),$data);
          return $data;
     }

     public function safe_b64decode($string) {
          $data = str_replace(array('-', '_'),array('+', '/'),$string);
          $mod4 = strlen($data) % 4;
          if ($mod4) {
               $data .= substr('====', $mod4);
          }
          return base64_decode($data);
     }

     public function encode($value) {
          if (!$value) {
               return false;
          }
          $text = $value;
          $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
          $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
          $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
          return trim($this->safe_b64encode($crypttext));
     }

     public function decode($value) {
          if (!$value) {
               return false;
          }
          $crypttext = $this->safe_b64decode($value);
          $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
          $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
          $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
          return trim($decrypttext);
     }

}


// Cara pemanggilan
$kata_awal = "PasswoRD_ku";
$converter = new MY_Encryption;
$enkripsi = $converter->encode($kata_awal);
$decripsi = $converter->decode($enkripsi);

// Hasil yang akan di tampilkan di layar
echo "<b>Kata Awal : </b>".$kata_awal;
echo "<br/>"; // ganti baris
echo "<b>Hasil Enkripsi : </b>".$enkripsi;
echo "<br/>"; // ganti baris
echo "<b>Hasil Dekripsi : </b>".$decripsi;

?>
