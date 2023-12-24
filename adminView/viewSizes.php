<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Page Title</title>
  <!-- Add your CSS and Bootstrap CDN links here -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<!-- Add your navigation or header content here -->

<div class="container">
  <h2>Product Items</h2>
  <table class="table">
  <thead>
        <tr>
            <th class="text-center">S.N.</th>
            <th class="text-center">Product Image</th>
            <th class="text-center">Product Name</th>
            <th class="text-center">Product Description</th>
            <th class="text-center">Category Name</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center" colspan="2">Action</th>
        </tr>
    </thead>
    </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#addProductModal">
    Add Product
  </button>

  <!-- Add Product Modal -->
  <div class="modal fade" id="addProductModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Product Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- ... (your form for adding products) ... -->
          <!-- Example Form: -->
          <form enctype='multipart/form-data' action="./controller/addProductController.php" method="POST">
            <div class="form-group">
              <label for="p_name">Product Name:</label>
              <input type="text" class="form-control" name="p_name" required>
            </div>
            <!-- Add more fields as needed -->
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Product</button>
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

<!-- Repeat the similar structure for other sections (size variations, sizes, etc.) -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script>
  function editProduct(productID) {
    // Implement edit product logic
    window.location.href = 'editProduct.php?id=' + productID;
  }

  function deleteProduct(productID) {
    // Implement delete product logic
    alert('Delete product with ID: ' + productID);
  }

  function addItem() {
    // Implement add item logic
    alert('Add item logic');
  }

  function variationEditForm(variationID) {
    // Implement variation edit logic
    window.location.href = 'editVariation.php?id=' + variationID;
  }

  function variationDelete(variationID) {
    // Implement variation delete logic
    alert('Delete variation with ID: ' + variationID);
  }

  function sizeDelete(sizeID) {
    // Implement size delete logic
    alert('Delete size with ID: ' + sizeID);
  }
</script>

</body>
</html>
