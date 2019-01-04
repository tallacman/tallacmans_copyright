<?php  defined("C5_EXECUTE") or die("Access Denied.");
$thisYear = date("Y");
?>
<div class="ccm-tallacmans-copyright small"><span class="ccm-tallacmans-copyright-text"><?php  echo t('copyright'); ?> &copy;</span><span class="ccm-tallacmans-copyright-years">

<?php
    if (isset($copyrightStart) && trim($copyrightStart) != "" && trim($copyrightStart) !=$thisYear) {
        echo $copyrightStart;
        echo ' - ';
        echo date("Y ");
        echo '</span>';
    } else {
        echo date("Y ");
        echo '</span>';
    }

    if (isset($copyrightHolder) && trim($copyrightHolder) != "") { ?>
        <span class="ccm-tallacmans-copyright-holder"><?php echo h($copyrightHolder); ?></span>
    <?php
        }
    ?>
        <span class="ccm-tallacmans-copyright-rights">  &ndash; <?php  echo t('All rights reserved.'); ?></span>
</div>
