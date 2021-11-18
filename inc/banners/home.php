<?php  
  $banner_title =  get_post_custom_values($key = "banner_title"); 
  $banner_subtitle =  get_post_custom_values($key = "banner_subtitle"); 
  $banner_desc =  get_post_custom_values($key = "banner_desc"); 

  $banner_service_areas = $dj_web_media["banner_service_areas"];

if( !is_custom_post_type() )
{
  echo '<div class="container-fluid jumbotron  jumbotron-home no-radius mb-0">';
  echo '<div class="row">';
  echo '<div class="col-lg-6 mx-auto pt-5 pb-0 pl-5 pr-5 b-50-t">';
  echo  '<div class="row pt-4">';
  echo  '<div class="col-lg-12 col-md-12 col-sm-12 col-12">';
  echo  '<h2 class="text-light">'.  $banner_title[0] .'</h2>';
  echo  '<p class="text-light">'.   $banner_subtitle[0] .' </p>';
  echo  '<p class="text-light">'.   $banner_desc[0] .'</p>';
  echo  '<div><div id="wufoo-qzkuzpz12o4b0x"> Fill out my <a href="https://floridawateranalysis.wufoo.com/forms/qzkuzpz12o4b0x">online form</a>. </div> <script type="text/javascript"> var qzkuzpz12o4b0x; (function(d, t) { var s = d.createElement(t), options = { "userName":"floridawateranalysis", "formHash":"qzkuzpz12o4b0x", "autoResize":true, "height":"340", "async":true, "host":"wufoo.com", "header":"hide", "ssl":true }; s.src = ("https:" == d.location.protocol ?"https://":"http://") + "secure.wufoo.com/scripts/embed/form.js"; s.onload = s.onreadystatechange = function() { var rs = this.readyState; if (rs) if (rs != "complete") if (rs != "loaded") return; try { qzkuzpz12o4b0x = new WufooForm(); qzkuzpz12o4b0x.initialize(options); qzkuzpz12o4b0x.display(); } catch (e) { } }; var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr); })(document, "script"); </script>';
    echo  '</div>';
    echo  '</div>';
    echo  '</div>';
    echo    '</div>';
  
  
    echo   '</div>' ;
    echo  '</div>';
}



?>