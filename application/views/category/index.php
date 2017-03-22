<div class="data_table_view_wrap">
    <h1>Category</h1>
    <div class="toolbar">
        <a href="<?php echo base_url() . 'dashboard/index' ?>">
            <button type="button" class="btn btn-default btn-back">Back</button>
        </a>
        <a href="<?php echo base_url() . 'category/create' ?>">
            <button type="button" class="btn btn-default btn-back" style="margin-left: 20px;">Create</button>
        </a>
        <div class="toolbar_search">
            <form method="post" action="<?php echo base_url() . 'category/search' ?>">
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
                <th>Category</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            $i = 1;
            foreach ($category_list as $category) {
                ?>
                <tr>
                    <td><?php echo $serial_num + $i++; ?></td>
                    <td><?php echo $category->name; ?></td>
                    <td><a href="<?php echo base_url() . "category/edit/" . $category->id ?>"><i class="fa fa-pencil-square-o" style="font-size: 18px;"></i></a></td>
                    <td><a href="javascript:void(0);" onclick="javascript:showConfirmBox('Are you sure you want to delete this?');"><i class="fa fa-times" style="font-size: 18px;"></i></a></td>
                    <!--<?php echo base_url() . "category/delete/" . $category->id ?>-->
                </tr>
            <?php } ?>
        </table>
        <?php $loop_count = ceil($total_record / $data_per_page); ?>
        <ul class="pagination">
            <li><a href="<?php echo base_url() . 'category/' . 1 ?>" title="First" ><<</a></li>
            <?php for ($i = 1; $i <= $loop_count; $i++) { ?>
                <li><a href="<?php echo base_url() . 'category/' . $i ?>"><?php echo $i; ?></a></li>
            <?php } ?>
            <li><a href="<?php echo base_url() . 'category/' . $loop_count ?>" title="Last" >>></a></li>
        </ul>
    </div>
</div>