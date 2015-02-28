<?php defined('C5_EXECUTE') or die("Access Denied.");
$navigationTypeText = ($navigationType == 0) ? 'arrows' : 'pages';
$c = Page::getCurrentPage();?>
<div id="orbit">
  <?php if(count($rows) > 0) { ?>
    <?php foreach($rows as $row) { ?>
        <div>
            <?php if($row['linkURL']) { ?>
                <a href="<?php echo $row['linkURL'] ?>" class="mega-link-overlay">
            <?php } ?>
            <?php
            $f = File::getByID($row['fID'])
            ?>
            <?php if(is_object($f)) {
                $tag = Core::make('html/image', array($f, false))->getTag();
                if($row['title']) {
                	$tag->alt($row['title']);
                }else{
                	$tag->alt("slide");
                }
                print $tag; ?>
            <?php } ?>
            <?php if($row['linkURL']) { ?>
                </a>
            <?php } ?>
        </div>
      <?php } ?>
    <?php } else { ?>
      <div class="ccm-edit-mode-disabled-item" style="width: 100%; height: 200px">
        <p><?php echo t('No Slides Entered.'); ?></p>
      </div>
    <?php } ?>
</div>
