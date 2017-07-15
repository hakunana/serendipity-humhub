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
        
            <div class="topbar-brand hidden-xs">
                        <?php echo \humhub\widgets\SiteLogo::widget(); ?>
            </div>

            <div id="second-panel" class="second-panel">
                <?php echo \humhub\modules\user\widgets\AccountTopMenu::widget(); ?>

            </div>
            <div id="third-panel" class="third-panel">
                <?php
                    echo \humhub\widgets\NotificationArea::widget(['widgets' => [
                            [\humhub\modules\notification\widgets\Overview::className(), [], ['sortOrder' => 10]],
                    ]]);
                ?>
            </div>
            <hr>
            <div id="space-chooser" class="space-chooser card">
                <ul class="nav" id="top-menu-nav">
                    <!-- load space chooser widget -->
                    <?php echo \humhub\modules\space\widgets\Chooser::widget(); ?>

                </ul>
            </div>
        </div>

<<<<<<< HEAD
<!--            <div class="nav col-md-12" id="search-menu-nav">
                <?php /*echo \humhub\widgets\TopMenuRightStack::widget(); */?>
            </div>-->
          <span style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
=======
        <span style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
>>>>>>> menu-integration
        <?= $content; ?>

        <?php $this->endBody() ?>
    </body>
<<<<<<< HEAD
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "15%";
            // document.getElementByID("layout-content").style.width="85%";
            document.getElementById("layout-content").style.marginLeft = "15%";
            
            // document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0%";
            document.getElementById("layout-content").style.marginLeft = "0%";
            // document.getElementById("mySidenav").style.width = "0";
            // document.getElementById("main").style.marginLeft= "0";
            document.body.style.backgroundColor = "white";
        }
=======
    <script type="text/javascript">
        var element = document.getElementById('mySidenav');
        new ResizeSensor(element, function() {
            $('.outerdivgrid').masonry('layout');
           // console.log("RELOAD ELEMENTS");
            //var elems = $('.masonrygrid').masonry('getItemElements');
            //console.log(elems);
        });
>>>>>>> menu-integration
</script>

</html>
<?php $this->endPage() ?>
