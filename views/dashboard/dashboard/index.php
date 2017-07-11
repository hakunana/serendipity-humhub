<?php
/**
 * @var \humhub\modules\user\models\User $contentContainer
 * @var bool $showProfilePostForm
 */

?>

<div class="container">
    <div class="row">
        <div class="col-md-12 layout-content-container">
            <?= \humhub\modules\dashboard\widgets\DashboardContent::widget([
                'contentContainer' => $contentContainer,
                'showProfilePostForm' => $showProfilePostForm
            ])?>
        </div>

        <!--    START: Commented Out from standard HumHub-Theme    -->

        <!--<div class="col-md-4 layout-sidebar-container">
            <?php
/*            echo \humhub\modules\dashboard\widgets\Sidebar::widget([
                'widgets' => [
                    [
                        \humhub\modules\activity\widgets\Stream::className(),
                        ['streamAction' => '/dashboard/dashboard/stream'],
                        ['sortOrder' => 150]
                    ]
                ]
            ]);
            */?>
        </div>-->

        <!--    END: Commented Out from standard HumHub-Theme    -->
    </div>
</div>
