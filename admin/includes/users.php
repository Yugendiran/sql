<!-- DataTales Example -->
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Sno</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Sno</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
$sno = 1;
$select_all_users_query = "SELECT * FROM users";
$select_all_users_result = mysqli_query($connection, $select_all_users_query);
while($row = mysqli_fetch_assoc($select_all_users_result)){
    $users_name = $row['users_name'];
    $users_email = $row['users_email'];
    $users_status = $row['users_status'];
        ?>
        <tr>
            <td><?php echo $sno; ?></td>
            <td><?php echo $users_name; ?></td>
            <td><?php echo $users_email; ?></td>
            <td><?php echo $users_status; ?></td>
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