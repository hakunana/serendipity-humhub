<?php
/* @var $this \yii\web\View */
/* @var $content string */
\humhub\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?php echo $this->pageTitle; ?></title>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, target-densitydpi=device-dpi">
        <?php $this->head() ?>
        <?= $this->render('head'); ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        
            <div class="col-lg-12 topbar-brand hidden-xs">
                        <?php echo \humhub\widgets\SiteLogo::widget(); ?>
            </div>

            <div id="second-panel" class="second-panel col-lg-12 ">
            <?php
                    echo \humhub\widgets\NotificationArea::widget(['widgets' => [
                            [\humhub\modules\notification\widgets\Overview::className(), [], ['sortOrder' => 10]],
                    ]]);
                ?>
                <?php echo \humhub\modules\user\widgets\AccountTopMenu::widget(); ?>

            </div>
            <div id="third-panel" class="third-panel ">
                blablala
            </div>
            <hr>
            <div id="space-chooser" class="space-chooser card">
                <ul class="nav" id="top-menu-nav">
                    <!-- load space chooser widget -->
                    <?php echo \humhub\modules\space\widgets\Chooser::widget(); ?>

                </ul>
            </div>
                <div id="recent_activities">
                </div>
        </div>

        <span style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
        <?= $content; ?>

        <?php $this->endBody() ?>
    </body>
    <script>
        $(window).load(reorder_spaces());
    </script>
</html>
<?php $this->endPage() ?>