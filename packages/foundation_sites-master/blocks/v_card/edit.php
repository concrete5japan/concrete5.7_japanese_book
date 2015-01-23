<?php  defined('C5_EXECUTE') or die('Access Denied.'); ?>

<div class="form-group">

    <?php echo $form->label('fullName', 'Full Name:'); ?>
    <?php echo $form->text('fullName', $fullName); ?>

    <?php echo $form->label('streetAdress', 'Street:'); ?>
    <?php echo $form->text('streetAdress', $streetAdress); ?>

    <?php echo $form->label('locality', 'Locality:'); ?>
    <?php echo $form->text('locality', $locality); ?>

    <?php echo $form->label('state', 'State:'); ?>
    <?php echo $form->text('state', $state); ?>

    <?php echo $form->label('zip', 'Zip:'); ?>
    <?php echo $form->text('zip', $zip); ?>

    <?php echo $form->label('email', 'Email:'); ?>
    <?php echo $form->text('email', $email); ?>

</div>
