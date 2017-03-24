<div class="data_table_view_wrap">
    <h1>Edit Category</h1>
    <div class="toolbar">
        <a href="<?php echo base_url() . 'category/1' ?>">
            <button type="button" class="btn btn-default btn-back">Back</button>
        </a>
    </div>
    <div class="data_table_panel">
        <form method="post" action="<?php echo base_url() . 'category/update' ?>">
            <input type="hidden" value="<?php echo $rec_id ?>" name="id"/>
            <table border="1" class="table table-bordered data_table">
                <tr>
                    <td style="vertical-align:middle">Category Name: </td>
                    <td><input type="text" name="category" class="form-control form_input" value="<?php echo $category_name; ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Save" class="btn btn-default btn-back"></td>
                </tr>
            </table>
        </form>
    </div>
</div>

