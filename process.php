<?php


function index($pathreal){
  $_SESSION['total_finding'] = 0;
  $_SESSION['total_fail'] = 0;
  $path = realpath($pathreal);
  $num = 1;
  $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
  foreach($objects as $pathfile => $object){
      $ext = pathinfo($pathfile, PATHINFO_EXTENSION);
      if($ext==="py" || $ext==="jsp" || $ext==="java"){
        echo "<font color='#ff00ff'><h4>".$num."> Path File: ".$pathfile."</h4></font><br>";
        $resultfinding = search($pathfile,"exec");
        $_SESSION['total_finding'] = $_SESSION['total_finding'] + $resultfinding;
        $num++;
      }
      // echo $name."<br>";
  }
  $_SESSION['total_fail'] = $num-1;
}

function search($pathfile,$searchthis){
  // $searchthis = "mystring";
$matches = array();

$handle = @fopen($pathfile, "r");
if ($handle)
{
  $x=1;
  $line = 1;
  echo "<table class='table table-striped table-hover'>";
  echo "<tbody>";
    while (!feof($handle))
    {
        $buffer = fgets($handle);
        if(strpos($buffer, $searchthis) !== FALSE){


          echo "<tr><td>";
          echo "<font color='#00bfff'>".$x."</font>";
          echo "</td><td>";
          echo "<font color='#ff6666'>Line ".$line."> ".$buffer."</font>";
          echo "</td></tr>";
          $x++;
          // echo "<br>";
          $matches[] = $buffer;
        }
        $line++;

    }

    echo "</tbody>";
    echo "</table>";
    fclose($handle);
    return count($matches);
}

//show results:
// print_r($matches);
}
function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
       if ('.' === $file || '..' === $file) continue;
       if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
       else unlink("$dir/$file");
   }

   rmdir($dir);
}


 ?>
