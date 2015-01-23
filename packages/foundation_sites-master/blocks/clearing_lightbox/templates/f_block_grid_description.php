<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>

<ul class="small-block-grid-1 medium-block-grid-3">

<?php
foreach($files as $f) {
    $fv = $f->getApprovedVersion();

    $filePath = $fv->getRelativePath();
    $fileDescription = $fv->getDescription();

    echo "<li>";
    echo    "<img src=\"$filePath\"/>"; 
    echo    "<br><small>$fileDescription</small>";       
    echo "</li>\n";
}
?>

</ul>
