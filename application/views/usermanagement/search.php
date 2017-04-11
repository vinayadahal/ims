<?php
$for_delete = explode("/", $_SERVER["REQUEST_URI"]);
?>
<div class="data_table_view_wrap">
    <h1>Usermanagement</h1>
    <div class="toolbar">
        <a href="<?php echo base_url() . 'dashboard/index' ?>">
            <button type="button" class="btn btn-default btn-back">Back</button>
        </a>
        <a href="<?php echo base_url() . 'usermanagement/create' ?>">
            <button type="button" class="btn btn-default btn-back" style="margin-left: 20px;">Create</button>
        </a>
        <div class="toolbar_search">
            <form method="get" action="<?php echo base_url() . 'usermanagement/search' ?>">
                <input type="text" class="form-control toolbar_input" name="keyword" placeholder="Search..."/>
                <button type="submit" class="btn btn-default toolbar_search_btn">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="data_table_panel">
        <table border="1" class="table table-bordered data_table">
            <tr>
                <th>S.No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Username</th>
                <th>Role</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            $i = 1;
            foreach ($user_list as $user) {
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $user->first_name; ?></td>
                    <td><?php echo $user->last_name; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->gender; ?></td>
                    <td><?php echo $user->username; ?></td>
                    <?php
                    foreach ($role_list as $role) {
                        if ($user->role_id == $role->id) {
                            ?>
                            <td><?php echo $role->role; ?></td>
                            <?php
                        }
                    }
                    ?>
                    <td><a href="<?php echo base_url() . "usermanagement/edit/" . $user->id . "/" . $for_delete[3] ?>"><i class="fa fa-pencil-square-o" style="font-size: 18px;"></i></a></td>
                    <td><a href="javascript:void(0);" onclick="javascript:showConfirmBox('Are you sure you want to delete this?', '<?php echo base_url() . "usermanagement/delete/" . $user->id . "/" . $for_delete[3] ?>');"><i class="fa fa-times" style="font-size: 18px;"></i></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>