<?php include "../imports.php";?>
<p class="h3 text-center">DropMart - Products</p>
<a class="float-right mr-3" href="report.php"><<</a>
<table id="table_products" class="table mt-3 display">
  <?php

  include "../dbconfig.php";
  $sql ="SELECT * FROM `products`";

  $result = mysqli_query($con,$sql);

  if(mysqli_num_rows($result)> 0)
  {
    echo   " <thead><tr class='manage-products-tr'><td class='manage-products-td'>Image</td><td class='manage-products-td'>Title</td><td class='manage-products-td'>Price</td>
    <td class='manage-products-td'>Category</td></tr> </thead><tbody> ";
    while($row = mysqli_fetch_assoc($result))
    {

      echo   " <tr class='manage-products-tr'><td class='align-middle'> <div class='image'> <img class='product-image' width='50' src='".$row["image"]."'  /> </div></td>  ";
      echo   " <td class='align-middle'><div class=''>".$row["title"]."</div></td>  ";
      echo   " <td class='align-middle'><div class=''>".$row["price"]."</div></td>  ";
      echo   " <td class='align-middle'><div class=''>".$row["category"]."</div></td>  ";
      echo "</tr>";

    }
    echo "</tbody>";
  }
  ?>
</table>
