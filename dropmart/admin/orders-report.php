<?php include "../imports.php";?>
<p class="h3 text-center">DropMart - Orders</p>
<a class="float-right mr-3" href="report.php"><<</a>
<table id="table_orders" class="table mt-3 display text-center">
  <?php

  include "../dbconfig.php";
  $sql ="SELECT * FROM `orders`";

  $result = mysqli_query($con,$sql);

  if(mysqli_num_rows($result)> 0)
  {
    echo   " <thead>
    <tr class='manage-orders-tr'>
    <td class='manage-orders-td'>Order ID</td>
    <td class='manage-orders-td'>Customer ID</td>
    <td class='manage-orders-td'>Delivery Address</td>
    <td class='manage-orders-td'>Telephone Number</td>
    <td class='manage-orders-td'>Partner ID</td>
    <td class='manage-orders-td'>Delivered Status</td>
    </tr> </thead><tbody> ";
    while($row = mysqli_fetch_assoc($result))
    {

      echo   " <tr class='manage-orders-tr'>";
      echo   " <td class='align-middle'><div class=''>".$row["id"]."</div></td>  ";
      echo   " <td class='align-middle'><div class=''>".$row["customer"]."</div></td>  ";
      echo   " <td class='align-middle'><div class=''>".$row["deliveryAddress"]."</div></td>  ";
      echo   " <td class='align-middle'><div class=''>".$row["telephoneNo"]."</div></td>  ";
      echo   " <td class='align-middle'><div class=''>".$row["partner"]."</div></td>  ";
      echo   " <td class='align-middle'><div class=''>".$row["deliveryStatus"]."</div></td>  ";

      echo "</tr>";

    }
    echo "</tbody>";
  }
  ?>
</table>
