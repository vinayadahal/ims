<?php $for_delete = explode("/", $_SERVER["REQUEST_URI"]); ?>
<div class="data_table_view_wrap">
    <h1>Product</h1>
    <div class="toolbar">
        <a href="<?php echo base_url() . 'dashboard/index' ?>">
            <button type="button" class="btn btn-default btn-back">Back</button>
        </a>
        <a href="<?php echo base_url() . 'product/create' ?>">
            <button type="button" class="btn btn-default btn-back" style="margin-left: 20px;">Create</button>
        </a>
        <div class="toolbar_search">
            <form method="post" action="<?php echo base_url() . 'product/search' ?>">
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
                <th>Product Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Purchase Price</th>
                <th>Selling Price</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            $i = 1;
            foreach ($product_list as $product) {
                ?>
                <tr>
                    <td><?php echo $serial_num + $i++; ?></td>
                    <td><?php echo $product->name; ?></td>
                    <?php
                    foreach ($category_list as $category) {
                        if ($product->category_id == $category->id) {
                            ?>
                            <td><?php echo $category->name; ?></td>
                            <?php
                        }
                    }
                    ?>
                    <td><?php echo $product->description; ?></td>
                    <td><?php echo $product->purchasePrice; ?></td>
                    <td><?php echo $product->sellingPrice; ?></td>
                    <td><a href="<?php echo base_url() . "product/edit/" . $product->id . "/" . $for_delete[3] ?>"><i class="fa fa-pencil-square-o" style="font-size: 18px;"></i></a></td>
                    <td><a href="javascript:void(0);" onclick="javascript:showConfirmBox('Are you sure you want to delete this?', '<?php echo base_url() . "product/delete/" . $product->id . "/" . $for_delete[3] ?>');"><i class="fa fa-times" style="font-size: 18px;"></i></a></td>
                </tr>
            <?php } ?>
        </table>
        <?php $loop_count = ceil($total_record / $data_per_page); ?>
        <ul class="pagination">
            <li><a href="<?php echo base_url() . 'product/' . 1 ?>" title="First" ><<</a></li>
            <?php for ($i = 1; $i <= $loop_count; $i++) { ?>
                <li><a href="<?php echo base_url() . 'product/' . $i ?>"><?php echo $i; ?></a></li>
            <?php } ?>
            <li><a href="<?php echo base_url() . 'product/' . $loop_count ?>" title="Last" >>></a></li>
        </ul>
    </div>
</div>