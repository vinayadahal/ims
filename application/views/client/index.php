<?php
$for_delete = explode("/", $_SERVER["REQUEST_URI"]);
?>
<div class="data_table_view_wrap">
    <h1>Client</h1>
    <div class="toolbar">
        <a href="<?php echo base_url() . 'dashboard/index' ?>">
            <button type="button" class="btn btn-default btn-back">Back</button>
        </a>
        <a href="<?php echo base_url() . 'client/create' ?>">
            <button type="button" class="btn btn-default btn-back" style="margin-left: 20px;">Create</button>
        </a>
        <div class="toolbar_search">
            <form method="post" action="<?php echo base_url() . 'client/search' ?>">
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
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Mobile</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            $i = 1;
            foreach ($client_list as $client) {
                ?>
                <tr>
                    <td><?php echo $serial_num + $i++; ?></td>
                    <td><?php echo $client->name; ?></td>
                    <td><?php echo $client->address; ?></td>
                    <td><?php echo $client->email; ?></td>
                    <td><?php echo $client->phone; ?></td>
                    <td><?php echo $client->mobile; ?></td>
                    <td><a href="<?php echo base_url() . "client/edit/" . $client->id . "/" . $for_delete[3] ?>"><i class="fa fa-pencil-square-o" style="font-size: 18px;"></i></a></td>
                    <td><a href="javascript:void(0);" onclick="javascript:showConfirmBox('Are you sure you want to delete this?', '<?php echo base_url() . "client/delete/" . $client->id . "/" . $for_delete[3] ?>');"><i class="fa fa-times" style="font-size: 18px;"></i></a></td>
                </tr>
            <?php } ?>
        </table>
        <?php $loop_count = ceil($total_record / $data_per_page); ?>
        <ul class="pagination">
            <li><a href="<?php echo base_url() . 'client/' . 1 ?>" title="First" ><<</a></li>
            <?php for ($i = 1; $i <= $loop_count; $i++) { ?>
                <li><a href="<?php echo base_url() . 'client/' . $i ?>"><?php echo $i; ?></a></li>
            <?php } ?>
            <li><a href="<?php echo base_url() . 'client/' . $loop_count ?>" title="Last" >>></a></li>
        </ul>
    </div>
</div>