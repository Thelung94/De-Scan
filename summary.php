
<?php session_start(); ?>
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

<div class="container">
  <h1>
  <center>
  =====================================================
  Summary Scaning
  =====================================================
  </center>
  </h1>

  <table class="table table-striped table-hover">
   <tr>
     <td><center><font color='#33cc33'><h2>Total Files:</h2></font></center></td>
     <td><center><font color='#33cc33'><h2>Total Findings:</h2></font></center></td>
   </tr>
   <tr>
     <td><center><font color='#ff3333'><h1><?php echo $_SESSION['total_fail']; ?></h1></font></center></td>
     <td><center><font color='#ff3333'><h1><?php echo $_SESSION['total_finding']; ?></h1></font></center></td>
   </tr>
   <tr><td colspan="2"><center><font color='#33cc33'><h1>Description</h1></font></center></td></tr>
   <tr><td colspan="2"><font color='#33cc33'>Command Execution vulnerability occurs when an application passes unsafe data supplied by the user (forms, cookies, HTTP headers etc.) to a system shell. In this attack operating system commands supplied by the attacker are usually executed with the privileges of the vulnerable application. Successful shell command execution attack can result in arbitrary command execution and a full system compromise.
</font></td></tr>
  </table>



</div>
</body>
</html>
