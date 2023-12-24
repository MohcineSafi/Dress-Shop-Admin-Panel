<div id="productItemsSection">
  <h2>Product Items</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Item ID</th>
        <th class="text-center">Product Image</th>
        <th class="text-center">Product Name</th>
        <th class="text-center">Product Description</th>
        <th class="text-center">Category Name</th>
        <th class="text-center">Unit Price</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $query = "SELECT * FROM product, category WHERE product.category_id=category.category_id";
      $result = $conn->query($query);
      $count = 1;
      if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><img height='100px' src='<?=$row["product_image"]?>'></td>
      <td><?=$row["product_name"]?></td>
      <td><?=$row["product_desc"]?></td>      
      <td><?=$row["category_name"]?></td> 
      <td><?=$row["price"]?></td>     
      <td><button class="btn btn-primary" style="height:40px" onclick="editProduct('<?=$row['product_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="deleteProduct('<?=$row['product_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count++;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#addProductModal">
    Add Product
  </button>

  <!-- Modal -->
  <div class="modal fade" id="addProductModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Product Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' onsubmit="addItem()" method="POST">
            <div class="form-group">
              <label for="productName">Product Name:</label>
              <input type="text" class="form-control" id="p_name" required>
            </div>
            <div class="form-group">
              <label for="productPrice">Price:</label>
              <input type="number" class="form-control" id="p_price" required>
            </div>
            <div class="form-group">
              <label for="productDesc">Description:</label>
              <input type="text" class="form-control" id="p_desc" required>
            </div>
            <div class="form-group">
              <label>Category:</label>
              <select id="categorySelect" >
                <option disabled selected>Select category</option>
                <?php

                  $categoryQuery = "SELECT * FROM category";
                  $categoryResult = $conn->query($categoryQuery);

                  if ($categoryResult->num_rows > 0){
                    while($categoryRow = $categoryResult->fetch_assoc()){
                      echo"<option value='".$categoryRow['category_id']."'>".$categoryRow['category_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" id="file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Item</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>

<script>
  // Custom functions for item management
  function editProduct(productID) {
    // Your code for editing a product goes here
    alert("Editing product with ID: " + productID);
  }

  function deleteProduct(productID) {
    // Your code for deleting a product goes here
    alert("Deleting product with ID: " + productID);
  }

  function addItem() {
    // Your code for adding a new item goes here
    alert("Adding a new item");
  }
</script>
