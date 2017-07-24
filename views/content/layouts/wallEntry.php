<?php
/**
 * WallEntry used in a stream and the activity stream.
 *
 * @property Mixed $object a content object like Post
 * @property Content $entry the wall entry to display
 * @property String $content the output of the content object (wallOut)
 *
 * @package humhub.modules_core.wall
 * @since 0.5
 */
?>
<?php
//@Stefano start
// wall-entry DIV acts as a container for a single wall entry tile
// added class innerdivgrid for css formatting purposes
$cssClass = ($entry->pinned) ? 'wall-entry pinned-entry' : 'wall-entry';
$isActivity = $entry->object_model == humhub\modules\activity\models\Activity::className();
//@Stefano end
?>

<?php if (!$isActivity) : ?>

    <div class="<?= $cssClass ?>" data-stream-entry data-stream-pinned="<?= $entry->pinned ?>"
         data-action-component="stream.StreamEntry" data-content-key="<?= $entry->id; ?>" >

<?php endif; ?>

<?php echo $content; ?>

<?php if (!$isActivity) : ?>
    </div>
<?php endif; ?>