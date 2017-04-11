<div class="data_table_view_wrap">
    <h1>Create Category</h1>
    <div class="toolbar">
        <a href="<?php echo base_url() . 'usermanagement/1' ?>">
            <button type="button" class="btn btn-default btn-back">Back</button>
        </a>
    </div>
    <div class="data_table_panel">
        <form method="post" action="<?php echo base_url() . 'usermanagement/update_password' ?>" onsubmit="return validatePassword();">
            <input type="hidden" value="<?php echo $rec_id; ?>" name="id"/>
            <input type="hidden" value="<?php echo $page_num; ?>" name="page_num"/>
            <table border="1" class="table table-bordered data_table">
                <tr>
                    <td style="vertical-align:middle">Password: </td>
                    <td><input type="password" name="password" class="form-control form_input" id="password"/></td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Confirm Password: </td>
                    <td><input type="password" name="con_password" class="form-control form_input" id="confirm_password"/></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Save" class="btn btn-default btn-back"></td>
                </tr>
            </table>
        </form>
    </div>
</div>

