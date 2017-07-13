<?php
use humhub\modules\content\components\ContentContainerController;
use humhub\modules\space\models\Space;
?>
<?php if (Yii::$app->controller instanceof ContentContainerController && Yii::$app->controller->contentContainer instanceof Space) : ?>

    <?php foreach ($this->context->getItemGroups() as $group) : ?>

        <?php $items = $this->context->getItems($group['id']); ?>
        <?php if (count($items) == 0) continue; ?>
        <?php foreach ($items as $item) : ?>
            <li class="dropdown">

                <?php echo \yii\helpers\Html::a($item['icon'] . " <span class=\"space-module-entries\">" . $item['label'] . "</span>", $item['url'], $item['htmlOptions']); ?>

            </li>
        <?php endforeach; ?>

    <?php endforeach; ?>

<?php else : ?>

    <!-- start: list-group navi for large devices -->
    <div class="panel panel-default">
        <?php foreach ($this->context->getItemGroups() as $group) : ?>

            <?php $items = $this->context->getItems($group['id']); ?>
            <?php if (count($items) == 0) continue; ?>

            <?php if ($group['label'] != "") : ?>
                <div class="panel-heading"><?php echo $group['label']; ?></div>
            <?php endif; ?>
            <div class="list-group">
                <?php foreach ($items as $item) : ?>
                    <?php $item['htmlOptions']['class'] .= " list-group-item"; ?>
                    <?php echo \yii\helpers\Html::a($item['icon'] . "<span>" . $item['label'] . "</span>", $item['url'], $item['htmlOptions']); ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

    </div>
    <!-- end: list-group navi for large devices -->

<?php endif; ?>