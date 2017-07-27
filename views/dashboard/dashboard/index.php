<?php
/**
 * @var \humhub\modules\user\models\User $contentContainer
 * @var bool $showProfilePostForm
 */
use humhub\libs\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use humhub\modules\search\models\forms\SearchForm;
?>
<!-- @Stefano Start -->
<script>
    if(!document.getElementById("#space_search"))
    {
        $("#index_search").show();
    };

    // reset navbar activities container to dashboard level
    removeActivitiesDiv();
</script>
<!-- @Stefano End -->
<div class="container">
    <!-- START: new search form-->

    <div class = "row">

        <div id="index_search" class="nav col-md-offset-3 col-md-6 nav-search" style="display: none">
            
            <?= Html::beginForm(Url::to(['//search/search/index/']), 'GET'); ?>
            <div class="form-group form-group-search">
                <?= Html::textInput('SearchForm[keyword]', '', array('placeholder' => Yii::t('base', 'Search'), 'class' => 'form-control form-search', 'id' => 'search-input-field')); ?>
                <?= Html::submitButton(Yii::t('base', 'Search'), array('class' => 'btn btn-default btn-sm form-button-search ')); ?>
            </div>
            <?= Html::endForm(); ?>
        </div>
    </div>

    <!-- END: new search form-->
    <div class="row">

        <div class="col-md-12 layout-content-container">
            <?= \humhub\modules\dashboard\widgets\DashboardContent::widget([
                'contentContainer' => $contentContainer,
                'showProfilePostForm' => $showProfilePostForm
            ])?>
        </div>

    </div>
</div>
