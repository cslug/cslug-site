<table>
  <tr>
    <td width="200px">
      <p>&nbsp</p>
    </td>
    <td align="center" width="300px">
      <p><strong>Click a date to see its minutes</strong></p>
      <div class="subRight">
<?php
// print links for every minutes file in the minutes directory
  date_default_timezone_set("America/Los_Angeles");
  foreach(glob('minutes/*.html') as $filename) {
    if(substr($filename, 0, 2) != $lastmonth)
      print('<br/>');
    $filename = str_replace('minutes/', '', $filename); // remove minutes/ directory
    $filename = str_replace('.html', '', $filename); // remove .html extension
    $longdate = date('F j, Y', mktime(0, 0, 0, substr($filename, 4, 2), substr($filename, 6, 2), substr($filename, 0, 4))); // gives us "September 1, 2010" out of 20100901
    print('<h3><a href="?minutes=' . $filename . '">' . $longdate . '</a></h3>' . "\n");
    $lastmonth = substr($filename, 0, 2); // keep track of this month so when the month changes, we can <br/>.
  }
?>
      </div>
    </td>
  </tr>
</table>
