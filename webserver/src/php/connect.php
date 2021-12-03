<?php

// Create connection to Oracle
$conn = oci_connect("SYSTEM", "oracle", "//178.18.252.38:1521/xe");
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
else {
   print "Connected to Oracle!";
}

// Close the Oracle connection
// oci_close($conn);

?>
