<?php
    require_once(dirname(__FILE__).'/head.php');
    require_once(dirname(__FILE__).'/head.page.php');
?>

<div class="container page">
  <div class="row">
    <div class="col-md-10">
      <h1><?php echo App::get('title'); ?></h1>
      <?php echo App::get('content'); ?>
    </div>
  </div>
</div>

<?php
    require_once(dirname(__FILE__).'/footer.php');
?>
