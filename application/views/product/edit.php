<div class="data_table_view_wrap">
    <h1>Edit Product</h1>
    <div class="toolbar">
        <a href="<?php echo base_url() . 'product/' . $page_num; ?>">
            <button type="button" class="btn btn-default btn-back">Back</button>
        </a>
    </div>
    <div class="data_table_panel">
        <form method="post" action="<?php echo base_url() . 'product/update' ?>">
            <input type="hidden" value="<?php echo $rec_id; ?>" name="id"/>
            <input type="hidden" value="<?php echo $page_num; ?>" name="page_num"/>
            <table border="1" class="table table-bordered data_table">
                <tr>
                    <td style="vertical-align:middle">Product Name: </td>
                    <td><input type="text" name="product_name" class="form-control form_input" value="<?php echo $product_name; ?>" /></td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Description: </td>
                    <td><input type="text" name="description" class="form-control form_input" value="<?php echo $description; ?>" /></td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Category: </td>
                    <td>
                        <!--<input type="text" name="category" class="form-control form_input" />-->
                        <select name="category_id" class="form-control form_input">
                            <?php
                            foreach ($category_list as $category) {
                                if ($category->id == $category_id) {
                                    ?>
                                    <option selected="selected" value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Purchase Price: </td>
                    <td><input type="text" name="purchase_price" class="form-control form_input" value="<?php echo $purchasePrice; ?>" /></td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Selling Price: </td>
                    <td><input type="text" name="selling_price" class="form-control form_input" value="<?php echo $sellingPrice; ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Save" class="btn btn-default btn-back"></td>
                </tr>
            </table>
        </form>
    </div>
</div>

