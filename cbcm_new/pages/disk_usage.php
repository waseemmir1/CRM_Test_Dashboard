<?php
$conn=mysqli_connect('mysql','root','password','chart');
$sql="select filesystem, size, used, available, used_prec, mlount_point,problem from usage_disk";
$result=mysqli_query($conn, $sql);				
?>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/disk_usage.css">
<img src="../images/logo2.png" class="center">
<link rel="icon" type="image/png" href="../images/favicon.png"/>	
 <script src="../script/flash.js"></script>
<style>
       .blinkOn {
           background-color:red;
       }
   </style>
<title>Monitor Apps</title>
<body>
<div class = 'topbar'> 
<a href="http://localhost:5000/pages/disk_usage.php">Monitor Apps</a>
<a href="http://localhost:5000">Home</a>
<table id="tbl" width="800" border="1" cellpadding="1" cellspacing="1" class="table">
<tr>
<th>FileSystem</th>
<th>Size</th>
<th>Used</th>
<th>Available</th>
<th>Used Percentage</th>
<th>Mount Point</th>
<th>Problem</th>
</tr>

<?php
		    while($row = mysqli_fetch_assoc($result)) 
{
	echo "<tr>";
	echo "<td>".$row['filesystem']."</td>";
	echo "<td>".$row['size']."</td>";
	echo "<td>".$row['used']."</td>";
	echo "<td>".$row['available']."</td>";
	echo "<td>".$row['used_prec']."</td>";
	echo "<td>".$row['mlount_point']."</td>";
	echo "<td>".$row['problem']."</td>";
	echo "</tr>";
		}//end while
	
?>

</table>
</div>	
<div class="footer">
  <p>© 2018 Etisalat. All Rights Reserved | Created By Abdul Baseer</p>
</div>
</div>
<script>
        var rows = document.querySelectorAll('#tbl tr');
        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var cells = row.getElementsByTagName('td');
              for (var j = 0; j < cells.length; j++) {
                var cell = cells[j];
				if(j==6)
				{
                var value = parseFloat(cell.innerText.trim())
                if (value == 1) { 
                    row.className = 'blink'
                     console.log(value);
                }
				
				}
				
            }
            setInterval(function () {
                if ($('.blink').length > 0) {
                   
                    if ($('.blink').hasClass('blinkOn'))
                        setTimeout(function() {  $('.blink').removeClass('blinkOn') , 100})
                    else
                        setTimeout(function () { $('.blink').addClass('blinkOn'), 100 })
                        
                }
                 
            }, 1000);
        }

        

    </script>	
</body>
</html>
