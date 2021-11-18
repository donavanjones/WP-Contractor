


<!-- JavaScript ================================================== -->
<!--<script src="https://www.eaglewater.net/js/bundled.js" type="text/javascript"></script>-->

<!-- Placed at the end of the document so the pages load faster -->


<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
</script>

</body>
</html>
