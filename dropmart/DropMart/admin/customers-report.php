<?php include "../imports.php";?>
<p class="h3 text-center">DropMart - Customers</p>
<a class="float-right  mr-3" href="report.php"><<</a>
<table id="table_customer" class="table mt-3 display">
  <?php

  include "../dbconfig.php";
  $sql ="SELECT * FROM `customers`";

  $result = mysqli_query($con,$sql);

  if(mysqli_num_rows($result)> 0)
  {
    echo   " <thead><tr class='manage-customers-tr'><td class='manage-customers-td'>ID</td><td class='manage-customers-td'>Name</td>
    <td class='manage-customers-td'>E-mail</td><td class='manage-customers-td'>Address</td></tr> </thead><tbody> ";
    while($row = mysqli_fetch_assoc($result))
    {

      echo   " <tr class='manage-customers-tr'>  ";
      echo   " <td class='align-middle'><div class=''>".$row["id"]."</div></td>  ";
      echo   " <td class='align-middle'><div class=''>".$row["name"]."</div></td>  ";
      echo   " <td class='align-middle'><div class=''>".$row["email"]."</div></td>  ";
      echo   " <td class='align-middle'><div class=''>".$row["address"]."</div></td>  ";
      echo "</tr>";

    }
    echo "</tbody>";
  }
  ?>
</table>
