














<?php
      if ( $dj_web_media["show-count-down-timer"] == 3 ) 
      {
          echo '<div class="row">';
          echo '<div class="highlight-box-no-radius mt-0 pb-5">';
          echo ' <div class="container text-center">';
          echo '<p class="h1 count-down-timer-title">There Are 2 Spots Still Available Today:</p>';
          echo '<div id="timer_header"></div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
    }
      ?>











<div class="footer-bg-color pt-2 pb-2">
<h2 class="display-5 footer-cta-text-color" style="text-align: center;color: #0078BA;"><?php echo($dj_web_media["company_footer_cta"]); ?></h2>
<div class="col-12">
<p class="h2 footer-sells-slogan-text-color" style="text-align: center;font-weight:100;"><?php echo($dj_web_media["company_footer_sell_slogan"]); ?> <strong class="footer-sells-slogan-cta-text-color"><?php echo($dj_web_media["company_footer_sell_slogan_cta"]); ?></strong></p>
</div>
<div class="col-md-12 col-12">
<p class="lead footer-sells-motto-text-color" style="text-align: center;"><?php echo($dj_web_media["company_footer_sells_motto"]); ?></p>

</div>

<div class="col-md-4 col-sm-12 offset-md-4">
<div id="wufoo-q1cg97zm07nibcz" style="max-height: 300px;"> Fill out my <a href="https://floridawateranalysis.wufoo.com/forms/q1cg97zm07nibcz">online form</a>. </div> <script type="text/javascript"> var q1cg97zm07nibcz; (function(d, t) { var s = d.createElement(t), options = { 'userName':'floridawateranalysis', 'formHash':'q1cg97zm07nibcz', 'autoResize':true, 'height':'300', 'async':true, 'host':'wufoo.com', 'header':'hide', 'ssl':true }; s.src = ('https:' == d.location.protocol ?'https://':'http://') + 'secure.wufoo.com/scripts/embed/form.js'; s.onload = s.onreadystatechange = function() { var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return; try { q1cg97zm07nibcz = new WufooForm(); q1cg97zm07nibcz.initialize(options); q1cg97zm07nibcz.display(); } catch (e) { } }; var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr); })(document, 'script'); </script>
</div>
<hr>
<p class="text-center text-light mb-0">© <?php echo date("Y"); ?> <span itemprop="legalName"><?php echo($dj_web_media["company_name"]); ?></span>, All Rights Reserved</p>
</div>
<?php
      if ( $dj_web_media["show-count-down-timer"] == 6 ) 
      {
          echo '<div class="row-fluid">';
          echo '<div class="highlight-box-no-radius mt-0 pb-5">';
          echo ' <div class="container text-center">';
          echo '<p class="h1 count-down-timer-title">There Are 2 Spots Still Available Today:</p>';
          echo '<div id="timer_header"></div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
    }
      ?>




<!-- JavaScript ================================================== -->
<!--<script src="https://www.eaglewater.net/js/bundled.js" type="text/javascript"></script>-->

<!-- Placed at the end of the document so the pages load faster -->


<script src="http://localhost/djwebmedia/wp-content/themes/fwa/js/bundled.js" type="text/javascript" defer></script>



<script>
const date = new Date();
const year = date.getFullYear();
const month = date.getMonth();
const day = date.getDay();
const freeWaterTest = new Date(year, month,day+3).getTime();
const freeWaterTestNextYear = new Date(year, month, day+3).getTime();


// countdown
let timer = setInterval(function() {

  // get today's date
  const today = new Date().getTime();

  // get the difference
  let diff;
  if(month > 6) {
    diff = freeWaterTestNextYear - today;
  } else {
    diff = freeWaterTest - today;
  }



  
  // math
  let days = Math.floor(diff / (1000 * 60 * 60 * 24));
  let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
  let seconds = Math.floor((diff % (1000 * 60)) / 1000);
  if(document.getElementById("timer_header") !=null)
  {
  if((days >= 0) && (hours >= 0) && (minutes >= 0) && (seconds >= 0))
  {
        // display Timer
  document.getElementById("timer_header").innerHTML =
    "<div class=\"days\"> \
  <div class=\"numbers\">" + days + "</div>days</div> \
<div class=\"hours\"> \
  <div class=\"numbers\">" + hours + "</div>hours</div> \
<div class=\"minutes\"> \
  <div class=\"numbers\">" + minutes + "</div>minutes</div> \
<div class=\"seconds\"> \
  <div class=\"numbers\">" + seconds + "</div>seconds</div> \
</div>";
  }else{
    document.getElementById("timer_header").innerHTML = "<div class=\"days\"> \
  <div class=\"numbers\">" + "0" + "</div>days</div> \
<div class=\"hours\"> \
  <div class=\"numbers\">" + "0" + "</div>hours</div> \
<div class=\"minutes\"> \
  <div class=\"numbers\">" + "0" + "</div>minutes</div> \
<div class=\"seconds\"> \
  <div class=\"numbers\">" + "0" + "</div>seconds</div> \
</div><div class=\"timers-up\"><p class=\"text-light\">Hurry There Is Still Time. Simply Fill Out The Form Or Call Us At (863) 662-5570</p></div>";
  }
}


}, 1000);







</script>
<?php wp_footer(); ?>
</body>
</html>
