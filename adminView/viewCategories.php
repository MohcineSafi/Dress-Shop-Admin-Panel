<div id="categoryItemsSection">
  <h3>Category Items</h3>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Category ID</th>
        <th class="text-center">Category Name</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $categoryQuery = "SELECT * FROM category";
      $categoryResult = $conn->query($categoryQuery);
      $count = 1;
      if ($categoryResult->num_rows > 0){
        while ($categoryRow = $categoryResult->fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$categoryRow["category_name"]?></td>   
      <td><button class="btn btn-danger" style="height:40px" onclick="deleteCategory('<?=$categoryRow['category_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count++;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#addCategoryModal">
    Add Category
  </button>

  <!-- Modal -->
  <div class="modal fade" id="addCategoryModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Category Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="./controller/addCatController.php" method="POST">
            <div class="form-group">
              <label for="c_name">Category Name:</label>
              <input type="text" class="form-control" name="c_name" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Category</button>
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
  // Custom functions for category management
  function deleteCategory(categoryID) {
    // Your code for deleting a category goes here
    alert("Deleting category with ID: " + categoryID);
  }
</script>
