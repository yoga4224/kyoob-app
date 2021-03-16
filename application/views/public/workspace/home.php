<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom:30px;">
                        <center>
                            <h2>Yeah... These are yours..</h2>
                            <p class="mb-0">Agency Dentsu Indonesia</p>
                            <small>Campaign Period 01 March 2021 to 8 March 2021</small>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php foreach($creative as $row){ ?>
                            <?php 
                                if($row->process_quote == 0) { 
                                    $color_ring = 'ring-yellow';
                                    $quote_tag = '<a data-toggle="modal" data-target="#modalprocess" href="#" data-id=' . $row->id . ' class="btn btn-kyoob proc-quote text-center my-2 btn-kyoob-purple">Process Quote</a>';
                                }elseif($row->process_quote == 1){
                                    $color_ring = 'ring-yellow';
                                    $quote_tag = '<strong>On Review</strong>';
                                }elseif($row->process_quote == 2){
                                    $color_ring = '';
                                    $quote_tag = '<a data-toggle="modal" data-target="#modaldownload" data-id=' . $row->id . ' href="#">
                                        <img class="mr-auto" style="width:25px;" src="'.base_url().'assets/images/file.svg">  
                                        <p class="icon-copy">Download Source</p>
                                    </a>';
                                }
                            ?>
                                
                            <div class="card wkspace-card" style="width: 16rem;">
                                <div class="card-body">
                                    <div class="workspace-creativename">
                                        <?= $row->creative_name ?>
                                    </div>
                                    <div class="workspace-dimension">
                                        <?= $row->width.'x'.$row->height ?>
                                    </div>
                                    <div class="workspace-template">
                                        Template :&nbsp;<?= $row->template_name ?>
                                    </div>
                                    <div class="workspace-impr <?= $color_ring ?>" >
                                        <?= $row->impressions/10000 ?><span style="font-size:15px;">K</span>
                                    </div>
                                    <div class="workspace-template">
                                        Impression Served
                                    </div>
                                    <div class="workspace-icons">
                                    <div class="d-flex flex-row-reverse">
                                        <div class="p-2 icon-wp align-items-end hand_cursor">
                                            <a href="<?= base_url()."preview/index/".$row->id ?>" target="_blank">
                                                <img style='width:25px;' src='<?=base_url()?>assets/images/eye.svg'>
                                                <p class='icon-copy'>Preview</p>
                                            </a>
                                        </div>
                                        <div class="p-2 icon-wp align-items-end hand_cursor">
                                        <a href="<?= base_url()."workspace/processQuote/".$row->id ?>" >
                                            <img style='width:25px;' src='<?=base_url()?>assets/images/share.svg'>  
                                            <p class='icon-copy'>Share</p>  
                                        </a>
                                        </div>
                                        <div class="p-2 icon-wp mr-auto align-items-end hand_cursor">
                                            <?= $quote_tag ?>
                                        </div>
                                    </div>    
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class ="row">
                    <div class="col-lg-12">
                        <?= $pagination ?>
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
            <a href="<?=base_url('create')?>"><button class="btn btn-kyoob text-center my-2 btn-kyoob-purple">Create Ads</button></a><br>
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


<!-- Modal -->
<div class="modal fade dimmer-color-modal-purple" id="modaldownload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body center-text modal-header-kyoob-text">
        <p>Download Ad Source</p>
      </div>
      <div class="modal-header-kyoob-text-sub">
          <p>
        This ads made for running on DV360 only, upload this ads on other ad server may cause an error or not tracked well.
          </p>
      </div>
      <div style="margin:35px 0 35px 0;">
        
        <img class="mx-auto d-block" src="<?=base_url()?>assets/images/dv360-logo.png">
             </div>
      <div style="margin:0 0 35px 0;">
        <a href="#" id='dwnloadbtn' style="width:125px;" class="btn btn-kyoob proc-quote text-center my-2 btn-kyoob-purple mx-auto d-block">Download ZIP file</a>
      </div>
    </div>
  </div>
</div>

<!-- Process -->
<div class="modal fade dimmer-color-modal-purple" id="modalprocess" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body center-text modal-header-kyoob-text">
        <p>Process Quote this Ads?</p>
      </div>
      <div class="modal-header-kyoob-text-sub">
          <p>
             Are you sure want you Process Quote this ads? Once it proceed the tracker will counting the impression.
          </p>
      </div>
      <div style="margin:35px 0 35px 0;">
        
        <img class="mx-auto d-block" src="<?=base_url()?>assets/images/comingsoon.png">
             </div>
     
     <div class="modal-footer">
        <button type="button" class="btn btn-kyoob proc-quote text-center my-2 btn-kyoob-purple" data-dismiss="modal">Cancel</button>
        <button type="button" id='procbtn' class="btn btn-kyoob proc-quote text-center my-2 btn-kyoob-pink">Yes, Process!</button>
      </div>    
    </div>
  </div>
</div>
