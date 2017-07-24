<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 24.07.2017
 * Time: 17:48
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php if ($mode == \humhub\modules\comment\widgets\CommentLink::MODE_POPUP): ?>
    <a href="<?php echo Url::to(['/comment/comment/show', 'contentModel' => $objectModel, 'contentId' => $objectId, 'mode' => 'popup']); ?>"
       class=""
       title="" data-target="#globalModal"
       data-original-title="Comments">Comments (<?php echo $this->context->getCommentsCount(); ?>)</a>
<?php else: ?>
    <?php
    if (Yii::$app->user->isGuest) {
        echo Html::a(Yii::t('CommentModule.widgets_views_link', "Comment"), Yii::$app->user->loginUrl, array('data-target' => '#globalModal'));
    } else {
        echo Html::a(Yii::t('CommentModule.widgets_views_link', "Comment"), "#", array('onClick' => "$('#comment_" . $id . "').show();$('#comment_create_form_" . $id . "').show();$('#newCommentForm_" . $id . "_contenteditable').focus();$('#wallStream').masonry('layout');return false;"));
    }
    ?>
<?php endif;
?>