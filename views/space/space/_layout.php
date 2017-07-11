<?php
/**
 * @var \humhub\modules\space\models\Space $space
 * @var string $content
 */

$space = $this->context->contentContainer;
?>

<div class="container space-layout-container">
    <div class="row">
        <div class="col-md-12">
            <?php echo humhub\modules\space\widgets\Header::widget(['space' => $space]); ?>

        </div>
    </div>

    <div class="row">
        <!-- START remove space menu - to be added in space header and index / index_guest-->
<!--        <div class="col-md-2 layout-nav-container">
            <?php /*echo \humhub\modules\space\widgets\Menu::widget(['space' => $space]); */?>
            <br>
        </div>-->

        <!-- START remove space menu - to be added in space header and index / index_guest-->

        <!-- START new full-size content widget-->
        <div class="grid col-md-12 layout-content-container" data-masonry='{ "itemSelector": ".grid-item"}'>
            <?= \humhub\modules\space\widgets\SpaceContent::widget([
                'contentContainer' => $space,
                'content' => $content
            ]) ?>
        </div>
        <!-- END new full-size content widget-->

        <!-- START Commented out if/else for different sizes. No need as there is just one row with no more sidebars-->

        <!-- START Commented out if/else for different sizes. No need as there is just one row with no more sidebars-->

       <!-- <?php /*if (isset($this->context->hideSidebar) && $this->context->hideSidebar) : */?>
            <div class="col-md-10 layout-content-container">
                <?/*= \humhub\modules\space\widgets\SpaceContent::widget([
                    'contentContainer' => $space,
                    'content' => $content
                ]) */?>
            </div>
        <?php /*else: */?>
            <div class="col-md-7 layout-content-container">
                <?/*= \humhub\modules\space\widgets\SpaceContent::widget([
                    'contentContainer' => $space,
                    'content' => $content
                ]) */?>
            </div>-->


            <!-- END Commented out if/else for different sizes. No need as there is just one row with no more sidebars-->

            <!-- START Commented out right sidebar (activities etc...)-->

          <!--  <div class="col-md-3 layout-sidebar-container">
                <?php
/*              echo \humhub\modules\space\widgets\Sidebar::widget(['space' => $space, 'widgets' => [
                        [\humhub\modules\activity\widgets\Stream::className(), ['streamAction' => '/space/space/stream', 'contentContainer' => $space], ['sortOrder' => 10]],
                        [\humhub\modules\space\modules\manage\widgets\PendingApprovals::className(), ['space' => $space], ['sortOrder' => 20]],
                        [\humhub\modules\space\widgets\Members::className(), ['space' => $space], ['sortOrder' => 30]]
                ]]);
                */?>
            </div>-->
            <!-- END Commented out right sidebar (activities etc...)-->

<!--        --><?php //endif; ?>

        <!-- END Commented out if/else for different sizes. No need as there is just one row with no more sidebars-->

    </div>



</div>
