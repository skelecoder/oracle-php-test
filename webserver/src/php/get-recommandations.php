<?php

require('connect.php');

$s = oci_parse($conn, 'select * from recommandations');
oci_execute($s);
oci_fetch_all($s, $res);
file_put_contents('php://stderr', print_r($res, TRUE));
echo "<tr>";


foreach($res as $value){
    echo "<td class='text-center'>
    ".$value['id']."
  </td>
  <td>Value 1</td>
  <td>
    <div class='rating rating-0 size-13 width-100'>
    </div>
  </td>
  <td>
    <div class='progress progress-xxs margin-bottom-0'>
      <div
        class='progress-bar progress-bar-default'
        role='progressbar'
        aria-valuenow='80'
        aria-valuemin='0'
        aria-valuemax='100'
        style='width: 80%; min-width: 2em'
      >
        <span class='sr-only'>80% Complete</span>
      </div>
    </div>
  </td>
  <td>
    <ul class='list-inline nomargin size-12'>
      <li>
        <a
          href='#'
          class='icon-facebook margin-top-6'
          data-toggle='tooltip'
          data-placement='top'
          title='Facebook'
        ></a>
      </li>
      <li>
        <a
          href='#'
          class='icon-twitter margin-top-6'
          data-toggle='tooltip'
          data-placement='top'
          title='Twitter'
        ></a>
      </li>
      <li>
        <a
          href='#'
          class='icon-gplus margin-top-6'
          data-toggle='tooltip'
          data-placement='top'
          title='Google Plus'
        ></a>
      </li>
      <li>
        <a
          href='#'
          class='icon-linkedin margin-top-6'
          data-toggle='tooltip'
          data-placement='top'
          title='Linkedin'
        ></a>
      </li>
      <li>
        <a
          href='#'
          class='icon-pinterest margin-top-6'
          data-toggle='tooltip'
          data-placement='top'
          title='Pinterest'
        ></a>
      </li>
    </ul>
  </td>
  <td>
    <span class='label label-success'>Approved </span>
  </td>");
}

echo "</tr>";
?>