

<?php
	include_once 'functions.php';
	$id = htmlentities($_GET['id']);

	$subAdmins = getSubAdminsById($id);
?>

<?php 
	$resultt = '';
	while (($row = oci_fetch_array($subAdmins, OCI_ASSOC)) != false) {
		$resultt .= '<li>
      <input type="radio" name="administration" value="'.$row["ID"].'"> '.$row["TITLE_FR"].' <a onclick="showSubAdmins('.$row["ID"].')"><i class="fa fa-plus"></i></a>
      <ul id="sub-admin-'.$row['ID'].'"></ul>
      </li>';
  } 
  if(oci_num_rows($subAdmins) == 0){
    $resultt = '<p class="small">vide</p>';
  }
echo $resultt;
?>
