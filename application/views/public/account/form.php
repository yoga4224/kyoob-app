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

                        <form method="POST" action="<?=base_url()?>account/upsert">
                            <div class="form-group">

                                <label>Advertiser Name</label>
                                <input type="text" class="form-control" name="account_name" placeholder="Enter Advertiser Name" value="<?=  (!empty($data->account_name) ? $data->account_name : '') ?>" />

                            </div>
                            <div class="form-group">
                                <label>Email</label>

                                <input class="form-control" name="email" type="email" value="<?=  (!empty($data->email) ? $data->email : '') ?>" />
                            </div>

                            <div class="form-group">
                                <label>CPM Price</label>

                                <input class="form-control" name="cpm_price" type="text" value="<?=  (!empty($data->cpm_price) ? $data->cpm_price : 0) ?>" />
                            </div>

                            <input name="id" type="hidden" value="<?=  (!empty($data->id) ? $data->id : '') ?>" />

                            <button style="width:110px;" type="button" class="btn btn-kyoob btn-kyoob-pink">Cancel</button>
                            <button style="width:110px;" type="submit" class="btn btn-kyoob btn-kyoob-purple">Submit</button>


                        </form>
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
