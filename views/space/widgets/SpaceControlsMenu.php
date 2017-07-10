<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2016 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 *
 */


use Yii;

/**
 * The Admin Navigation for spaces
 *
 * @author Luke
 * @package humhub.modules_core.space.widgets
 * @since 0.5
 */
class SpaceControlsMenu extends \humhub\widgets\BaseMenu
{

    public $space;
    public $template = "@humhub/widgets/views/leftNavigation";

    public function init()
    {
        $space = $this->context->contentContainer;
        $this->addItemGroup(array(
            'id' => 'admin',
            'label' => Yii::t('SpaceModule.widgets_SpaceAdminMenuWidget', '<i class="fa fa-cog"></i>'),
            'sortOrder' => 100,
        ));
?>
<div class="container space-layout-container">
    <div class="row">
        <div class="col-md-12">
            <?php echo humhub\modules\space\widgets\Header::widget(['space' => $space]); ?>

</div>
</div>
<div class="row">
    <div class="col-md-2 layout-nav-container">
        <?php echo \humhub\modules\space\widgets\Menu::widget(['space' => $space]); ?>
        <br>
    </div>

    <?php if (isset($this->context->hideSidebar) && $this->context->hideSidebar) : ?>
        <div class="col-md-10 layout-content-container">
            <?= $content ='';
            \humhub\modules\space\widgets\SpaceContent::widget([
                'contentContainer' => $space,
                'content' => $content
            ]) ?>
        </div>
    <?php else: ?>
        <div class="col-md-7 layout-content-container">
            <?= $content ='';
            \humhub\modules\space\widgets\SpaceContent::widget([
                'contentContainer' => $space,
                'content' => $content
            ]) ?>
        </div>
        <div class="col-md-3 layout-sidebar-container">
            <?php
            echo \humhub\modules\space\widgets\Sidebar::widget(['space' => $space, 'widgets' => [
                [\humhub\modules\activity\widgets\Stream::className(), ['streamAction' => '/space/space/stream', 'contentContainer' => $space], ['sortOrder' => 10]],
                [\humhub\modules\space\modules\manage\widgets\PendingApprovals::className(), ['space' => $space], ['sortOrder' => 20]],
                [\humhub\modules\space\widgets\Members::className(), ['space' => $space], ['sortOrder' => 30]]
            ]]);
            ?>
        </div>
    <?php endif; ?>
</div>
</div>
        <?php


        return parent::init();
    }

}

?>
