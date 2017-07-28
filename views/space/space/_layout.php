<?php
/**
 * @var \humhub\modules\space\models\Space $space
 * @var string $content
 */

$space = $this->context->contentContainer;
?>
<div class="container-fluid space-layout-container">
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
    <!-- @stefano changes Start -->
    <!--
        sidenav_content_hidden DIV calls space specific content data such as activities for example.
        sidenav_content_hidden DIV gets cloned into main.php -> recent_activities DIV.
        Controller is setup so that space specific content is mostly exclusively loaded correctly if DIV is child Element of stream.php -> wallStream DIV.
        So in order to receive appropriate data without changing the controller, the DIV needs first to be loaded here and afterwards the data is cloned out of stream.php -> wallStream DIV.
        clone is removed each time when changing to another site/space and recreated in order to stay always up-to-date with the correct space and content.
    -->
    <div class="sidenav_content_hidden" style="display: none">
        <?php
        echo \humhub\modules\space\widgets\Sidebar::widget(['space' => $space, 'widgets' => [
            [\humhub\modules\activity\widgets\Stream::className(), ['streamAction' => '/space/space/stream', 'contentContainer' => $space], ['sortOrder' => 10]],
            [\humhub\modules\space\modules\manage\widgets\PendingApprovals::className(), ['space' => $space], ['sortOrder' => 20]],
            [\humhub\modules\space\widgets\Members::className(), ['space' => $space], ['sortOrder' => 30]]
        ]]);
        ?>
    </div>
    <script>
        //Load space specific activities list from sidenav_content_hidden DIV
        loadActivitiesDiv();
    </script>
    <!-- @stefano changes End -->
</div>
