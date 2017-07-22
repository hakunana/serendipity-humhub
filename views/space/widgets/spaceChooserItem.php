<?php
/* @var $space \humhub\modules\space\models\Space */

use yii\helpers\Html;
use humhub\libs\Helpers;
?>

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
            </div>
        </div>
    </a>
</li>