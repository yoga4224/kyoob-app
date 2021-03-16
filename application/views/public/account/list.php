<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="container">
                

                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-kyoob text-center my-2 btn-kyoob-pink" style="width:170px;" href="<?= base_url() ?>account/upsert">Add New Advertiser</a>
                        
                        <table class="table table-borderless dashboard-table">
                            <thead>
                                <tr>
                                    
                                    
                                    <th scope="col" >Name</th>
            <th scope="col" >Email</th>
            <th scope="col" >CPM Price</th>
            <th scope="col" >Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data as $row) {?>
        <tr>
            <td><?= $row->account_name ?></td>
            <td><?= $row->email ?></td>
            <td><?= $row->cpm_price ?></td>
            <td><a style="width:100px;" class="btn btn-kyoob text-center my-2 btn-kyoob-purple" href="<?= base_url() ?>account/upsert/<?= $row->id ?>">Edit</a>
            <a style="width:100px;" class="btn btn-kyoob text-center my-2 btn-kyoob-pink" href="<?= base_url() ?>account/delete/<?= $row->id ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</html>