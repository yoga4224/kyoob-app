<html>
    <a href="<?= base_url() ?>campaign/upsert">add new campaign</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Account</th>
            <th>Enable Date</th>
            <th>Action</th>
        </tr>
        <?php foreach($data as $row) {?>
        <tr>
            <td><?= $row->campaign_name ?></td>
            <td><?= $row->account_name ?></td>
            <td>
                <?php if($row->enable == 1) {
                    echo $row->enable_date;
                } else { 
                    echo "<a href='".base_url()."campaign/enableCampaign/".$row->id."'>enable</a>";
                } ?>    
            </td>
            <td><a href="<?= base_url() ?>campaign/upsert/<?= $row->id ?>">Edit</a></td>
        </tr>
        <?php } ?>
    </table>
</html>