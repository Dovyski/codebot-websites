<?php
    require_once(dirname(__FILE__).'/head.php');
    require_once(dirname(__FILE__).'/head.page.php');
?>

<div class="container page">
  <div class="row">
    <div class="col-md-10">
      <h1><?php echo App::get('title'); ?></h1>
      <span class="meta"><time datetime="2018-07-13">2018-07-13</time> <span class="author"><img src="https://www.fernandobevilacqua.com/public/img/fernando-bevilacqua.jpg?20160915" />Fernando Bevilacqua</span></span>
      <div class="content">
          <?php echo App::get('content'); ?>
      </div>
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>

<?php
    require_once(dirname(__FILE__).'/footer.php');
?>
