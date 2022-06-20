<!-- DataTales Example -->
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Sno</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Sno</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
$sno = 1;
$select_all_users_query = "SELECT * FROM products";
$select_all_users_result = mysqli_query($connection, $select_all_users_query);
while($row = mysqli_fetch_assoc($select_all_users_result)){
    $product_name = $row['product_name'];
    $product_price = $row['product_price'];
        ?>
        <tr>
            <td><?php echo $sno; ?></td>
            <td><?php echo $product_name; ?></td>
            <td><?php echo $product_price; ?></td>
        </tr>
        <?php
        $sno++;
}
        ?>
    </tbody>
</table>

</div>
                        </div>
                    </div>