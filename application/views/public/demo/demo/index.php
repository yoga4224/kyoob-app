<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta charset="utf-8">
    <title></title>
    <script src="<?=base_url()?>assets/js/template_ads/3dcube/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/js/template_ads/3dcube/hammer.min.js"></script>
    <script src="<?=base_url()?>assets/js/template_ads/3dcube/swiper.min.js"></script>
    
<link rel="stylesheet" href="<?=base_url()?>assets/css/template_ads/3dcube/swiper.min.css">
<!-- Custom CSS -->
<style>
html, body {
	position: relative;
	height: 100%;
}

@font-face {
  font-family: 'helneu';
  src:  url('HelveticaNeueLTStd-Lt.otf');
}

body {
	background: #fff;
	margin: 0;
	padding: 0;
}

#container{
    position: absolute;
    width: 300px;
    height: 250px;
}

.frames {
    width: 100%;
}
       
#swipeBanner{
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;       
}

#3d-swipe {
	position:absolute;
	top:0px;
	width:320px;
	height:316px;
}

.swiper-container {
	width:300px;
	height:250px;
	position: absolute;
	margin:0;
	padding:0;
}

.swiper-slide {
	background-position: center;
	background-size: cover;
}

.font_copy {
    font-family: 'helneu';
    color: #fff;
    
}

#ctext1 {
    font-size: 18px;
    top: 74px;
    position: absolute;
    width: 200px;
    left: 34px;
}

#ctext1x {
    font-size: 16px;
    top: 74px;
    position: absolute;
    width: 230px;
    left: 34px;
}

#ctext1xx {
    font-size: 18px;
    top: 74px;
    position: absolute;
    width: 230px;
    left: 34px;
}

#ctext1xxx {
    font-size: 18px;
    top: 101px;
    position: absolute;
    width: 230px;
    left: 34px;
}

#ctext1xxxx {
    font-size: 11px;
    top: 71px;
    position: absolute;
    width: 220px;
    left: 40px;
    text-align: center;
    line-height: 1.5;
}

.dm1 {
    position: absolute;
    background-color: rgba(0,0,0,0);
    width: 290px;
    height: 239px;
    left: 5px;
    top: 5px;
    border-radius: 20px;
}

#ctext2 {
    font-size: 9px;
    top: 132px;
    position: absolute;
    width: 200px;
    left: 34px;
}

#ctext2x {
    font-size: 9px;
    top: 152px;
    position: absolute;
    width: 200px;
    left: 34px;
}

#ctext2xx {
    font-size: 9px;
    top: 123px;
    position: absolute;
    width: 200px;
    left: 34px;
}

#ctext2xxx {
    font-size: 9px;
    top: 149px;
    position: absolute;
    width: 200px;
    left: 34px;
}

#ctext2xxxx {
        font-size: 7px;
    top: 173px;
    position: absolute;
    width: 200px;
    left: 107px;
}





#cta1 {
    position: absolute;
    left: 34px;
    top: 175px;
}

#cta2 {
    position: absolute;
    left: 34px;
    top: 175px;
}

#cta3 {
    position: absolute;
    left: 34px;
    top: 175px;
}

#cta4 {
    position: absolute;
    left: 34px;
    top: 175px;
}

#cta4 {
    position: absolute;
    left: 34px;
    top: 175px;
}

#logo {
    position: absolute;
    left: 24px;
    top: 20px;
    width: 90px;
}

#logo2 {
    position: absolute;
    left: 24px;
    top: 20px;
    width: 90px;
}

#logo3 {
    position: absolute;
    left: 24px;
    top: 20px;
    width: 90px;
}

#plybtn {
    position: absolute;
    left: 32px;
    top: 52px;
}

#logo4 {
    position: absolute;
    left: 24px;
    top: 20px;
    width: 90px;
}

#logo5 {
    position: absolute;
    left: 24px;
    top: 20px;
    width: 90px;
}

