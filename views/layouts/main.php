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
            <div class="row  topbar-brand ">
                <div class="col-lg-12 hidden-xs">
                            <?php echo \humhub\widgets\SiteLogo::widget(); ?>
                </div>
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
                
            </div>
            <hr>
            <div id="space-chooser" class="space-chooser card">

                <ul class="nav" id="top-menu-nav">
                    <!-- load space chooser widget -->
                    <?php echo \humhub\modules\space\widgets\Chooser::widget(); ?>

                </ul>
            </div>

            <!-- @Stefano Start -->

            <!-- START TODO REFACTORING: Following logic should be externalized in controller -->

            <!-- recent_activities DIV used as container for SPACES SPECIFIC list of activities-->
            <!-- This div gets populated with according space-specific data when entering a space-->
            <div id="recent_activities"></div>

            <!-- dashboard_activities DIV lists all recent activities on DASHBOARD LEVEL ONLY -->
            <!-- This div gets hidden when entering a space, as recent_activities DIV takes over -->
            <div id="dashboard_activities">
                <?php
                    echo \humhub\modules\dashboard\widgets\Sidebar::widget([
                        'widgets' => [
                            [\humhub\modules\activity\widgets\Stream::className(),
                                ['streamAction' => '/dashboard/dashboard/stream'],
                                ['sortOrder' => 150]
                            ]
                        ]
                    ]);
                ?>
            </div>
            <!-- END TODO REFACTORING -->

        </div>

        <span style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
        <?= $content; ?>

        <?php $this->endBody() ?>
    </body>
    <script type="text/javascript">
        // Reorder list of spaces in sidebar according to largest #of new entries since last visit
        $(window).load(reorder_spaces());

        var element = document.getElementById('mySidenav');
        new ResizeSensor(element, function() {
            $('#wallStream').masonry('layout');
        });

        /*
        TODO: Refactor code by implementing own module for correct masonry layout
        A lot of issues are to be faced with current implementation of masonry.
        The main issue is, that there are numerous actions which should trigger the re-layout of the masonry grid.

        E.g.:
        As described above, the open navigation action implicates a reload of the masonry layout.
        Therefore a js library has been introduced, which is able to listen on resize of specific DIV.

        One envisioned solution therefore, was to extend this listener, to listen on any resize-events of the actual wall entry panels.
        Unfortunately the listener does not work. It is to be assumed, that the triggering does not work, as the wall entries are ActiveForm elements and thus AJAX-driven special components.

        Code example as envisioned (following code snippet is not working):
        ----------------------------------
        var comment_element = $('.panel-body');
        new ResizeSensor(comment_element, function() {
        $('#wallStream').masonry('layout');
        });
        -----------------------------------

        As the masonry layout is quite invasive, it requires subsequently a more subtle implementation via extra module.
        This is described in the Javascript API (file protected/humhub/docs/guide/developer/javascript.md).

        Idea: Create an own "masonry module" with additional action bindings and controller.
        So for example the default action binding attribute data-action-change could be added to all elements in focus and used for triggerng the masonry grid reload layout function.

        Example - add data-action-change="masonrymodule.reorder" to main wall-enttry panel div:
        <div class="panel panel-default innerdivgrid col-lg-4 col-md-6 wall_[...] data-action-change="masonrymodule.reorder">

        The js function reorder() in the module js resource would then call the $('#wallStream').masonry('layout') function of masonry.

        Until then, there are just workarounds to solve various issues, e.g. via triggering the masonry-layout function onclick()
           but delaying it for a couple of seconds so the page can first reload the section before the grid gets refreshed.
         */
    </script>
    <!-- @Stefano End -->
</html>
<?php $this->endPage() ?>