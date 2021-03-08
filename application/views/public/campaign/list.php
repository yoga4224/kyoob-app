<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="container">
                

                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-kyoob text-center my-2 btn-kyoob-pink" style="width:170px;" href="<?= base_url() ?>campaign/upsert">Add New Campaign</a>
                        
                        <table class="table table-borderless dashboard-table">
                            <thead>
                                <tr>
                                    
                                    
                                    <th scope="col" >Name</th>
            <th scope="col" >Advertiser</th>
            <th scope="col" >Enable Date</th>
            <th scope="col" >Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
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
            <td><a style="width:100px;" class="btn btn-kyoob text-center my-2 btn-kyoob-purple" href="<?= base_url() ?>campaign/upsert/<?= $row->id ?>">Edit</a>
            <a style="width:100px;" class="btn btn-kyoob text-center my-2 btn-kyoob-pink" href="<?= base_url() ?>campaign/delete/<?= $row->id ?>">Delete</a>
            </td>
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

