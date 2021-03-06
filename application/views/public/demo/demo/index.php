<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta charset="utf-8">
    <title></title>
    <script src="<?= base_url() ?>assets/template/3dcube/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/template/3dcube/js/hammer.min.js"></script>
    <script src="<?= base_url() ?>assets/template/3dcube/js/swiper.min.js"></script>

    <link rel="stylesheet" href="<?= base_url() ?>assets/template/3dcube/css/swiper.min.css">
    <!-- Custom CSS -->
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: #fff;
            margin: 0;
            padding: 0;
        }

        #container {
            position: absolute;
            width: 300px;
            height: 250px;
        }

        .frames {
            width: 100%;
        }

        #swipeBanner {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        #3d-swipe {
            position: absolute;
            top: 0px;
            width: 320px;
            height: 316px;
        }

        .swiper-container {
            width: 300px;
            height: 250px;
            position: absolute;
            margin: 0;
            padding: 0;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
        }

        .hotspot {
            position: absolute;
            z-index: 100;
            width: 300px;
            height: 250px;
            cursor: pointer;
        }

    </style>
</head>

<body>
    <div id="container">
        <div id="swipeBanner">
            <!-- 3D Swipe -->
            <div class="swiper-container" id="3d-swipe">
                <!-- Frames container -->
                <div class="swiper-wrapper">
                    <!-- Frame 01 -->
                    <div class="swiper-slide frame01">
                        <div id='htp1' class="hotspot"></div>
                        <a>
                            <img class="frames" src="<?= base_url().'assets/upload/'.$assets[0]->url ?>">
                        </a>
                    </div>
                    <!-- Frame 02 -->
                    <div class="swiper-slide frame02">
                        <div id='htp2' class="hotspot"></div>
                        <a>
                            <img class="frames" src="<?= base_url().'assets/upload/'.$assets[1]->url ?>">
                        </a>
                    </div>
                    <!-- Frame 03 -->
                    <div class="swiper-slide frame04">
                        <div id='htp3' class="hotspot"></div>
                        <a>
                            <img class="frames" src="<?= base_url().'assets/upload/'.$assets[2]->url ?>">
                        </a>
                    </div>
                    <!-- Frame 04 -->
                    <div class="swiper-slide frame03">
                        <div id='htp4' class="hotspot"></div>
                        <a>
                            <img class="frames" src="<?= base_url().'assets/upload/'.$assets[3]->url ?>">
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
        function initSwiper() {
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
                autoplayDisableOnInteraction: true,

                // When spin animation finishes, swipe back to the first frame
                onAutoplayStop(swiper) {

                }
            });
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
</body>

</html>
