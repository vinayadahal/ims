<div class="data_table_view_wrap">
    <h1>Edit User</h1>
    <div class="toolbar">
        <a href="<?php echo base_url() . 'usermanagement/1'; ?>">
            <button type="button" class="btn btn-default btn-back">Back</button>
        </a>
        <a href="<?php echo base_url() . 'usermanagement/changePassword/' . $rec_id . '/' . $page_num; ?>">
            <button type="button" class="btn btn-default btn-back" style="float: right;width: auto;">Change Password</button>
        </a>
    </div>
    <div class="data_table_panel">
        <form method="post" action="<?php echo base_url() . 'usermanagement/update' ?>" onsubmit="return validatePassword();">
            <input type="hidden" value="<?php echo $rec_id; ?>" name="id"/>
            <input type="hidden" value="<?php echo $page_num; ?>" name="page_num"/>
            <table border="1" class="table table-bordered data_table">
                <tr>
                    <td style="vertical-align:middle">First Name: </td>
                    <td><input type="text" name="first_name" class="form-control form_input" value="<?php echo $first_name; ?>" /></td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Last Name: </td>
                    <td><input type="text" name="last_name" class="form-control form_input" value="<?php echo $last_name; ?>"/></td>
                </tr>

                <tr>
                    <td style="vertical-align:middle">Email: </td>
                    <td><input type="text" name="email" class="form-control form_input" value="<?php echo $email; ?>"/></td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Gender: </td>
                    <td>
                        <select name="gender" class="form-control form_input">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Username: </td>
                    <td><input type="text" name="username" class="form-control form_input" value="<?php echo $username; ?>"/></td>
                </tr>
<!--                <tr>
                    <td style="vertical-align:middle">Password: </td>
                    <td><input type="password" name="password" class="form-control form_input" id="password" /></td>
                </tr>
                <tr>
                    <td style="vertical-align:middle">Confirm Password: </td>
                    <td><input type="password" name="con_password" class="form-control form_input" id="confirm_password" /></td>
                </tr>-->
                <tr>
                    <td style="vertical-align:middle">Role: </td>
                    <td>
                        <select name="role_id" class="form-control form_input">
                            <?php foreach ($role_list as $role) { ?>
                                <?php if ($role->id == $role_id) { ?>
                                    <option selected="selected" value="<?php echo $role->id; ?>"><?php echo $role->role; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $role->id; ?>"><?php echo $role->role; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Save" class="btn btn-default btn-back"></td>
                </tr>
            </table>
        </form>
    </div>
</div>

