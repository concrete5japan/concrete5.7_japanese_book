<?php  defined('C5_EXECUTE') or die('Access Denied.');

use Concrete\Core\File\Set;

$fileSets = FileSet::getMySets();
?>

<fieldset>
    <div class="form-group">
        <legend><?php echo t('Select File Set') ?></legend>
        <select name="fsID">
            <?php
            foreach ($fileSets as $fs) {
                $fsName = $fs->getFileSetName();
                $selected_fsID = $fs->getFileSetId();
                $select = '';

                if ($fsID == $selected_fsID) {
                    $select = ' selected="selected" ';
                }

                echo "<option " . $select . " value=\"" . $selected_fsID . "\"> $fsName </option>";
            }
            ?>
        </select>
    </div>
</fieldset>
