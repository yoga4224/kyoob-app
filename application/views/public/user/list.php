<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="container">
                

                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-kyoob text-center my-2 btn-kyoob-pink" style="width:170px;" href="<?= base_url() ?>user/upsert">Add New User</a>
                        
                        <table class="table table-borderless dashboard-table">
                            <thead>
                                <tr>
                                    
                                    
                                    <th scope="col" >Name</th>
                                    <th scope="col" >Email</th>
                                    <th scope="col" >Advertiser</th>
                                    <th scope="col" >Role</th>
                                    <th scope="col" >Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data as $row) {?>
                                <tr>
                                    <td><?= $row->first_name.' '.$row->last_name ?></td>
                                    <td><?= $row->email ?></td>
                                    <td><?= ($row->account_name!=''?$row->account_name:'ALL') ?></td>
                                    <td><?= ($row->role == 1 ? 'Admin': ($row->role == 2 ? 'user' : '')) ?></td>
                                    <td><a style="width:100px;" class="btn btn-kyoob text-center my-2 btn-kyoob-purple" href="<?= base_url() ?>user/upsert/<?= $row->id ?>">Edit</a> <a style="width:100px;" class="btn btn-kyoob text-center my-2 btn-kyoob-pink" href="<?= base_url() ?>user/delete/<?= $row->id ?>">Delete</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
<!--copyright-->            
<div class="copy-right-con">
<p class="info-right-fix" style="text-align:center;">
       Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</p>
</div>
<!--endofcopyright-->
        </div>
        <div class="col-lg-2">
            <a href='<?=base_url('create')?>'><button class="btn btn-kyoob text-center my-2 btn-kyoob-purple">Create Ads</button></a><br>
            <button class="btn btn-kyoob text-center my-4 btn-kyoob-pink">Contact Us</button>
            <p class="info-right-fix">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                <br><br>
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>
    </div>


</div>

</div>
</div>

