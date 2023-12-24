<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Unit Price</th>
            </tr>
        </thead>
        <?php
            include_once "../config/dbconnect.php";

            // Sanitize user input
            $ID = mysqli_real_escape_string($conn, $_GET['orderID']);

            // Check if the input is a valid integer
            if (!ctype_digit($ID)) {
                die("Invalid input");
            }

            $sql = "SELECT * FROM product_size_variation v, order_details d 
                    WHERE v.variation_id = d.variation_id AND d.order_id = $ID";

            $result = $conn->query($sql);
            $count = 1;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $v_id = $row['variation_id'];

                    $subqry = "SELECT * FROM product p, product_size_variation v
                               WHERE p.product_id = v.product_id AND v.variation_id = $v_id";
                    $res = $conn->query($subqry);

                    if ($row2 = $res->fetch_assoc()) {
                        echo "<tr>
                                <td>$count</td>
                                <td><img height='80px' src='{$row2['product_image']}'></td>
                                <td>{$row2['product_name']}</td>";

                        $subqry2 = "SELECT * FROM sizes s, product_size_variation v
                                    WHERE s.size_id = v.size_id AND v.variation_id = $v_id";
                        $res2 = $conn->query($subqry2);

                        if ($row3 = $res2->fetch_assoc()) {
                            echo "<td>{$row3['size_name']}</td>";
                        }

                        echo "<td>{$row['quantity']}</td>
                                <td>{$row['price']}</td>
                              </tr>";

                        $count++;
                    }
                }
            } else {
                echo "No data available for this order.";
            }
        ?>
    </table>
</div>
