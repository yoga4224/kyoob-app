<!-- Our Custom CSS -->
<link rel="stylesheet" href="<?=base_url()?>assets/css/cube_template.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/template_ads/3dcube/swiper.min.css">

<script src="<?=base_url()?>assets/js/template_ads/3dcube/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/template_ads/3dcube/hammer.min.js"></script>
<script src="<?=base_url()?>assets/js/template_ads/3dcube/swiper.min.js"></script>


<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom:30px;">
                        <center>
                            <h2>3D Cube Template Builder</h2>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    <form action="<?= base_url() ?>create/cube" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Enter Campaign Name</label>
                            <select class="form-control" name="campaign_id">
                                <option>----</option>
                                <?php 
                                    foreach($campaign as $row){
                                        echo "<option value='".$row->id."' ".($data->campaign_id == $row->id ? 'selected': '').">".$row->campaign_name."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Enter Creative Name</label>
                            <input type="text" name="creative_name" class="form-control" id="creative_name">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Enter Dimension</label>
                            <select class="form-control" name="dimension_id">
                                <option>----</option>
                                <?php 
                                    foreach($dimension as $row){
                                        echo "<option value='".$row->id."' ".($data->dimension_id == $row->id ? 'selected': '').">".$row->width."x".$row->height."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Enter URL Landing Page</label>
                            <input type="text" name="main_landing_page" class="form-control" id="main_landing_page">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Choose Face 1</label>
                            <input type="file" name="assets[]" class="form-control-file" id="face1" onchange='filechanged()'>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Choose Face 2</label>
                            <input type="file" name="assets[]" class="form-control-file" id="face2" onchange='filechanged2()'>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Choose Face 3</label>
                            <input type="file" name="assets[]" class="form-control-file" id="face3" onchange='filechanged3()'>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Choose Face 4</label>
                            <input type="file" name="assets[]" class="form-control-file" id="face4" onchange='filechanged4()'>
                        </div>

                        <div class="form-group">
                            <button style="width:150px;" class="btn btn-kyoob text-center my-2 btn-kyoob-pink">Cancel</button>
                            <button style="width:150px;" type="submit" class="btn btn-kyoob text-center my-2 btn-kyoob-purple">Save &amp; Share</button>
                        </div>
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
        <div class="col-lg-4">
            <p>Live Preview</p>


            <div class="container-cube">
                <div class="row">
                    <div class="bgphone shadow-pink">
                        <div id="swipeBanner">
                            <div class="swiper-container" id="3d-swipe">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide frame01">
                                        <div id='htp1' class="hotspot"></div>
                                        <a>
                                            <img class="frames" id='fc1' src="">
                                            <img class="frames" id='fc1x' src="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide frame02">
                                        <div id='htp2' class="hotspot"></div>
                                        <a>
                                            <img class="frames" id='fc2' src="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide frame03">
                                        <div id='htp3' class="hotspot"></div>
                                        <a>
                                            <img class="frames" id='fc3' src="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide frame03">
                                        <div id='htp4' class="hotspot"></div>
                                        <a>
                                            <img class="frames" id='fc4' src="">
                                        </a>
                                    </div>
                                </div><!-- End of Frames container -->
                            </div><!-- End of 3D Swipe -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

</div>
</div>

<script>
    //3D Cube Swiper JS

    var framesAmount = $('.swiper-slide').length - 1;
    var count = 3;
    var myswiper;
    var fcpath1 = '<?=base_url()?>assets/dummy/noimage.jpg';
    var fcpath2 = '<?=base_url()?>assets/dummy/noimage.jpg';
    var fcpath3 = '<?=base_url()?>assets/dummy/noimage.jpg';
    var fcpath4 = '<?=base_url()?>assets/dummy/noimage.jpg';

    // Initialize the Swiper

    initmore();

    function initmore() {
        console.log(fcpath1);
        console.log('init more');

        document.getElementById('fc1').src = fcpath1;
        document.getElementById('fc2').src = fcpath2;
        document.getElementById('fc3').src = fcpath3;
        document.getElementById('fc4').src = fcpath4;
        initSwiper();
    }

    function initSwiper() {

        myswiper = new Swiper('.swiper-container', {
            effect: 'cube',
            loop: true,
            speed: 800,
            grabCursor: true,
            direction: 'horizontal',
            loopedSlides: 2,
            slidesPerView: 'auto',
            autoplay: '1000',
            autoplayDisableOnInteraction: true,
        });

        //myswiper.slideTo( 4, 100, false)
    }

    function filechanged3() {
        var selectedFile = document.getElementById('face3').files[0];
        var img = document.getElementById('fc3');

        var reader = new FileReader();
        reader.onload = function() {
            fcpath3 = this.result;
            myswiper.destroy(false, true);
            initmore();
        }
        reader.readAsDataURL(selectedFile);

    }


    function filechanged4() {
        var selectedFile = document.getElementById('face4').files[0];
        var img = document.getElementById('fc4');

        var reader = new FileReader();
        reader.onload = function() {
            fcpath4 = this.result;
            myswiper.destroy(false, true);
            initmore();
        }
        reader.readAsDataURL(selectedFile);

    }



    function filechanged2() {
        var selectedFile = document.getElementById('face2').files[0];
        var img = document.getElementById('fc2');

        var reader = new FileReader();
        reader.onload = function() {
            fcpath2 = this.result;
            myswiper.destroy(false, true);
            initmore();
        }
        reader.readAsDataURL(selectedFile);

    }

    function filechanged() {
        var selectedFile = document.getElementById('face1').files[0];
        var img = document.getElementById('fc1');

        var reader = new FileReader();
        reader.onload = function() {
            fcpath1 = this.result;
            myswiper.destroy(false, true);
            initmore();
        }

        reader.readAsDataURL(selectedFile);

    }

    function filechangedx() {
        var swiperWrapper = $('.swiper-container'),
            newSlides = $('.swiper-wrapper').children('.swiper-slide').clone(true);

        myswiper.destroy();
        swiperWrapper.empty().append(newSlides);
        $('.swiper-wrapper').attr('style', '');
        myswiper = new Swiper('.swiper-container', settings);
    }


    document.getElementById('htp1').addEventListener('click', faceclick);
    document.getElementById('htp2').addEventListener('click', faceclick);
    document.getElementById('htp3').addEventListener('click', faceclick);
    document.getElementById('htp4').addEventListener('click', faceclick);

    function faceclick(e) {
        switch (e.target.id) {
            case 'htp1':
                window.open('http://kyoob.id', '_BLANK');
                break;
            case 'htp2':
                window.open('http://kyoob.id', '_BLANK');
                break;
            case 'htp3':
                window.open('http://kyoob.id', '_BLANK');
                break;
            case 'htp4':
                window.open('http://kyoob.id', '_BLANK');
                break;
        }
    }

</script>
