<?php  defined("C5_EXECUTE") or die("Access Denied."); ?>

<div class="form-group">
    <?php  echo $form->label('copyrightStart', t("Year copyright Started") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("This is the 4 digit year your copyright started. (optional)") . '"></i>');
    echo $form->text($view->field('copyrightStart'), $copyrightStart, array(
        'maxlength' => 4,
        ));
    ?>
</div>

<div class="form-group">
    <?php  echo $form->label('copyrightHolder', t("Copyright Holder") . ' <i class="fa fa-question-circle launch-tooltip" data-original-title="' . t("This is the name of the copyright holder.") . '"></i>');
    echo $form->text($view->field('copyrightHolder'), $copyrightHolder, array (
    'maxlength' => 70,
    ));
?>
</div>
