<html>
    <a href="<?= base_url() ?>account/upsert">add new account</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach($data as $row) {?>
        <tr>
            <td><?= $row->account_name ?></td>
            <td><?= $row->email ?></td>
            <td><a href="<?= base_url() ?>account/upsert/<?= $row->id ?>">Edit</a> <a href="<?= base_url() ?>account/delete/<?= $row->id ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</html>