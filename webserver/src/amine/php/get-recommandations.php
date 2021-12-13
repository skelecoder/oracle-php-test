<?php

require('connect.php');

$s = oci_parse($conn, 'select * from recommandations');
oci_execute($s);
oci_fetch_all($s, $res);
file_put_contents('php://stderr', print_r($res, TRUE));
echo "<tr>";

$i = 0;
$myarray = $res['ID'];
foreach($myarray as $value){
    echo "<tr><td class='text-center'>
    ".$res['ID'][$i]."
  </td>
  <td>".$res['TITRE'][$i]."</td>
  <td>
  ".$res['START_DATE'][$i]."
  </td>
  <td>
  ".$res['END_DATE'][$i]."
  </td>
  <td>
  ".$res['ESCOMPTE'][$i]."
  </td>
  <td>
  ".$res['OBTENU'][$i]."
  </td>
  <td>
  ".$res['OBSERVATIONS'][$i]."
  </td>
  <td>
  ".$res['RESSOURCES'][$i]."
  </td>
  <td>
  ".$res['RESPONSABLE'][$i]."
  </td>
  <td>
    <a href='#' class='btn btn-default btn-xs'><i class='fa fa-edit white'></i> Edit </a>
    <a href='#' class='btn btn-default btn-xs'><i class='fa fa-times white'></i> Delete </a>
  </td>
  </tr>";
  $i++;
}

?>