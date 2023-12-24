// Function to display products using AJAX
function showProductItems() {
    $.ajax({
        url: "./adminView/viewAllProducts.php",
        method: "post",
        data: { record: 1 },
        success: function(data){
            $('.allContent-section').html(data);
        }
    });
}

// Function to show product categories using AJAX
function showCategory() {
    $.ajax({
        url: "./adminView/viewCategories.php",
        method: "post",
        data: { record: 1 },
        success: function(data){
            $('.allContent-section').html(data);
        }
    });
}

// Function to show all sizes using AJAX
function showSizes() {
    $.ajax({
        url: "./adminView/viewSizes.php",
        method: "post",
        data: { record: 1 },
        success: function(data){
            $('.allContent-section').html(data);
        }
    });
}

// Function to show product sizes using AJAX
function showProductSizes() {
    $.ajax({
        url: "./adminView/viewProductSizes.php",
        method: "post",
        data: { record: 1 },
        success: function(data){
            $('.allContent-section').html(data);
        }
    });
}

// Function to show customers using AJAX
function showCustomers() {
    $.ajax({
        url: "./adminView/viewCustomers.php",
        method: "post",
        data: { record: 1 },
        success: function(data){
            $('.allContent-section').html(data);
        }
    });
}

// Function to show orders using AJAX
function showOrders() {
    $.ajax({
        url: "./adminView/viewAllOrders.php",
        method: "post",
        data: { record: 1 },
        success: function(data){
            $('.allContent-section').html(data);
        }
    });
}

// Function to change order status using AJAX
function changeOrderStatus(id) {
    $.ajax({
        url: "./controller/updateOrderStatus.php",
        method: "post",
        data: { record: id },
        success: function(data){
            alert('Order Status updated successfully');
            $('form').trigger('reset');
            showOrders();
        }
    });
}

// Function to change payment status using AJAX
function changePay(id) {
    $.ajax({
        url: "./controller/updatePayStatus.php",
        method: "post",
        data: { record: id },
        success: function(data){
            alert('Payment Status updated successfully');
            $('form').trigger('reset');
            showOrders();
        }
    });
}

// Function to add product items using AJAX
function addItems() {
    var p_name=$('#p_name').val();
    var p_desc=$('#p_desc').val();
    var p_price=$('#p_price').val();
    var category=$('#category').val();
    var upload=$('#upload').val();
    var file=$('#file')[0].files[0];

    var fd = new FormData();
    fd.append('p_name', p_name);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('category', category);
    fd.append('file', file);
    fd.append('upload', upload);

    $.ajax({
        url: "./controller/addItemController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Product Added successfully.');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}

// ... (similar structure for other functions)

// Function to delete product data using AJAX
function itemDelete(id) {
    $.ajax({
        url: "./controller/deleteItemController.php",
        method: "post",
        data: { record: id },
        success: function(data){
            alert('Items Successfully deleted');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}

// Function to delete cart data using AJAX
function cartDelete(id) {
    $.ajax({
        url: "./controller/deleteCartController.php",
        method: "post",
        data: { record: id },
        success: function(data){
            alert('Cart Item Successfully deleted');
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

// ... (similar structure for other functions)

// Function to delete size data using AJAX
function sizeDelete(id) {
    $.ajax({
        url: "./controller/deleteSizeController.php",
        method: "post",
        data: { record: id },
        success: function(data){
            alert('Size Successfully deleted');
            $('form').trigger('reset');
            showSizes();
        }
    });
}

// ... (similar structure for other functions)

// Function to delete variation data using AJAX
function variationDelete(id) {
    $.ajax({
        url: "./controller/deleteVariationController.php",
        method: "post",
        data: { record: id },
        success: function(data){
            alert('Successfully deleted');
            $('form').trigger('reset');
            showProductSizes();
        }
    });
}

// ... (similar structure for other functions)

// Function to update variation data after submit using AJAX
function updateVariations() {
    var v_id = $('#v_id').val();
    var product = $('#product').val();
    var size = $('#size').val();
    var qty = $('#qty').val();
    var fd = new FormData();
    fd.append('v_id', v_id);
    fd.append('product', product);
    fd.append('size', size);
    fd.append('qty', qty);

    $.ajax({
        url: './controller/updateVariationController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            alert('Update Success.');
            $('form').trigger('reset');
            showProductSizes();
        }
    });
}

// ... (similar structure for other functions)

// Function to perform search using AJAX
function search(id) {
    $.ajax({
        url: "./controller/searchController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.eachCategoryProducts').html(data);
        }
    });
}

// ... (similar structure for other functions)

// Function to increment quantity using AJAX
function quantityPlus(id) { 
    $.ajax({
        url: "./controller/addQuantityController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

// Function to decrement quantity using AJAX
function quantityMinus(id) {
    $.ajax({
        url: "./controller/subQuantityController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

// Function to display checkout view using AJAX
function checkout() {
    $.ajax({
        url: "./view/viewCheckout.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

// Function to remove item from wishlist using AJAX
function removeFromWish(id) {
    $.ajax({
        url: "./controller/removeFromWishlist.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('Removed from wishlist');
        }
    });
}

// Function to add item to wishlist using AJAX
function addToWish(id) {
    $.ajax({
        url: "./controller/addToWishlist.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('Added to wishlist');        
        }
    });
}
