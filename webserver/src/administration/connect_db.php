<?php
// Create connection to Oracle
$db = oci_connect("system", "oracle", "//178.18.252.38:1521/xe");
if (!$db) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
else {
}
?>