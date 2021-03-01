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
                        
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Enter Campaign Name</label>
                                <input type="text" class="form-control" id="campaign_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Enter Creative Name</label>
                                <input type="text" class="form-control" id="campaign_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Enter URL Landing Page</label>
                                <input type="text" class="form-control" id="campaign_name">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Choose Face 1</label>
                                <input type="file" class="form-control-file" id="face1" onchange='filechanged()'>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Choose Face 2</label>
                                <input type="file" class="form-control-file" id="face2" onchange='filechanged2()'>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Choose Face 3</label>
                                <input type="file" class="form-control-file" id="face3" onchange='filechanged3()'>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Choose Face 4</label>
                                <input type="file" class="form-control-file" id="face4" onchange='filechanged4()'>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-kyoob text-center my-2 btn-kyoob-pink">Cancel</button>
                                
                                <a href="<?=base_url('Workspace')?>">
                                    
                                    <button class="btn btn-kyoob text-center my-2 btn-kyoob-purple">Save &amp; Share</button>
                                </a>

                            </div>

                        
                    </div>
                </div>



            </div>

        </div>
        <div class="col-lg-4">
            <p>Live Preview</p>


            <div class="container-cube">
                <div class="row">
                    <div id="swipeBanner">
                        <!-- 3D Swipe -->
                        <div class="swiper-container" id="3d-swipe">
                            <!-- Frames container -->
                            <div class="swiper-wrapper">

                                <!-- Frame 01 -->
                                <div class="swiper-slide frame01">
                                    <div id='htp1' class="hotspot"></div>
                                    <a>
                                        <img class="frames" id='fc1' src="<?=base_url()?>assets/dummy/face1.jpg">
                                    </a>
                                </div>

                                <!-- Frame 02 -->
                                <div class="swiper-slide frame02">
                                    <div id='htp2' class="hotspot"></div>
                                    <a>
                                        <img class="frames" id='fc2' src="<?=base_url()?>assets/dummy/noimage.jpg">
                                    </a>
                                </div>

                                <!-- Frame 03 -->
                                <div class="swiper-slide frame03">
                                    <div id='htp3' class="hotspot"></div>
                                    <a>
                                        <img class="frames" id='fc3' src="<?=base_url()?>assets/dummy/noimage.jpg">
                                    </a>
                                </div>
                                <!-- Frame 04 -->
                                <div class="swiper-slide frame03">
                                    <div id='htp4' class="hotspot"></div>
                                    <a>
                                        <img class="frames" id='fc4' src="<?=base_url()?>assets/dummy/face4.jpg">
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

<script>
    
//3D Cube Swiper JS
    
var framesAmount = $('.swiper-slide').length - 1;
var count = 3;

// Initialize the Swiper

  var myswiper = new Swiper('.swiper-container', {
      effect: 'cube',
      loop: true,
      lazy: {
        threshold: 50,
        observer: true,
        loadPrevNext: true,
        loadPrevNextAmount: 2,
      },
      grabCursor: true,
      direction: 'horizontal',
      cubeEffect: {
        shadow: true,
        slideShadows: true,
        shadowOffset: 20,
        shadowScale: 0.94,
      },
    // Spin animation using plugin's autoplay
    autoplay: '3000',
    autoplayDisableOnInteraction:true,
    centeredSlides: true,

    // When spin animation finishes, swipe back to the first frame
    onAutoplayStop(myswiper){
      
    }
  })

function filechanged3(){
    var selectedFile = document.getElementById('face3').files[0];    
    var img = document.getElementById('fc3');

    var reader = new FileReader();
    reader.onload = function() {
        img.src = this.result   
    }
    reader.readAsDataURL(selectedFile);
    myswiper.update();
}
    
    
function filechanged4(){
    var selectedFile = document.getElementById('face4').files[0];    
    var img = document.getElementById('fc4');

    var reader = new FileReader();
    reader.onload = function() {
        img.src = this.result;
    }
    reader.readAsDataURL(selectedFile);
    myswiper.update();
}
    
    
    
function filechanged2(){
    var selectedFile = document.getElementById('face2').files[0];    
    var img = document.getElementById('fc2');

    var reader = new FileReader();
    reader.onload = function() {
        img.src = this.result    
    }
    reader.readAsDataURL(selectedFile);
    myswiper.update();
}
    
function filechanged() {
        var selectedFile = document.getElementById('face1').files[0];
        
        var img = document.getElementById('fc1');
        
        var reader = new FileReader();
        reader.onload = function() {
            img.src = this.result;
        }
        reader.readAsDataURL(selectedFile);
        myswiper.update();

    }
    
        
document.getElementById('htp1').addEventListener('click', faceclick);
document.getElementById('htp2').addEventListener('click', faceclick);
document.getElementById('htp3').addEventListener('click', faceclick);
document.getElementById('htp4').addEventListener('click', faceclick);

function faceclick(e){
    switch (e.target.id){
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


