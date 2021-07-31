<html>

<body>
<?php
require "config.php";
$sql="select * from volunteer_register";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res))
?>
<img src="<?php echo $row['pic'] ?>" height="200" width="200">;
</body>
</html>
