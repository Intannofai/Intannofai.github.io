<?php  
include "convert.php";
 
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 
<head>
    <title>Vigenere Cipher by Kelompok IV</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="generator" content="Geany 0.18" />
    <link rel="icon" href="img/icon.png" />
    <style type="text/css">
    a:link {color: #000000; text-decoration: none}
    a:visited {color: #000000; text-decoration: none}
    a:hover {color: #FF0000; text-decoration: underline}
	.title{
		width:700px;
		height:100px;
		float:left;
		background-color:#333;
		color:#FFF;
		margin-left:350px;
		border-radius: 80px 0px 0px 0px;
		padding-top:25px;
	}
	.main{
		width:700px;
		height:300px;
		float:left;
		background-color:#999;
		padding-top:50px;
		margin-left:350px;
	}
	.footer{
		width:700px;
		height:40px;
		float:left;
		margin-left:350px;
		background-color:#333;
		color:#FFF;
		border-radius: 0px 0px 50px 0px;
		padding-top:10px;
	}
    </style>
    <script type="text/javascript">
    function SelectAll(id){
        document.getElementById(id).focus();
        document.getElementById(id).select();
    }
    function Info(){
        alert("Original code by :"+'\n\n'+"Ahmad Zafrullah Mardiansyah");
    }
    function InfoCaesar(){
        alert("Key hanya berupa kombinasi angka,"+'\n'+"dan plan text tidak boleh mengandung angka!");
    }
    function InfoVigenere(){
        alert("Key hanya berupa kombinasi kata, tidak boleh mengandung angka,"+'\n'+"dan plan text tidak boleh mengandung angka!");
    }
    </script>
</head>
 
<body background="img/body.png">
<center>
    <div class="title"><h2><font size="+3">Kriptografi Substitusi Vigenere Cipher</font></h2></div>
    </center>
    <div class="main">
    <table width="600" align="center">
    <tr>
      <td valign="top"><fieldset>
        <legend><b>Vigenere</b></legend>
        <form action="" method="post">
          <input type="text" name="key_vigenere" id="key_vigenere" placeholder="The Key..." onclick="SelectAll('key_vigenere')" />
          <input type="submit" value="?" onclick="InfoVigenere()" />
          <br/>
          <textarea rows="4" name="plantext_vigenere" id="plantext_vigenere" cols="33" onclick="SelectAll('plantext_vigenere')" placeholder="Input Plaintext / Ciphertext..."></textarea>
          <br/>
          <input type="submit" name="encrypt_vigenere" value="Encrypt" />
          <input type="submit" name="decrypt_vigenere" value="Decrypt" />
          <input type="reset" value="Reset" />
        </form>
      </fieldset></td>
      <td valign="top" colspan="3">
    <fieldset>
    <legend><b>Result</b></legend>
    <?php
    
    //----------------------------------------------------------------//
    // vigenere                                                       //
    //----------------------------------------------------------------//
 if ((isset($_POST['key_vigenere'])) && (isset($_POST['plantext_vigenere'])) && (isset($_POST['encrypt_vigenere']))){
            $key=$_POST['key_vigenere'];
            $plantext=$_POST['plantext_vigenere'];
            $len_key=strlen($key);
            $len_plantext=strlen($plantext);
            $split_key=str_split($key);
            $split_plantext=str_split($plantext);
            
			
            echo '<textarea rows="4" id="result" cols="33" onclick="SelectAll(\'result\')" >';
            $i=0;
            for($j=0;$j<$len_plantext;$j++){
                if ($i==$len_key){
                    $i=0;
                }
                $split_key2[$j]=$split_key[$i];
                $i++;
            }
            for($k=0;$k<$len_plantext;$k++){
                $a=char_to_dec($split_key2[$k]);
                $b=char_to_dec($split_plantext[$k]);
                if (($a && $b)!=null){
                    echo (tabel_vigenere_encrypt($a, $b));
                } else {
                    echo $split_plantext[$k];
                }
            }
            echo '</textarea><br/>';
        } else if ((isset($_POST['key_vigenere'])) && (isset($_POST['plantext_vigenere'])) && (isset($_POST['decrypt_vigenere']))){
            $key=$_POST['key_vigenere'];
            $plantext=$_POST['plantext_vigenere'];
            $len_key=strlen($key);
            $len_plantext=strlen($plantext);
            $split_key=str_split($key);
            $split_plantext=str_split($plantext);
             
            echo '<textarea rows="4" id="result" cols="33" onclick="SelectAll(\'result\')" >';
            $i=0;
            for($j=0;$j<$len_plantext;$j++){
                if ($i==$len_key){
                    $i=0;
                }
                $split_key2[$j]=$split_key[$i];
                $i++;
            }
             
            for($k=0;$k<$len_plantext;$k++){
                $a=char_to_dec($split_key2[$k]);
                $b=char_to_dec($split_plantext[$k]);
                if (($a && $b)!=null){
                    echo (tabel_vigenere_decrypt($b, $a));
                } else {
                    echo $split_plantext[$k];
                }
            }
             
            echo '</textarea><br/>';
 
        } else {
            echo "Result Here...";
        }
    ?>
    </fieldset>
    </td></tr>
    </table>
   </div>
   <div class="footer" align="center"><i>Copyright &copy; 2022 Kriptografi Substitusi Vigenere Cipher by Kelompok IV</i></div>
</body>
</html>