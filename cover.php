<?php
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
 ?> 

<html>
 <body>
  <form action="cover.php" method="post"
    enctype="multipart/form-data">
   <label for="file">Filename:</label>
     <input type="file" name="file" id="file"><br>
     <input type="submit" name="submit" value="Submit">
  </form>
 </body>
</html> 