<?php
$login = array(
  'name'  => 'login',
  'id'  => 'login',
  'value' => set_value('login'),
  'maxlength' => 80,
  'size'  => 20
);
if ($login_by_username AND $login_by_email) {
  $login_label = 'Email or login';
} else if ($login_by_username) {
  $login_label = 'Login';
} else {
  $login_label = 'Email';
}
$password = array(
  'name'  => 'password',
  'id'  => 'password',
  'size'  => 20,
);
$remember = array(
  'name'  => 'remember',
  'id'  => 'remember',
  'value' => 1,
  'checked' => set_value('remember'),
  'style' => 'margin:0;padding:0',
);
$captcha = array(
  'name'  => 'captcha',
  'id'  => 'captcha',
  'maxlength' => 8,
);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="CodeElectra Technologies Pvt. Ltd.">

    <title>NNBID Online Auction Service</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>/assets/css/scrolling-nav.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>/assets/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
    <style type="text/css">
      .blinking{
                animation:blinkingText 1.5s infinite;
                text-align: center;
              }
              @keyframes blinkingText{
                0%{   color: red;  }
                49%{  color: red; }
                50%{  color: transparent; }
                99%{  color:transparent;  }
                100%{ color: red;  }
              }
    </style>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_SlideoTransitions = [
              [{b:0,d:600,y:-290,e:{y:27}}],
              [{b:0,d:1000,y:185},{b:1000,d:500,o:-1},{b:1500,d:500,o:1},{b:2000,d:1500,r:360},{b:3500,d:1000,rX:30},{b:4500,d:500,rX:-30},{b:5000,d:1000,rY:30},{b:6000,d:500,rY:-30},{b:6500,d:500,sX:1},{b:7000,d:500,sX:-1},{b:7500,d:500,sY:1},{b:8000,d:500,sY:-1},{b:8500,d:500,kX:30},{b:9000,d:500,kX:-30},{b:9500,d:500,kY:30},{b:10000,d:500,kY:-30},{b:10500,d:500,c:{x:125.00,t:-125.00}},{b:11000,d:500,c:{x:-125.00,t:125.00}}],
              [{b:0,d:600,x:535,e:{x:27}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,o:1,e:{o:5}}],
              [{b:-1,d:1,c:{x:250.0,t:-250.0}},{b:0,d:800,c:{x:-250.0,t:250.0},e:{c:{x:7,t:7}}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,x:-570,o:1,e:{x:6}}],
              [{b:-1,d:1,o:-1,r:-180},{b:0,d:800,o:1,r:180,e:{r:7}}],
              [{b:0,d:1000,y:80,e:{y:24}},{b:1000,d:1100,x:570,y:170,o:-1,r:30,sX:9,sY:9,e:{x:2,y:6,r:1,sX:5,sY:5}}],
              [{b:2000,d:600,rY:30}],
              [{b:0,d:500,x:-105},{b:500,d:500,x:230},{b:1000,d:500,y:-120},{b:1500,d:500,x:-70,y:120},{b:2600,d:500,y:-80},{b:3100,d:900,y:160,e:{y:24}}],
              [{b:0,d:1000,o:-0.4,rX:2,rY:1},{b:1000,d:1000,rY:1},{b:2000,d:1000,rX:-1},{b:3000,d:1000,rY:-1},{b:4000,d:1000,o:0.4,rX:-1,rY:-1}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $Idle: 2000,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions,
                $Breaks: [
                  [{d:2000,b:1000}]
                ]
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        });
    </script>

    <link href="//fonts.googleapis.com/css?family=Oswald:200,300,regular,500,600,700&subset=latin-ext,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 052 css*/
        .jssorb052 .i {position:absolute;cursor:pointer;}
        .jssorb052 .i .b {fill:#000;fill-opacity:0.3;}
        .jssorb052 .i:hover .b {fill-opacity:.7;}
        .jssorb052 .iav .b {fill-opacity: 1;}
        .jssorb052 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 053 css*/
        .jssora053 {display:block;position:absolute;cursor:pointer;}
        .jssora053 .a {fill:none;stroke:#fff;stroke-width:640;stroke-miterlimit:10;}
        .jssora053:hover {opacity:.8;}
        .jssora053.jssora053dn {opacity:.5;}
        .jssora053.jssora053ds {opacity:.3;pointer-events:none;}
    </style>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav" style="background-image: url("1.png");">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?php echo base_url(); ?>/assets/1.png" height="110px" width="1320px;" style="margin-left: -9%;"></a>
        
       
    </nav>

    <div class="row" style="margin-top: 2%; height: 350px; overflow: hidden;">
      <div class="col-lg-4">
        <header class="bg-primary text-white">
        <div class="container text-center">
          <?php echo form_open($this->uri->uri_string()); ?>
            <table>
              <tr>
                <td style="font-size: 20px;">Username</td>
                <td>
                  <?php echo form_input($login); ?>
                  <br><span style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></span>
                </td>
              </tr>
              <tr>
                <td style="font-size: 20px;">Password</td>
                <td>
                  <?php echo form_password($password); ?>
                  <br><span style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></span>
                </td>
              </tr>
              <tr>
                <td><?php echo form_checkbox($remember); ?><?php echo form_label('Remember me', $remember['id']); ?></td>
                <td><input type="submit" value="Login" style="width: 100%; background-color: white; color: black;"></td>
                
              </tr>
            </table>
          </form>
        </div>
      </header>
      </div>
      <div class="col-lg-8" style="margin-left: -4%;">
        
        <div class="container">
          
          <img src="<?php echo base_url(); ?>/assets/img2.png" style="width: 109.3%;" height="355px;">
        </div>
     
      </div>
    </div>


    <div class="row" style="margin-top: 1%;">
      <div class="col-lg-4">
        <span class="blinking"><h1>Live Auctions</h1></span>
        <ul>
          <?php foreach($liveAuctions as $live){ ?>
          <li style="list-style: none; font-size: 20px;">
            <img src="<?php echo base_url(); ?>/assets/red_dot.png" style="width: 5%;">
            <?php echo $live['auction_number']; ?>
          </li>
          <?php } ?>
          
        </ul>
      </div>
      <div class="col-lg-4">
        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?php echo base_url(); ?>/assets/img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
            <div>
                <img data-u="image" src="<?php echo base_url(); ?>/assets/img/img11.jpg" />
                <div data-u="caption" data-t="0" style="position:absolute;top:320px;left:30px;width:500px;height:40px;font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;background-color:rgba(255,188,5,0.8);">High Quality Scrap Material</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url(); ?>/assets/img/img12.jpg" />
                <div data-u="caption" data-t="3" style="position:absolute;top:30px;left:30px;width:500px;height:40px;font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;background-color:rgba(255,188,5,0.8);">Fast and Reliable platform</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url(); ?>/assets/img/img13.jpg" />
                <div data-ts="flat" data-p="1360" style="position:absolute;top:0px;left:0px;width:980px;height:380px;">
                    <div data-u="caption" data-t="2" style="position:absolute;top:30px;left:-505px;width:500px;height:40px;font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;background-color:rgba(255,188,5,0.8);">One touch Bid </div>
                </div>
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url(); ?>/assets/img/img14.jpg" />
                <div data-u="caption" data-t="3" style="position:absolute;top:30px;left:30px;width:500px;height:40px;font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;background-color:rgba(255,188,5,0.8);">Fast and Reliable platform</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url(); ?>/assets/img/img15.jpg" />
                <div data-u="caption" data-t="4" style="position:absolute;top:30px;left:30px;width:500px;height:40px;font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;background-color:rgba(255,188,5,0.8);">Huge Industry Network</div>
            </div>
            
            
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb052" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora053" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora053" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
      </div>
      <div class="col-lg-4">
        <span><h2 align="center">Contact Us</h2></span>
        <ul>
          <li style="list-style: none; font-size: 12px;">
            <img src="<?php echo base_url(); ?>/assets/pin.png" style="width: 7%;" height="30px;">
            <?php echo $contact_profile['org_name']; ?><br><?php echo $contact_profile['org_address']; ?>
          </li>
          <li style="list-style: none; font-size: 12px;">
            <img src="<?php echo base_url(); ?>/assets/phone.png" style="width: 7%;" height="30px">
            <?php if(isset($contact_profile['phone1'])){ echo $contact_profile['phone1']; } ?><?php if(isset($contact_profile['phone2'])){ echo ", <br>".$contact_profile['phone2']; } ?>
          </li>
          <li style="list-style: none; font-size: 12px;">
            <img src="<?php echo base_url(); ?>/assets/mail.png" style="width: 7%;" height="30px">
            <a href="mailto:<?php echo $contact_profile['email1']; ?>"><?php if (isset($contact_profile['email1'])){ echo $contact_profile['email1']; } ?><?php if(isset($contact_profile['email2'])){ echo ", <br>".$contact_profile['email2']; } ?></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="row" style="margin-top: 1%;">
      <div class="col-lg-4" style="border-top: inset; border-color: red;">
         <div class="container" align="center">
            <h2>About Us</h2>
            <p>
              We are a team dedicated towards the auctioning of best quality scrap material with perfect value.
We try to make the bidding as simple as possible with fast, secure and reliable service.
            </p>
          </div>
      </div>
      <div class="col-lg-8" style="margin-left: -1%;">
         <div class="container" align="center">
            <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSJ8PlUzlxMa4uEYyeaNwHR2eLiM9fyTYEPcW5GfXNScXhNR90tjdBT3RmB-o1BkQGMNdQDezs8YflG/embed?start=true&amp;loop=true&amp;delayms=5000" frameborder="0" height="400px;" style="width: 100%;" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
          </div>
      </div>
     
    </div>

    
    
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; www.nnbid.com 2018 || Design and Developed By <a href="http://www.codeelectra.com"> CodeElectra Technologies Pvt. Ltd. </a></p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="<?php echo base_url(); ?>/assets/js/scrolling-nav.js"></script>

  </body>

</html>
