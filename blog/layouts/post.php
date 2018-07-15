<?php
    require_once(dirname(__FILE__).'/head.php');
    require_once(dirname(__FILE__).'/head.page.php');
?>

<div class="container page">
  <div class="row">
    <div class="col-md-10">
      <h1><?php echo App::get('title'); ?></h1>
      <span class="meta">
          <li class="date"><img src="./img/icons/calendar-o.svg" title="Published on <?php echo App::get('date'); ?>"/><time datetime="<?php echo App::get('date'); ?>"><?php echo App::get('date'); ?></time></li>
          <li class="author"><img src="https://www.gravatar.com/avatar/<?php echo App::get('author')['gravatar_hash']; ?>" title="Author avatar" /><?php echo App::get('author')['name']; ?></li>

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
