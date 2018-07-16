<?php
    define('BASE_URL', '..');
    require_once(dirname(__FILE__).'/../head.php');
    require_once(dirname(__FILE__).'/../head.page.php');
?>

<div class="container page">
  <div class="row">
    <div class="col-md-10">
      <h2>About</h2>
      <p>Developing a game is much more than just coding, you have to tweak art, build levels, convert files, find assets/extensions, read docs about building and publishing, and so on. If you don't have a team to help you, then anything but the tasks you enjoy the most become extremely boring.</p>
      <p>Nobody likes to spend time finding out what are the dimensions and formats of thumbnails/icons for Google Play, or what witchcrafts a PNG file has to be put through so it can be accepted by Apple. Nobody likes to explore all the web after SFXs, only to find them and realize they need to be converted from WAV to MP3 to actually be used. Nobody likes to manually slice assets to extract tiles. The IDE should help us do that, or do it all by itself!</p>
      <p><img src="<?php echo BASE_URL; ?>/img/codebot-logo.png" title="Codebot" style="display:block; margin: 0 auto;" /></p>
      <p>Codebot tries to solve that. Imagine you are working on your <a href="https://ldjam.com/">Ludum Dare</a> game and you need an 8-bit SFX. You click a button, a panel slides, you type in a few keywords, select what you want and done! Want to create icons to publish your game on Google Play? Slide a panel, add a single 1024×768 PNG image and hit publish. Done, all icons are ready!</p>
      <p>The ultimate goal is to have an IDE that helps us develop a game, something that minimizes the time we spend working around "non-gamedev" problems. Codebot is a tool to help creators focus on the creation, not its supporting tasks.</p>
    </div>
  </div>
</div>

<?php
    require_once(dirname(__FILE__).'/../footer.php');
?>
