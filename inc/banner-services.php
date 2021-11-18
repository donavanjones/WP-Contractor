<?php
//first get the current category ID
$cat_id = get_query_var('cat');

//then i get the data from the database
$cat_data = get_option("category_$cat_id");
//and then i just display my category image if it exists

if($cat_id == 65)
{
  $link = 'https://www.eaglewater.net/newsletter/';
}else{
  $link = 'https://www.eaglewater.net/contact-us/';
}
?>


<div class="container-fluid d-none d-sm-block" style="padding-Left:0;padding-right:0">
  <div class="">
    <div id="" class="">
        <a href="<?php echo $link; ?>">
          <?php if (isset($cat_data['img']))
          {
            echo '<img src="'.$cat_data['img'].'" alt="water treatment banner" class="img-fluid" width="2500">';
          }
          ?>
        </a>
    </div>
  </div>
</div>

<div class="container-fluid d-sm-none" style="padding-Left:0;padding-right:0">
  <div class="">
    <div id="" class="">
        <a href="<?php echo $link; ?>">
          <?php if (isset($cat_data['extra1']))
          {
            echo '<img src="'.$cat_data['extra1'].'" alt="water treatment banner" class="img-fluid" width="2500">';
          }
          ?>
        </a>
    </div>
  </div>
</div>
