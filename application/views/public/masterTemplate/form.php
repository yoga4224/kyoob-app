<html>
<form method="POST" action="<?=base_url()?>mastertemplate/upsert" enctype="multipart/form-data">
    <label>Template Name</label>
    <input name="template_name" type="text" value="<?=  (!empty($data->template_name) ? $data->template_name : '') ?>" />

    <label>Width</label>
    <input name="width" type="text" value="<?=  (!empty($data->width) ? $data->width : '') ?>" />

    <label>Height</label>
    <input name="height" type="text" value="<?=  (!empty($data->height) ? $data->height : '') ?>" />

    <label >Template Form</label>
    <select name="template_form">
        <option>----</option>
        <option <?= (!empty($data->template_form) ? ($data->template_form == 1 ? 'selected' : ''):'') ?> value="1">Wuling</option>
        <option <?= (!empty($data->template_form) ? ($data->template_form == 2 ? 'selected' : ''):'') ?> value="2">Social Ads</option>
        <option <?= (!empty($data->template_form) ? ($data->template_form == 3 ? 'selected' : ''):'') ?> value="3">Page</option>
    </select>

    <label >Template Icon</label>
    <img src="<?= $image ?>" alt="" width="150px" height="150px" /> 
    <input type="file" name="icon_template">

    <input name="id" type="hidden" value="<?=  (!empty($data->id) ? $data->id : '') ?>" />
    <button type='submit'>Save</button>
    <button type='button'>Cancel</button>
</form>

</html>