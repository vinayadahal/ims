<form method="post" action="<?php echo base_url() ?>checkLogin">
    <div class="login_box">
        <div class="login_box_header"><?php echo $title; ?> - Inventory Management</div>
        <div class="login_box_form">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" class="form-control login_text_box" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="text" name="password" class="form-control login_text_box"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" align="right"><input type="submit" value="Login" class="btn btn-default login_box_btn"></td>
                </tr>
            </table>
        </div>
    </div>
</form>