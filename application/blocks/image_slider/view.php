<?php defined('C5_EXECUTE') or die("Access Denied.");
$navigationTypeText = ($navigationType == 0) ? 'arrows' : 'pages';
$c = Page::getCurrentPage();
if ($c->isEditMode()) { ?>
    <div id="orbit">
        <div class="ccm-edit-mode-disabled-item" style="width: <?php echo $width; ?>; height: <?php echo $height; ?>">
            <div style="padding: 40px 0px 40px 0px"><?php echo t('Image Slider disabled in edit mode.')?></div>
        </div>
    </div>
<?php  } else { ?>
    <div id="orbit">
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
        <?php } else { ?>
            <div class="ccm-image-slider-placeholder">
                <div style="padding: 40px 0px 40px 0px"><?php echo t('Image Slider disabled in edit mode.')?>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>
