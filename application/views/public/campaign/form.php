<html>
<form method="POST" action="<?=base_url()?>campaign/upsert">
    <label>Campaign Name</label>
    <input name="campaign_name" type="text" value="<?=  (!empty($data->campaign_name) ? $data->campaign_name : '') ?>" />
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