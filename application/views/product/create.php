<div class="data_table_view_wrap">
    <h1>Create Product</h1>
    <div class="toolbar">
        <a href="<?php echo base_url() . 'product/1'; ?>">
            <button type="button" class="btn btn-default btn-back">Back</button>
        </a>
    </div>
    <div class="data_table_panel">
        <form method="post" action="<?php echo base_url() . 'product/add' ?>">
            <table border="1" class="table table-bordered data_table">
                <tr>
                    <td style="vertical-align:middle">Product Name: </td>
                    <td><input type="text" name="product_name" class="form-control form_input" /></td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Description: </td>
                    <td><input type="text" name="description" class="form-control form_input" /></td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Category: </td>
                    <td>
                        <!--<input type="text" name="category" class="form-control form_input" />-->
                        <select name="category_id" class="form-control form_input">
                            <?php foreach ($category_list as $category) { ?>
                                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Purchase Price: </td>
                    <td><input type="text" name="purchase_price" class="form-control form_input" /></td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Selling Price: </td>
                    <td><input type="text" name="selling_price" class="form-control form_input" /></td>
                </tr>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Save" class="btn btn-default btn-back"></td>
                </tr>
            </table>
        </form>
    </div>
</div>

