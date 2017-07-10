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

            <div class="col-md-12 layout-content-container">
                <?= \humhub\modules\space\widgets\SpaceContent::widget([
                    'contentContainer' => $space,
                    'content' => $content
                ]) ?>
            </div>

    </div>
</div>
