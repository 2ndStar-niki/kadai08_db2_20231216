<?php
  session_start();

  function connect() {
    return new PDO("mysql:dbname=shop", "root");
  }

//   function img_tag($code) {
//     if (file_exists("images/$code.gif")) $name = $code;
//     else $name = 'noimage';
//     return '<img src="images/' . $name . '.gif" alt="" width="200px">';
//   }
function img_tag($code) {
    $filename = "../images/$code.gif";
    // echo "Debug: $code - $filename<br>";  // Debugging output
  
    if (file_exists($filename)) {
      return '<img src="' . $filename . '" alt="" width="200px">';
    } else {
      // Use a default image if the file doesn't exist
      return '<img src="../images/noimage.jpg" alt="" width="200px">';
    }
  }
  
  
?>

