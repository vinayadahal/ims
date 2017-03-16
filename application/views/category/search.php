<div class="data_table_view_wrap">
    <h1>Category</h1>
    <div class="toolbar">
        <a href="<?php echo base_url() . 'dashboard/index' ?>">
            <button type="button" class="btn btn-default btn-back">Back</button>
        </a>
        <a href="<?php echo base_url() . 'dashboard/index' ?>">
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
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $category->name; ?></td>
                    <td><a href="#"><i class="fa fa-pencil-square-o" style="font-size: 18px;"></i></a></td>
                    <td><a href="#"><i class="fa fa-times" style="font-size: 18px;"></i></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

