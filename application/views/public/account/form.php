<html>
<form method="POST" action="<?=base_url()?>account/upsert">
    <label>Account Name</label>
    <input name="account_name" type="text" value="<?=  (!empty($data->account_name) ? $data->account_name : '') ?>" />

    <label>Email</label>
    <input name="email" type="email" value="<?=  (!empty($data->email) ? $data->email : '') ?>" />

    <input name="id" type="hidden" value="<?=  (!empty($data->id) ? $data->id : '') ?>" />
    <button type='submit'>Save</button>
    <button type='button'>Cancel</button>
</form>

</html>