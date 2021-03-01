<html>
    <a href="<?= base_url() ?>user/upsert">add new user</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Account</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php foreach($data as $row) {?>
        <tr>
            <td><?= $row->first_name.' '.$row->last_name ?></td>
            <td><?= $row->email ?></td>
            <td><?= $row->account_name ?></td>
            <td><?= ($row->role == 1 ? 'Admin': ($row->role == 2 ? 'user' : '')) ?></td>
            <td><a href="<?= base_url() ?>user/upsert/<?= $row->id ?>">Edit</a> <a href="<?= base_url() ?>user/delete/<?= $row->id ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</html>