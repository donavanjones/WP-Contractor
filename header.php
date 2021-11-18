
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="icon" href="https://www.eaglewater.net/wp-content/themes/fwa/favicon.png">
    <!-- Facebook Pixel Code -->
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '203881104799561');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=203881104799561&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


<?php wp_head(); ?>
  </head>

  <body>

    <a class="skip-main" href="#content">Skip to main content</a>
<!--<img src="images/top-banner.png" alt="logo" class="img-fluid" width="2500"/>-->

<div class="container-fluid" style="background: #003B5C;padding: 10px;color: #fff;margin-bottom: 10px;">
<div class="col-12">
    <p style="text-align:center;"><strong>COVID-19 Update:</strong> Find out what measures DJ Web Media is taking to help ensure the health and well-being of our employees and customers. <span><a class="btn btn-success" href="#" role="button">Learn More</a></span></p>
  </div>
  </div>

<div class="container">
  <div class="row">
    <div class="col-6">
      <a href="http://lakelandroofingmaster.com/" class="my-0 mr-md-auto font-weight-normal logo"><img src="http://lakelandroofingmaster.com/wp-content/themes/fwa/images/logo.jpg" alt="Water Treatment System, FWA logo" class="img-fluid" /></a>
    </div>
    <div class="col-6 mt-2">  
      <p>
      <a class="btn btn-danger btn-lg d-sm-block" href="#" role="button">Get Started Now!</a>
      <a class="btn btn-primary btn-lg add-small-margin-top d-sm-block" href="#" role="button">251-643-0934</a>
      </p>
    </div>
    <!--
      <ul class="top-menu-items-container">
        <li class="top-menu-items">
          <a href="https://www.eaglewater.net/my-account/"><i class="fa fa-user"></i><br><span>My Account</span></a>
        </li>

        <li class="top-menu-items">
          <span id="PhoneDiv"><a href="tel:863-521-6065"><i class="fa fa-phone"></i><br><span>(863) 521-6065</span></a></span>
        </li>

        <li class="top-menu-items">
          <a href="https://www.eaglewater.net/cart/" title="View Cart"><i class="fa fa-shopping-cart"></i><br><span>Cart <small></small></span></a>
        </li>
      </ul>
    -->
  </div>
</div>

<div class="container-fluid" style="padding:0;">
<div class="row-fluid">
<nav class="header navbar navbar-expand-xl navbar-dark">
      <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#fwaMobileMenu" aria-controls="fwaMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


        <?php
        wp_nav_menu( array(
      	'theme_location'  => 'header-menu',
      	'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
      	'container'       => 'div',
      	'container_class' => 'collapse navbar-collapse float-right',
      	'container_id'    => 'fwaMobileMenu',
      	'menu_class'      => 'navbar-nav ml-auto mr-auto',
      	'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
      	'walker'          => new WP_Bootstrap_Navwalker(),
      ) );
         ?>
</div>

</div>














</div>
</div>
</nav>
