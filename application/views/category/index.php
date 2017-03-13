<div class="data_table_view_wrap">
    <h1>Category</h1>
    <div class="toolbar">
        <a href="<?php echo base_url() . 'dashboard/index' ?>">
            <button type="button" class="btn btn-default">Back</button>
        </a>
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
        <ul class="pagination">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
        </ul>
    </div>
</div>

