<?php
    require_once(dirname(__FILE__).'/head.php');
    require_once(dirname(__FILE__).'/head.page.php');
?>

<div class="container page">
  <div class="row">
    <div class="col-md-10">
      <h1><?php echo App::get('title'); ?></h1>
      <span class="meta">
          <li class="date"><img src="./img/icons/calendar-o.svg" title="Published on 2018-07-13"/><time datetime="2018-07-13">2018-07-13</time></li>
          <li class="author"><img src="https://www.fernandobevilacqua.com/public/img/fernando-bevilacqua.jpg?20160915" />Fernando Bevilacqua</li>

          <?php if(count(App::get('tags')) > 0) { ?>
              <li class="tags"><img src="./img/icons/tags.svg" title="Tags"/><?php echo implode(',', App::get('tags')); ?></li>
          <?php } ?>
      </span>
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
