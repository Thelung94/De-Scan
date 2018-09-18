
<?php
session_start();

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
	<div class="jumbotron">
           <h1>De Scan</h1>
           <p>De Scan is open source application to scan Malicious code to ro run execution command in java application</p>
					 <br>
					 <p>
						 <hr class="style5">
						 <br>
						 <br>
						 <center>
					    <form enctype="multipart/form-data" method="post" action="result.php">
					    <h2>
					      <label><font color="#ffbf00">Upload your file to start scanning: </font></label>
					        <input type="file" name="zip_file" class="form-control input-lg" />
					    <h2>
					    <input type="submit" name="submit" value="START" class="btn btn-danger" />
					    </center>
           </p>
  </div>




</div>
</body>
</html>
