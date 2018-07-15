<?php
    require_once(dirname(__FILE__).'/head.php');
    require_once(dirname(__FILE__).'/head.page.php');

    $aPosts = App::posts();
?>

<div class="container page index">
  <div class="row">
    <?php
        $aCount = 0;
        foreach($aPosts as $aId => $aPost) {
    ?>
            <div class="col-md-4">
                <a href="<?php echo App::config('site.base_url') . '/' . $aId; ?>/">
                    <img class="card-img-top" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16498ced98b%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16498ced98b%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.7265625%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                    <div class="card-body">
                      <p class="card-text"><?php echo $aPost['title']; ?></p>
                      <small class="text-muted"><?php echo $aPost['date']; ?></small>
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
        <h2>Content timeline</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
        <ul class="timeline">
            <?php
                $aDir = 'r';
                foreach($aPosts as $aPost) {
                    $aDir = $aDir == 'l' ? 'r' : 'l';
            ?>
                    <li>
                      <div class="direction-<?php echo $aDir; ?>">
                        <a href="<?php echo App::config('site.base_url') . '/' . $aId; ?>/">
                        <div class="flag-wrapper">
                          <span class="hexa"></span>
                          <span class="flag"><?php echo $aPost['title']; ?></span>
                          <span class="time-wrapper"><span class="time"><?php echo $aPost['date']; ?></span></span>
                        </div>
                        <div class="desc"><?php echo substr($aPost['content'], 0, 140); ?>...</div>
                        </a>
                      </div>
                    </li>
            <?php
                    if(++$aCount >= 3) {
                        break;
                    }
                }
            ?>
          </ul>
    </div>
  </div>
</div>

<?php
    require_once(dirname(__FILE__).'/footer.php');
?>
