<?php
/**
 * @var $this \humhub\components\View
 * @var $currentSpace \humhub\modules\space\models\Space
 * @var \humhub\modules\space\models\Space $space
 * @var string $content
 *
 * include ('SpaceControlsMenu.php');
 * include ('Menu.php');
 */
$content = "";
use yii\helpers\Html;

if ($space->isAdmin()) {
    $this->registerJsFile('@web-static/resources/space/spaceHeaderImageUpload.js');
    $this->registerJsVar('profileImageUploaderUrl', $space->createUrl('/space/manage/image/upload'));
    $this->registerJsVar('profileHeaderUploaderUrl', $space->createUrl('/space/manage/image/banner-upload'));
}
?>

    <div class="col-md-12 panel panel-body panel-profile">

            <!-- start: Space Header -->

                <div class="col-md-12 row">

                    <!-- show picture -->
                    <div class="image-upload-container profile-user-photo-container pull-left col-md-2" style="width: 140px; height: 140px;">

                            <?php if ($space->profileImage->hasImage()) : ?>
                                <!-- profile image output-->
                                <a data-ui-gallery="spaceHeader" href="<?= $space->profileImage->getUrl('_org'); ?>">
                                    <?php echo \humhub\modules\space\widgets\Image::widget(['space' => $space, 'width' => 140]); ?>
                                </a>
                            <?php else : ?>
                                <?php echo \humhub\modules\space\widgets\Image::widget(['space' => $space, 'width' => 140]); ?>
                            <?php endif; ?>

                            <!-- check if the current user is the profile owner and can change the images -->
                            <?php if ($space->isAdmin()) : ?>
                                <form class="fileupload" id="profilefileupload" action="" method="POST" enctype="multipart/form-data"
                                      style="position: absolute; top: 0; left: 0; opacity: 0; height: 140px; width: 140px;">
                                    <input type="file" name="spacefiles[]">
                                </form>

                                <div class="image-upload-loader" id="profile-image-upload-loader" style="padding-top: 60px;">
                                    <div class="progress image-upload-progess-bar" id="profile-image-upload-bar">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="00"
                                             aria-valuemin="0"
                                             aria-valuemax="100" style="width: 0%;">
                                        </div>
                                    </div>
                                </div>

                                <div class="image-upload-buttons" id="profile-image-upload-buttons">
                                    <a href="#" onclick="javascript:$('#profilefileupload input').click();" class="btn btn-info btn-sm"><i
                                                class="fa fa-cloud-upload"></i></a>
                                    <a id="profile-image-upload-edit-button"
                                       style="<?php
                                       if (!$space->getProfileImage()->hasImage()) {
                                           echo 'display: none;';
                                       }
                                       ?>"
                                       href="<?php echo $space->createUrl('/space/manage/image/crop'); ?>"
                                       class="btn btn-info btn-sm" data-target="#globalModal" data-backdrop="static"><i
                                                class="fa fa-edit"></i></a>
                                    <?php
                                    echo humhub\widgets\ModalConfirm::widget(array(
                                        'uniqueID' => 'modal_profileimagedelete',
                                        'linkOutput' => 'a',
                                        'title' => Yii::t('SpaceModule.widgets_views_deleteImage', '<strong>Confirm</strong> image deleting'),
                                        'message' => Yii::t('SpaceModule.widgets_views_deleteImage', 'Do you really want to delete your profile image?'),
                                        'buttonTrue' => Yii::t('SpaceModule.widgets_views_deleteImage', 'Delete'),
                                        'buttonFalse' => Yii::t('SpaceModule.widgets_views_deleteImage', 'Cancel'),
                                        'linkContent' => '<i class="fa fa-times"></i>',
                                        'cssClass' => 'btn btn-danger btn-sm',
                                        'style' => $space->getProfileImage()->hasImage() ? '' : 'display: none;',
                                        'linkHref' => $space->createUrl("/space/manage/image/delete", array('type' => 'profile')),
                                        'confirmJS' => 'function(jsonResp) { resetProfileImage(jsonResp); }'
                                    ));
                                    ?>
                                </div>
                            <?php endif; ?>

                        </div>

                    <div class="col-md-1">
                    </div>

                    <!-- show user name and title -->
                    <div class="img-profile-data col-md-5">
                        <h2 class="space"><?php echo Html::encode($space->name); ?></h2>

                        <h1 class="space"><?php echo Html::encode($space->description); ?></h1>
                    </div>

                    <!-- Show Menu DD Icons -->
                    <div class="controls controls-header col-md-4 pull-right">

                        <!-- Apps Dropdown -->
                        <?php echo \humhub\modules\space\widgets\Menu::widget([
                            'space' => $space,
                            'template' => '@humhub/widgets/views/dropdownNavigation'
                        ]);
                        ?>

                        <!-- Show Invite Button -->
                        <?php echo humhub\modules\space\widgets\HeaderControls::widget(['widgets' => [
                            [\humhub\modules\space\widgets\InviteButton::className(), ['space' => $space], ['sortOrder' => 10]],
                            [\humhub\modules\space\widgets\MembershipButton::className(), ['space' => $space], ['sortOrder' => 20]],
                            [\humhub\modules\space\widgets\FollowButton::className(), [
                                'space' => $space,
                                'followOptions' => ['class' => 'btn btn-primary'],
                                'unfollowOptions' => ['class' => 'btn btn-info']],
                                ['sortOrder' => 30]]
                        ]]);
                        ?>

                        <!-- Settings Dropdown -->
                        <?=
                        humhub\modules\space\widgets\HeaderControlsMenu::widget([
                            'space' => $space,
                            'template' => '@humhub/widgets/views/dropdownNavigation'
                        ]);
                        ?>
                    </div>
                </div>

    </div>


<!-- start: Error modal -->
<div class="modal" id="uploadErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-extra-small animated pulse">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"
                    id="myModalLabel"><?php echo Yii::t('SpaceModule.widgets_views_profileHeader', '<strong>Something</strong> went wrong'); ?></h4>
            </div>
            <div class="modal-body text-center">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"
                        data-dismiss="modal"><?php echo Yii::t('SpaceModule.widgets_views_profileHeader', 'Ok'); ?></button>
            </div>
        </div>
    </div>
</div>
