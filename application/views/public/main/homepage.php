<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom:30px;">
                        <center>
                            <h2><?= $advertiser_name ?> Overview Dashboard</h2>
                            <p class="mb-0">Campaign <?= $campaign_name ?></p>
                            <small>Campaign Period 01 March 2021 to 8 March 2021</small>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-deck">
                            <div class="card shadow-pink">
                                <div class="header_purple">
                                    <center>
                                        Total Campagin Active
                                    </center>
                                </div>
                                <div class="card-body">

                                    <div class="card-text val-card">
                                        <?= $total_creative ?>
                                    </div>
                                    <div class="card-text sub-val-card">
                                        Active campaign
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow-pink">
                                <div class="header_purple">
                                    <center>
                                        Total Impression
                                    </center>
                                </div>
                                <div class="card-body">
                                    <div class="card-text val-card">
                                        <?= $total_impressions ?>
                                    </div>
                                    <div class="card-text sub-val-card">
                                        Impression served
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow-pink">
                                <div class="header_purple">
                                    <center>
                                        Total Cost
                                    </center>
                                </div>
                                <div class="card-body">
                                    <div class="card-text val-card">
                                        <?= $total_cost ?>
                                    </div>
                                    <div class="card-text sub-val-card">
                                        (IDR)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        
                        <table class="table table-borderless dashboard-table">
                            <thead>
                                <tr>
                                    <th scope="col">Campaign Name</th>
                                    <th scope="col">Creative Name</th>
                                    <th scope="col">Format</th>
                                    <th scope="col">Dimension</th>
                                    <th scope="col">Imp Served</th>
                                    <th scope="col">Cost</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data as $row){ ?>
                                <tr>
                                    <td><?= $row->campaign_name ?></td>
                                    <td><?= $row->creative_name ?></td>
                                    <td><?= $row->template_name ?></td>
                                    <td><?= $row->width.'x'.$row->height ?></td>
                                    <td><?= $row->impressions ?></td>
                                    <td><?= $row->impressions+50000 ?></td>
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
