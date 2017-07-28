<?php
/* @var $space \humhub\modules\space\models\Space */

use yii\helpers\Html;
use humhub\libs\Helpers;
?>
<!-- @stefano changes Start -->
<!--
    1) Added attribute update_count_value for JScript reorder_spaces function
    2) Added class="spacechooser_parent" for JScript reorder_spaces function
    3) Added container spacechooser_desc DIV for mouse over behaviour
    4) Added onmouseenter / onmouseleave functions to spacechooser_parent DIV for simulating hover behaviour

    Explanation:
    -> Entries since last visit
        spacechooser_parent represents a space bar in the side nav. Space shall be ordered by highest # of new entries since last visit.
        Ordering is done via JScript reorder_spaces function which accesses attribute update_count_value for that purpose. update_count_value is populated via php on server side on load.
        Implications: No AJAX function, so # of new entries since last visit are only updated on complete side reload.
        Therefore TODO: update_count_value and $updateCount to be AJAX-ified (dynamic update when entering space resp. on new entry and not only on full sire reload)

    -> Hover
        The subtitle of a space shall be shown on mousehover.
        Hovering is being simulated via onmouseenter and onmouseleave actions, as the simples way to implement it on view side was to include the subtitle on load in php and just do not display it.
        onmouseenter the spacechooser_desc DIV gets shown and vice versa
-->
<li class="spacechooser_parent" <?= (!$visible) ? ' style="display:none"' : '' ?> update_count_value="<?=$updateCount;?>" data-space-chooser-item <?= $data ?> data-space-guid="<?= $space->guid; ?>" onmouseenter="$(this).find('#spacechooser_desc').show();" onmouseleave="$(this).find('#spacechooser_desc').hide();">
    <a href="<?php echo $space->getUrl(); ?>">
        <div class="media">
            <?=
            \humhub\modules\space\widgets\Image::widget([
                'space' => $space,
                'width' => 24,
                'htmlOptions' => [
                    'class' => 'pull-left space-profile-acronym-1 space-acronym',
            ]]);
            ?>
            <div class="media-body">
                <strong class="space-name"><?php echo Html::encode($space->name); ?></strong>
                <div data-message-count="<?= $updateCount; ?>" class="badge badge-space messageCount pull-right tt" title="<?= Yii::t('SpaceModule.widgets_views_spaceChooserItem', '{n,plural,=1{# new entry} other{# new entries}} since your last visit', ['n' => $updateCount]); ?>"
                    <?php if ($updateCount==0) {
                        echo "style=\"display:none\"";
                    }
                    ?>>
                <?= $updateCount; ?>
                </div>
                <div id="spacechooser_desc" style="display: none"
                <br/>
                    <p><?php echo Html::encode(Helpers::truncateText($space->description, 60)); ?></p>
                </div>
            <!-- @stefano changes End -->
            </div>
        </div>
    </a>
</li>