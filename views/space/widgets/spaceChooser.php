<?php
/* @var $this \humhub\components\WebView */
/* @var $currentSpace \humhub\modules\space\models\Space */

use yii\helpers\Url;
use yii\helpers\Html;
use humhub\modules\space\widgets\SpaceChooserItem;

\humhub\modules\space\assets\SpaceChooserAsset::register($this);

$noSpaceView = '<div class="no-space"><i class="fa fa-dot-circle-o"></i><br>' . Yii::t('SpaceModule.widgets_views_spaceChooser', 'My spaces') . '<b class="caret"></b></div>';

$this->registerJsConfig('space.chooser', [
    'noSpace' => $noSpaceView,
    'remoteSearchUrl' =>  Url::to(['/space/browse/search-json']),
    'text' => [
        'info.remoteAtLeastInput' => Yii::t('SpaceModule.widgets_views_spaceChooser', 'To search for other spaces, type at least {count} characters.', ['count' => 2]),
        'info.emptyOwnResult' => Yii::t('SpaceModule.widgets_views_spaceChooser', 'No member or following spaces found.'),
        'info.emptyResult' => Yii::t('SpaceModule.widgets_views_spaceChooser', 'No result found for the given filter.'),
    ],
]);
?>

<li>
    <ul>
        <li class="divider"></li>
        <li>
            <!-- @stefano changes Start -->
            <!--
                Added id="space-menu-spaces" to DIV as a reference point for JScript reorder_spaces function
            -->

            <ul class="media-list notLoaded" id="space-menu-spaces">
                <?php foreach ($memberships as $membership): ?>
                    <?= SpaceChooserItem::widget(['space' => $membership->space, 'updateCount' => $membership->countNewItems(), 'isMember' => true]); ?>
                <?php endforeach; ?>
                <?php foreach ($followSpaces as $followSpace): ?>
                    <?= SpaceChooserItem::widget(['space' => $followSpace, 'isFollowing' => true]); ?>
                <?php endforeach; ?>
            </ul>
            <!-- @stefano changes End -->
        </li>

        <?php if ($canCreateSpace): ?>
            <li>
                <div>
                    <a href="#" class="btn btn-info col-md-12" data-action-click="ui.modal.load" data-action-url="<?= Url::to(['/space/create/create']) ?>">
                        <?= Yii::t('SpaceModule.widgets_views_spaceChooser', 'Create new space') ?>
                    </a>
                </div>
            </li>
        <?php endif; ?>
    </ul>
</li>
