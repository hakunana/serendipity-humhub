<?php
/**
 * @var \humhub\modules\user\models\User $contentContainer
 * @var bool $showProfilePostForm
 */
use humhub\libs\Html;
use yii\helpers\Url;
?>
<script>
    removeActivitiesDiv();
</script>
<div class="container">
    <!-- START: new search form-->

    <div class = "row">
        <div class="nav col-md-offset-3 col-md-6 nav-search">
            <?= Html::beginForm(Url::to(['//search/search/index/']), 'GET'); ?>
            <div class="form-group form-group-search list-inline">
                <i class="fa fa-search" aria-hidden="true"></i>
                <?= Html::textInput('SearchForm[keyword]', '', array('placeholder' => Yii::t('base', 'Search'), 'class' => 'form-control form-search', 'id' => 'search-input-field')); ?>
                <?= Html::submitButton(Yii::t('base', 'Search'), array('class' => 'btn btn-default btn-sm form-button-search ')); ?>
            </div>
            <?= Html::endForm(); ?>
        </div>
    </div>

    <!-- END: new search form-->
    <div class="row">
        <div class="col-md-12">
            <?= \humhub\modules\dashboard\widgets\DashboardContent::widget(); ?>
        </div>

        <!--    START: Commented Out from standard HumHub-Theme    -->
<!--        <div class="col-md-4 layout-sidebar-container">
            <?php
/*            echo \humhub\modules\dashboard\widgets\Sidebar::widget([
                'widgets' => [
                    [
                        \humhub\modules\directory\widgets\NewMembers::className(),
                        ['showMoreButton' => true],
                        ['sortOrder' => 300]
                    ],
                    [
                        \humhub\modules\directory\widgets\NewSpaces::className(),
                        ['showMoreButton' => true],
                        ['sortOrder' => 400]
                    ],
                ]
            ]);
            */?>
        </div>-->
        <!--    END: Commented Out from standard HumHub-Theme    -->
    </div>
</div>
