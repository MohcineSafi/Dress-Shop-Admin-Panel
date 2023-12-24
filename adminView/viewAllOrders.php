<div id="customOrdersSection">
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Customer Name</th>
        <th>Contact Number</th>
        <th>Order Date</th>
        <th>Payment Method</th>
        <th>Order Status</th>
        <th>Payment Status</th>
        <th>More Details</th>
      </tr>
    </thead>
     <?php
      include_once "../config/dbconnect.php";
      $ordersQuery = "SELECT * from orders";
      $ordersResult = $conn->query($ordersQuery);
      
      if ($ordersResult->num_rows > 0){
        while ($orderRow = $ordersResult->fetch_assoc()) {
    ?>
       <tr>
          <td><?=$orderRow["order_id"]?></td>
          <td><?=$orderRow["delivered_to"]?></td>
          <td><?=$orderRow["phone_no"]?></td>
          <td><?=$orderRow["order_date"]?></td>
          <td><?=$orderRow["pay_method"]?></td>
           <?php 
                if($orderRow["order_status"]==0){
            ?>
                <td><button class="btn btn-danger" onclick="updateOrderStatus('<?=$orderRow['order_id']?>')">Pending </button></td>
            <?php
                } else {
            ?>
                <td><button class="btn btn-success" onclick="updateOrderStatus('<?=$orderRow['order_id']?>')">Delivered</button></td>
            <?php
                }
                if($orderRow["pay_status"]==0){
            ?>
                <td><button class="btn btn-danger"  onclick="updatePaymentStatus('<?=$orderRow['order_id']?>')">Unpaid</button></td>
            <?php
                } else if($orderRow["pay_status"]==1){
            ?>
                <td><button class="btn btn-success" onclick="updatePaymentStatus('<?=$orderRow['order_id']?>')">Paid </button></td>
            <?php
                }
            ?>
              
        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?orderID=<?=$orderRow['order_id']?>" href="javascript:void(0);">View</a></td>
        </tr>
    <?php
        }
      }
    ?>
  </table>
</div>
<!-- Modal -->
<div class="modal fade" id="customViewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="custom-order-view-modal modal-body">
        </div>
      </div>
    </div>
</div>
<script>
    //for custom view order modal
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.custom-order-view-modal').load(dataURL,function(){
          $('#customViewModal').modal({show:true});
        });
      });
    });

    // Custom functions for updating order and payment status
    function updateOrderStatus(orderID) {
      // Your code for updating order status goes here
    }

    function updatePaymentStatus(orderID) {
      // Your code for updating payment status goes here
    }
</script>
