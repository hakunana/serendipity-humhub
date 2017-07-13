<?php

use yii\helpers\Html;
?>

<ul id="top-menu-nav" class="nav nav-pills nav-stacked nav-space-chooser">

    <?php foreach ($this->context->getItems() as $item) : ?>
        <li class="<?php if ($item['isActive']): ?>active<?php endif; ?> <?php
        if (isset($item['id'])) {
            echo $item['id'];
        }
        ?>">
            <?php echo Html::a($item['icon'] . " " . $item['label'], $item['url'], $item['htmlOptions']); ?>
        </li>
    <?php endforeach; ?>
</ul>
