<html>
    <a href="<?= base_url() ?>mastertemplate/upsert">add new Master Template</a>
    <table>
        <tr>
            <th>Icon</th>
            <th>Name</th>
            <th>Width</th>
            <th>Height</th>
            <th>Template Form</th>
            <th>Action</th>
        </tr>
        <?php foreach($data as $row) {?>
        <tr>
            <td><img src="<?= base_url()."assets/images/icon_template/".$row->icon_template ?>" alt="" width="30px" height="30px" /> </td>
            <td><?= $row->template_name ?></td>
            <td><?= $row->width ?></td>
            <td><?= $row->height ?></td>
            <td><?= templateForm($row->template_form) ?></td>
            <td><a href="<?= base_url() ?>mastertemplate/upsert/<?= $row->id ?>">Edit</a> <a href="<?= base_url() ?>mastertemplate/delete/<?= $row->id ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</html>