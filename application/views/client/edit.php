<div class="data_table_view_wrap">
    <h1>Create Client</h1>
    <div class="toolbar">
        <a href="<?php echo base_url() . 'client/1'; ?>">
            <button type="button" class="btn btn-default btn-back">Back</button>
        </a>
    </div>
    <div class="data_table_panel">
        <form method="post" action="<?php echo base_url() . 'client/update' ?>">
            <input type="hidden" value="<?php echo $rec_id; ?>" name="id"/>
            <input type="hidden" value="<?php echo $page_num; ?>" name="page_num"/>
            <table border="1" class="table table-bordered data_table">
                <tr>
                    <td style="vertical-align:middle">Name: </td>
                    <td><input type="text" name="client_name" value="<?php echo $client_name; ?>" class="form-control form_input" /></td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Email: </td>
                    <td><input type="text" name="email" value="<?php echo $email; ?>" class="form-control form_input" /></td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Address: </td>
                    <td><input type="text" name="address" value="<?php echo $address; ?>" class="form-control form_input" /></td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Phone: </td>
                    <td><input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control form_input" /></td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Mobile: </td>
                    <td><input type="text" name="mobile" value="<?php echo $mobile; ?>" class="form-control form_input" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Save" class="btn btn-default btn-back"></td>
                </tr>
            </table>
        </form>
    </div>
</div>

