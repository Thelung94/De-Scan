<?php
session_start();
include 'process.php';

if(isset($_FILES["zip_file"])){


if($_FILES["zip_file"]["name"]) {
    $filename = $_FILES["zip_file"]["name"];
    $source = $_FILES["zip_file"]["tmp_name"];
    $type = $_FILES["zip_file"]["type"];
    $okay = false;
    $name = explode(".", $filename);
    $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
    foreach($accepted_types as $mime_type) {
        if($mime_type == $type) {
            $okay = true;
            break;
        }
    }
    if(!$okay){
      $URL="error.php";
      echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    }
    $continue = strtolower($name[1]) == 'zip' ? true : false;
    if(!$continue) {
        $message = "The file you are trying to upload is not a .zip file. Please try again.";
    }

  /* PHP current path */
  $path = dirname(__FILE__).'\uploads\file';  // absolute path to the directory where zipper.php is in
  $filenoext = basename ($filename, '.zip');  // absolute path to the directory where zipper.php is in (lowercase)
  $filenoext = basename ($filenoext, '.ZIP');  // absolute path to the directory where zipper.php is in (when uppercase)

  $targetdir = $path . $filenoext; // target directory
  $targetzip = $path . $filename; // target zip file

  /* create directory if not exists', otherwise overwrite */
  /* target directory is same as filename without extension */

  if (is_dir($targetdir))  rmdir_recursive ( $targetdir);


  mkdir($targetdir, 0777);


  /* here it is really happening */

    if(move_uploaded_file($source, $targetzip)) {
        $zip = new ZipArchive();
        $x = $zip->open($targetzip);  // open the zip file to extract
        if ($x === true) {
            $zip->extractTo($targetdir); // place in the directory with same name
            $zip->close();

            unlink($targetzip);
        }
        $message = "Your .zip file was uploaded and unpacked.";
    } else {
        $message = "There was a problem with the upload. Please try again.";
    }
    // echo $targetdir;

}
}
 ?>

 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title>Backdoor Scanning</title>
 <link href="hacker.css" rel="stylesheet">
 <style media="screen">
 hr.style5 {
 background-color: #fff;
 border-top: 2px dashed #8c8b8b;
 }
 </style>
 </head>

 <body>

   <h1><center><b>

   </b></center></h1>
 <div class="container">
   <?php if(isset($_FILES["zip_file"])){ ?>
<h1>
<center>
==========================================================
List Scaning Result
==========================================================
</center>
</h1>
<h2> <a href="summary.php">Summary Report</a></h2>
<?php }else{ ?>
  <h1>
  <center>
    <font color='red'>
  =======================================================
  Error Result
  =======================================================
</font>
  </center>
  </h1>
<?php } ?>

<?php if(isset($_FILES["zip_file"])){ index($targetdir); } ?>


 </div>
 </body>
 </html>
