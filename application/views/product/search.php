<?php
$for_delete = explode("/", $_SERVER["REQUEST_URI"]);
?>
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
            <form method="get" action="<?php echo base_url() . 'product/search' ?>">
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
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $product->name; ?></td>
                    <td><?php echo $product->description; ?></td>
                    <td><?php echo $product->purchasePrice; ?></td>
                    <td><?php echo $product->sellingPrice; ?></td>
                    <td><a href="<?php echo base_url() . "product/edit/" . $product->id . "/" . $for_delete[3] ?>"><i class="fa fa-pencil-square-o" style="font-size: 18px;"></i></a></td>
                    <td><a href="javascript:void(0);" onclick="javascript:showConfirmBox('Are you sure you want to delete this?', '<?php echo base_url() . "category/delete/" . $product->id . "/" . $for_delete[3] ?>');"><i class="fa fa-times" style="font-size: 18px;"></i></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>