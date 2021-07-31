<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="delimg.css" rel="stylesheet" />
    <script src="jquery.min.js"></script>
</head>
<body>

<div class="content">
        <div class="container-fluid">
          
              
        <div class="container">
               
      <?php
        require("conn.php");
        $sql="SELECT * FROM gallery";
        $res=mysqli_query($conn,$sql);
        ?>
            <div class="img-wrap">
            <?php

        while($row=mysqli_fetch_array($res))
      {
      ?>
          <button  class="close">&times;</button>
          <a class="thumnail"> <img  src="<?php echo $row['photo'] ?>"  height="150px" width="150px"  alt=""/ >
          </a>
            <?php
            }
       ?>
          


</div>
          </div>      
     </div>
   </div>

</body>
</html>


      <!-- End Navbar -->
      
<script>
$(document).ready(function () {
    alert("hello");
})
</script>
