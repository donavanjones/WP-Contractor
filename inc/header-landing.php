    <meta itemprop="logo" content="images/logo.png">
    <meta property="og:image:url" content="<?php $scraper->get_og_image(); ?>" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@FWA_Cares" />
    <meta property="og:title" name="twitter:title" content="<?php $scraper->get_og_title(); ?>" />
    <meta property="og:image" name="twitter:image" itemprop="image" content="<?php $scraper->get_og_image(); ?>" />
    <meta property="og:description" name="twitter:description" content="<?php $scraper->get_og_desc(); ?>">
    <meta property="og:site_name" content="Florida Water Analysis"/>

    <!-- Core CSS -->
    <?php
      echo("<style>");
        echo file_get_contents("https://www.eaglewater.net/css/combined18-css.css");
      echo("</style>");
     ?>

     <style>
     .container{padding-top:1% !important;padding-bottom:1% !important;}
     .card-body{padding:0;}
     .card-body p,.card-body ul.list-group{padding: 0.5rem;}
       @media (max-width:992px)
       {
         .card-deck
         {
           display: block;
            -ms-flex-direction: none;
          }

       }
     </style>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="icon" href="https://www.eaglewater.net/favicon.png">



<!-- Global site tag (gtag.js) - Google Ads: 788804930 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-788804930"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-788804930');
</script>




<!-- Event snippet for Lead conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-788804930/vXN8CNe_z5MBEMLqkPgC'});
</script>


  </head>

  <body>
    <nav class="header navbar navbar-expand-xl navbar-dark" style="height:80px;">

          <img src="images/logo.png" alt="Water Treatment System, FWA logo" class="img-fluid" style="height:75px;"/>
    </nav>

    <a class="skip-main" href="#content">Skip to main content</a>
<!--<img src="images/top-banner.png" alt="logo" class="img-fluid" width="2500"/>-->
