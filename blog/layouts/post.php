<?php
    require_once(dirname(__FILE__).'/head.php');
    require_once(dirname(__FILE__).'/head.page.php');

    $aPosts = App::posts();
?>

<div class="container page">
  <div class="row">
    <div class="col-md-10 left-wrapper">
      <h1><?= App::get('title'); ?></h1>
      <span class="meta">
          <li class="date"><img src="<?= App::config('site.base_url'); ?>/img/icons/calendar-o.svg" title="Published on <?= App::get('date'); ?>"/><time datetime="<?= App::get('date'); ?>"><?= App::get('date'); ?></time></li>
          <li class="author"><img src="https://www.gravatar.com/avatar/<?= App::get('author')['gravatar_hash']; ?>" title="Author avatar" /><?= App::get('author')['name']; ?></li>

          <?php if(count(App::get('tags')) > 0) { ?>
              <li class="tags"><img src="<?= App::config('site.base_url'); ?>/img/icons/tags.svg" title="Tags"/><?= implode(',', App::get('tags')); ?></li>
          <?php } ?>
      </span>
      <div class="content">
          <?= App::get('content'); ?>
      </div>
    </div>
    <div class="col-md-2 right-wrapper">
        <div class="sidebar">
            <h2>Related content</h2>
            <?php
                $aAmount = 4;
                $aCount = 0;
                foreach($aPosts as $aId => $aPost) {
                    if(App::get('id') == $aPost['id']) {
                        continue;
                    }

                    echo '<li><a href="' . App::config('site.base_url') . '/' . $aId . '">' . $aPost['title'] .'</a></li>';

                    if(++$aCount >= $aAmount) {
                        break;
                    }
                }
            ?>
            <hr>
            <p><a href="<?= App::config('site.base_url'); ?>/feed/"><img src="<?= App::config('site.base_url'); ?>/img/icons/rss.svg" /> RSS</a></p>
            <p><a href="https://twitter.com/As3gamegears"><img src="<?= App::config('site.base_url'); ?>/img/icons/twitter.svg" /> Twitter</a></p>
            <p><a href="https://github.com/Dovyski/Codebot"><img src="<?= App::config('site.base_url'); ?>/img/icons/github.svg" /> Github</a></p>
        </div>

        <div class="sidebar ad">
            <h2>Codebot</h2>
            <p>
                <a href="<?= App::config('site.base_url'); ?>/feed/">
                    <img src="<?= App::config('site.base_url'); ?>/img/codebot-logo-64.png" title="Codebot logo" />
                </a>
            </p>
            <p><a class="btn btn-primary" href="https://web.codebot.cc" role="button">Try now, it's free!</a></p>
        </div>
    </div>
  </div>
</div>

<?php
    require_once(dirname(__FILE__).'/footer.php');
?>
