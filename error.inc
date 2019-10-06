<?php
   function showError(  )
   {
      die("Error " . mysqli_error(  ) . " : " . mysql_error(  ));
   }
?>
