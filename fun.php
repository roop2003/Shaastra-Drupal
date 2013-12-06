<?php
$con=mysqli_connect("localhost","root","hello","test");


if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$sql="INSERT INTO student VALUES('$_POST[name]','$_POST[inst]','$_POST[yr]','$_POST[dept]','$_POST[intrst]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "Record added"; 

$sql1=mysqli_query($con,"select *,count(*) as tns from student group by dept,year");
echo "<table border='1'>
<tr>
<th>name</th>
<th>Institute</th>
<th>year</th>
<th>dept</th>
<th>Total number of students</th>
</tr>";

while($row = mysqli_fetch_array($sql1))
  {
	
  echo "<tr>";
  echo  "<td>".  $row['name'] . "</td>";
   echo "<td>".  $row['Institute'].  "</td>";
 echo   "<td>".  $row['year'].  "</td>";
  echo  "<td>".  $row['dept'] . "</td>";
  echo  "<td>".  $row['tns'] . "</td>";
 
echo "</tr>";

  }

echo "</table>";

mysqli_close($con);
?> 
