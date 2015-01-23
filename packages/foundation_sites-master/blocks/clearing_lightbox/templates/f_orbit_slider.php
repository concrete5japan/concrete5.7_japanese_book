<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<div class="slideshow-wrapper">
    <div class="preloader"></div>
    <ul class="orbit-slider" data-orbit data-options="circular: true;
                                                      pause_on_hover:false;">
    <?php
    foreach($files as $f) {
        $fv = $f->getApprovedVersion();

        $url = $fv->getAttribute('url');

        // use $filePath if you need the full image
        // $filePath = $fv->getRelativePath();

        // or use $thumbPath if you want to use thumbnails
        $thumbType = $controller->getThumbnailType('orbit_slider');
        $thumbPath = $fv->getThumbnailURL($thumbType);
        if(!$thumbPath){
            $fv->rescanThumbnails();
        }

        echo "<li>";
        echo "<a href=\"$url\">";
        echo    "<img src=\"$thumbPath\"/>";
        echo "</a>";
        echo "</li>\n";
    }
    ?>

    </ul>
</div>
