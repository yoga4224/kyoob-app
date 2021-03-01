<html>
<form method="POST" action="<?=base_url()?>user/upsert">
    <label>First Name</label>
    <input name="first_name" type="text" value="<?=  (!empty($data->first_name) ? $data->first_name : '') ?>" />

    <label>Last Name</label>
    <input name="last_name" type="text" value="<?=  (!empty($data->last_name) ? $data->last_name : '') ?>" />

    <label>Email</label>
    <input name="email" type="email" value="<?=  (!empty($data->email) ? $data->email : '') ?>" />

    <?php if(empty($data->id)) {?>
    <label>Password</label>
    <input name="password" type="password" value="<?=  (!empty($data->password) ? $data->password : '') ?>" />
    <?php } ?>
    
    <label >Role</label>
    <select name="role">
        <option>----</option>
        <option <?php echo (!empty($data->role)?($data->role == 1 ? 'selected': ''):'') ?> value="1">admin</option>
        <option <?php echo (!empty($data->role)?($data->role == 2 ? 'selected': ''):'') ?> value="2">user</option>
    </select>

    <label >Account</label>
    <select name="account_id">
        <option>----</option>
        <?php 
            foreach($account as $row){
                echo "<option value='".$row->id."' ".($data->account_id == $row->id ? 'selected': '').">".$row->account_name."</option>";
            }
        ?>
    </select>
    <input name="id" type="hidden" value="<?=  (!empty($data->id) ? $data->id : '') ?>" />
    <button type='submit'>Save</button>
    <button type='button'>Cancel</button>
</form>

</html>