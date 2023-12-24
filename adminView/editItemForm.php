<div class="custom-container p-5">

<h4>Edit Product Details</h4>
<?php
    include_once "../config/dbconnect.php";
	$itemID=$_POST['record'];
	$query=mysqli_query($conn, "SELECT * FROM product WHERE product_id='$itemID'");
	$rowsCount=mysqli_num_rows($query);
	if($rowsCount>0){
		while($item=mysqli_fetch_array($query)){
      $selectedCategoryID=$item["category_id"];
?>
<form id="updateProductForm" onsubmit="submitUpdate()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" class="form-control" id="productID" value="<?=$item['product_id']?>" hidden>
    </div>
    <div class="form-group">
      <label for="productName">Product Name:</label>
      <input type="text" class="form-control" id="productName" value="<?=$item['product_name']?>">
    </div>
    <div class="form-group">
      <label for="productDesc">Product Description:</label>
      <input type="text" class="form-control" id="productDesc" value="<?=$item['product_desc']?>">
    </div>
    <div class="form-group">
      <label for="unitPrice">Unit Price:</label>
      <input type="number" class="form-control" id="unitPrice" value="<?=$item['price']?>">
    </div>
    <div class="form-group">
      <label>Category:</label>
      <select id="productCategory">
        <?php
          $sql="SELECT * from category WHERE category_id='$selectedCategoryID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['category_id'] ."'>" .$row['category_name'] ."</option>";
            }
          }
        ?>
        <?php
          $sql="SELECT * from category WHERE category_id!='$selectedCategoryID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['category_id'] ."'>" .$row['category_name'] ."</option>";
            }
          }
        ?>
      </select>
    </div>
      <div class="form-group">
         <img width='200px' height='150px' src='<?=$item["product_image"]?>'>
         <div>
            <label for="productImage">Choose Image:</label>
            <input type="text" id="existingImage" class="form-control" value="<?=$item['product_image']?>" hidden>
            <input type="file" id="newImage" value="">
         </div>
    </div>
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary">Update Product</button>
    </div>
    <?php
    		}
    	}
    ?>
  </form>

</div>
