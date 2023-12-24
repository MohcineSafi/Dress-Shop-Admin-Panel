<div>
  <h2>Product Sizes Item</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Product Name</th>
        <th class="text-center">Size</th>
        <th class="text-center">Stock Quantity</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql = "SELECT * FROM product_size_variation v, product p, sizes s WHERE p.product_id=v.product_id AND v.size_id=s.size_id";
      $result = $conn->query($sql);
      $count = 1;

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
          <tr>
            <td><?=$count?></td>
            <td><?=$row["product_name"]?></td>
            <td><?=$row["size_name"]?></td>
            <td><?=$row["quantity_in_stock"]?></td>
            <td><button class="btn btn-primary" style="height:40px" onclick="variationEditForm('<?=$row['variation_id']?>')">Edit</button></td>
            <td><button class="btn btn-danger" style="height:40px" onclick="confirmVariationDeletion('<?=$row['variation_id']?>')">Delete</button></td>
          </tr>
    <?php
          $count++;
        }
      } else {
        echo "<tr><td colspan='6'>No data available</td></tr>";
      }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Size Variation
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <!-- ... (your existing modal content) ... -->
  </div>

  <script>
    function confirmVariationDeletion(variationID) {
      if (confirm("Are you sure you want to delete this variation?")) {
        // You can redirect to a deletion script or perform deletion via AJAX here
        alert("Deleting variation with ID: " + variationID);
      }
    }
  </script>
</div>
