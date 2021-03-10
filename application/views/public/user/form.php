<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="container">


                <div class="row">
                    <div class="col-lg-12">
                        <form method="POST" action="<?=base_url()?>user/upsert">
                            <div class="form-group">
                                
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="<?=  (!empty($data->first_name) ? $data->first_name : '') ?>">
                                
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="<?=  (!empty($data->last_name) ? $data->last_name : '') ?>">
                                
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Last Name" value="<?=  (!empty($data->email) ? $data->email : '') ?>">
                            </div>
                            
                            <?php if(empty($data->id)) {?>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password" value="<?=  (!empty($data->password) ? $data->password : '') ?>">
                            </div>
                            <?php
                                } 
                            ?>
                            
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control form-control">
                                    <option>Select Role</option>
                                    <option <?php echo (!empty($data->role)?($data->role == 1 ? 'selected': ''):'') ?> value="1">admin</option>
                                    <option <?php echo (!empty($data->role)?($data->role == 2 ? 'selected': ''):'') ?> value="2">user</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Advertiser</label>
                                <select name="account_id" class="form-control form-control">
                                    <option value='0'>ALL</option>
                                    <?php 
                                        foreach($account as $row){
                                            echo "<option value='".$row->id."' ".($data->account_id == $row->id ? 'selected': '').">".$row->account_name."</option>";
                                        }
                                    ?>
                                </select>
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


