<?php
$conn=mysqli_connect('mysql','root','password','chart');
$sql="select used from usage_disk";
$result=mysqli_query($conn, $sql);
echo "<table border='1px'>
	<tr>
		<th>used</th>
	</tr>";
while($row = mysqli_fetch_assoc($result)) 
{
$used=$row['used'];
echo "<tr>
	<td>$used</td>"; 

}
echo "</table>"
?>
