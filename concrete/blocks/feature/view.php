<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>
<?php
if ($linkURL) {
    $title = '<a href="' . $linkURL . '">' . $title . '</a>';
}
?>
<div class="ccm-block-feature-item">
    <?php if ($title) { ?>
        <h4><i class="fa fa-<?php echo $icon?>"></i> <?php echo $title?></h4>
    <?php } ?>
    <?php if ($paragraph) { ?>
        <p><?php echo $paragraph?></p>
    <?php } ?>
</div>