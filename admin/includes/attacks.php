<!-- DataTales Example -->
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Attacks</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Sno</th>
            <th>Time</th>
            <th>Query</th>
            <th>Page</th>
            <th>Section</th>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Sno</th>
            <th>Time</th>
            <th>Query</th>
            <th>Page</th>
            <th>Section</th>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
$sno = 1;
$select_all_users_query = "SELECT * FROM prevent";
$select_all_users_result = mysqli_query($connection, $select_all_users_query);
while($row = mysqli_fetch_assoc($select_all_users_result)){
    $prevent_user_id = $row['prevent_user_id'];
    $prevent_time = $row['prevent_time'];
    $prevent_attack = $row['prevent_attack'];
    $prevent_page = $row['prevent_page'];
    $prevent_section = $row['prevent_section'];
    $prevent_user_name = $row['prevent_user_name'];
    $prevent_user_email = $row['prevent_user_email'];
        ?>
        <tr>
            <td><?php echo $sno; ?></td>
            <td><?php echo $prevent_time; ?></td>
            <td><?php echo $prevent_attack; ?></td>
            <td><?php echo $prevent_page; ?></td>
            <td><?php echo $prevent_section; ?></td>
            <td><?php echo $prevent_user_id; ?></td>
            <td><?php echo $prevent_user_name; ?></td>
            <td><?php echo $prevent_user_email; ?></td>
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