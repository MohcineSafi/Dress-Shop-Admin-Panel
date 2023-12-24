<div class="custom-container p-5">

<h4>Edit Size Variation Details</h4>
<?php
    include_once "../config/dbconnect.php";
	$variationID=$_POST['record'];
	$query=mysqli_query($conn, "SELECT * from product_size_variation Where variation_id='$variationID'");
	$numberOfRows=mysqli_num_rows($query);
	if($numberOfRows>0){
		while($variationRow=mysqli_fetch_array($query)){
      $selectedProductID=$variationRow["product_id"];
      $selectedSizeID=$variationRow["size_id"]
?>
<form id="updateVariationForm" onsubmit="submitVariationUpdate()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" class="form-control" id="variationID" value="<?=$variationRow['variation_id']?>" hidden>
    </div>
    <div class="form-group">
        <label>Product:</label>
        <select id="productSelect" >
        <?php

        $sql="SELECT * from product where product_id=$selectedProductID";
        $result = $conn-> query($sql);

        if ($result-> num_rows > 0){
        while($row = $result-> fetch_assoc()){
            echo"<option selected value='".$row['product_id']."'>".$row['product_name'] ."</option>";
        }
        }
        ?>
        <?php

            $sql="SELECT * from product where product_id!=$selectedProductID";
            $result = $conn-> query($sql);

            if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
                echo"<option value='".$row['product_id']."'>".$row['product_name'] ."</option>";
            }
            }
        ?>
        </select>
    </div>
    <div class="form-group">
        <label>Size:</label>
        <select id="sizeSelect" >
        <?php

            $sql="SELECT * from sizes where size_id=$selectedSizeID";
            $result = $conn-> query($sql);

            if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
                echo"<option selected value='".$row['size_id']."'>".$row['size_name'] ."</option>";
            }
            }
        ?>
        <?php

            $sql="SELECT * from sizes where size_id!=$selectedSizeID";
            $result = $conn-> query($sql);

            if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
                echo"<option value='".$row['size_id']."'>".$row['size_name'] ."</option>";
            }
            }
        ?>
        </select>
    </div>
    <div class="form-group">
        <label for="stockQty">Stock Quantity:</label>
        <input type="number" class="form-control" id="stockQty" value="<?=$variationRow['quantity_in_stock']?>"  required>
    </div>
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary">Update Size Variation</button>
    </div>
    <?php
    		}
    	}
    ?>
  </form>

</div>
