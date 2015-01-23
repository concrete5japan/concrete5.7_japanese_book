<?php  defined('C5_EXECUTE') or die('Access Denied.'); ?>

<ul class="vcard">
  
    <?php if ($fullName != ''): ?>
        <li class="fn"><?php echo $fullName; ?></li>
    <?php endif ?>
  
    <?php if ($streetAdress != ''): ?>
        <li class="street-address"><?php echo $streetAdress; ?></li>
    <?php endif ?>

    <?php if ($locality != ''): ?>
        <li class="locality"><?php echo $locality; ?></li>
    <?php endif ?>

    <?php if ($state != ''): ?>
        <li><span class="state"><?php echo $state; ?></span>,
    <?php endif ?>
    
    <?php if ($zip != ''): ?>
        <span class="zip"><?php echo $zip; ?></span></li>
    <?php endif ?>

    <?php if ($email != ''): ?>
        <li class="email"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
    <?php endif ?>
</ul>
