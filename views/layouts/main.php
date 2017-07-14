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
        <style>
body {
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
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

<!--            <div class="nav col-md-12" id="search-menu-nav">
                <?php /*echo \humhub\widgets\TopMenuRightStack::widget(); */?>
            </div>-->
          <span style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
        <?= $content; ?>

        <?php $this->endBody() ?>
    </body>
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
</script>
</html>
<?php $this->endPage() ?>