#cta5 {
    position: absolute;
    left: 77px;
    top: 130px;
}

#s_li {
    position: absolute;
    cursor: pointer;
    width: 30px;
    height: 30px;
    top: 177px;
    left: 100px;
    z-index: 200;
}

#s_tw {
    position: absolute;
    cursor: pointer;
    width: 30px;
    height: 30px;
    top: 177px;
    left: 133px;
    z-index: 200;
}

#s_sp {
    position: absolute;
    width: 30px;
    height: 30px;
    top: 177px;
    left: 165px;
    cursor: pointer;
    z-index: 200;
}


#flwset {
    position: absolute;
}

#arr-n {
        position: absolute;
    right: 7px;
    top: 0;
    bottom: 0;
    margin: auto;
    width: 3px;
    height: 50px;
    background-color: rgba(0,0,0,0.3);
    padding: 29px 12px 0px 6px;
    z-index: 9999;
    cursor: pointer;
}

#arr-p {
    position: absolute;
    left: 5px;
    top: 0;
    bottom: 0;
    margin: auto;
    width: 3px;
    height: 50px;
    background-color: rgba(0,0,0,0.3);
    padding: 29px 12px 0px 6px;
    z-index: 9999;
    cursor: pointer;
}

.hotspot {
    
 position: absolute;
    z-index: 100;
    width: 300px;
    height: 250px;   
    cursor: pointer;
}

.swiper-button-next3 {
    z-index: 99999;
}

#shadow_sli {
    position: absolute;
    top: 4px;
    left: -6px;
    display: none;
}

#stw {
    position: absolute;
    top: 4px;
    left: 24px;
    display: none;
}

#ssp {
    position: absolute;
    top: 4px;
    left: 53px;
    display: none;
}
      
</style>
  </head>
  <body>
    <style media="screen">
      
     
    </style>
    <div id="container">
      
      <div id="swipeBanner">
<!-- 3D Swipe -->
<div class="swiper-container" id="3d-swipe">

  <!-- Swipe instructions that disappear upon interaction -->
  
       
  <!-- Frames container -->
  <div  class="swiper-wrapper">
    
    <!-- Frame 01 -->
    <div class="swiper-slide frame01">
      <div id='htp1' class="hotspot"></div>
      <a>
        <img class="frames" src="<?=base_url()?>assets/dummy/face1.jpg">
      </a>
    </div>

    <!-- Frame 02 -->
    <div class="swiper-slide frame02">
        <div id='htp2' class="hotspot"></div>
      <a>
        <img class="frames" src="<?=base_url()?>assets/dummy/face2.jpg">
      </a>
    </div>

    <!-- Frame 03 -->
    <div class="swiper-slide frame04">
        <div id='htp3' class="hotspot"></div>
      <a>
        <img class="frames" src="<?=base_url()?>assets/dummy/face3.jpg">
      </a>
        
    </div>
    <!-- Frame 04 -->
    <div class="swiper-slide frame03">
        <div id='htp4' class="hotspot"></div>
      <a>
        <img class="frames" src="<?=base_url()?>assets/dummy/face4.jpg">
      </a>
        
    </div>
    

  </div><!-- End of Frames container -->

</div><!-- End of 3D Swipe -->
      </div>
    </div>

<script type="text/javascript">
var framesAmount = $('.swiper-slide').length - 1;
var count = 3;

    initSwiper();
// Initialize the Swiper
function initSwiper(){
  var swiper = new Swiper('.swiper-container', {
    effect: 'cube',
    loop: true,
    grabCursor: true,
    cubeEffect: {
        shadow: true,
        slideShadows: true,
        shadowOffset: 20,
        shadowScale: 0.94,
      },
    // Spin animation using plugin's autoplay
    autoplay: '3000',
    autoplayDisableOnInteraction:true,
    

    // When spin animation finishes, swipe back to the first frame
    onAutoplayStop(swiper){
      
    }
  });
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
  </body>
</html>
