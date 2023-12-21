<?php
  function connect() {
    return new PDO("mysql:dbname=shop", "root");
  }

  function img_tag($code) {
    if (file_exists("../images/$code.gif")) $name = $code;
    else $name = 'noimage';
    return '<img src="../images/' . $name . '.gif" alt="" width="200px">';
  }

?>