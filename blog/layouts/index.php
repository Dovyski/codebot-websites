<?php
    require_once(dirname(__FILE__).'/head.php');
    require_once(dirname(__FILE__).'/head.page.php');

    $aPosts = App::posts();
?>

<div class="container page index">
    <div class="row">
      <div class="col-md-12">
         <h2><img src="<?php echo App::config('site.base_url'); ?>/img/icons/rss.svg" style="width: 28px; height: 28px;" /> Featured content</h2>
      </div>
    </div>
  <div class="row">
    <?php
        $aCount = 0;
        foreach($aPosts as $aId => $aPost) {
    ?>
            <div class="col-md-4">
                <a href="<?php echo App::config('site.base_url') . '/' . $aId; ?>/">
                    <img class="card-img-top" alt="Thumbnail" style="height: 225px; width: 100%; display: block;" src="<?php echo App::config('site.base_url') . '/' . (isset($aPost['thumbnail']) ? $aPost['thumbnail'] : 'img/posts/thumbnail-hero.jpg'); ?>">
                    <div class="card-body">
                      <p class="card-text"><?php echo $aPost['title']; ?></p>
                      <p class="card-note"><?php echo $aPost['date']; ?></p>
                    </div>
                </a>
            </div>
    <?php
            if(++$aCount >= 3) {
                break;
            }
        }
    ?>
  </div>
  <div class="row timeline-header">
    <div class="col-md-12">
        <hr>
        <h2>Content timeline</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
        <ul class="timeline">
            <?php
                $aDir = 'r';
                foreach($aPosts as $aId => $aPost) {
                    $aDir = $aDir == 'l' ? 'r' : 'l';
            ?>
                    <li>
                      <div class="direction-<?php echo $aDir; ?>">
                        <a href="<?php echo App::config('site.base_url') . '/' . $aId; ?>/">
                        <div class="flag-wrapper">
                          <span class="hexa"></span>
                          <span class="time-wrapper"><span class="time"><?php echo $aPost['date']; ?></span></span>
                        </div>
                        <div class="desc">
                            <p class="title"><?php echo $aPost['title']; ?></p>
                            <?php echo $aPost['excerpt']; ?>...</div>
                        </a>
                      </div>
                    </li>
            <?php } ?>
          </ul>
    </div>
  </div>
</div>

<?php
    require_once(dirname(__FILE__).'/footer.php');
?>
