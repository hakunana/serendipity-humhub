<?php

use \yii\helpers\Html;
use \yii\helpers\Url;
?>
<?php if (Yii::$app->user->isGuest): ?>
    <a href="#" class="btn btn-enter" data-action-click="ui.modal.load" data-action-url="<?= Url::toRoute('/user/auth/login'); ?>">
        <?php if (Yii::$app->getModule('user')->settings->get('auth.anonymousRegistration')): ?>
            <?= Yii::t('UserModule.base', 'Sign in / up'); ?>
        <?php else: ?>
            <?= Yii::t('UserModule.base', 'Sign in'); ?>
        <?php endif; ?>
    </a>
<?php else: ?>
    <ul class="nav">
        <li class="dropdown account">
            <a href="#" id="account-dropdown-link" class="dropdown-toggle" data-toggle="dropdown">

                <?php if ($this->context->showUserName): ?>
                    <div class="user-title">
                        <img id="user-account-image" class="img-rounded user-account-image" style="width: 100px; height: 100px;"
                         src="<?= Yii::$app->user->getIdentity()->getProfileImage()->getUrl(); ?>"
                         />
                         <div class="col-lg-12">
                             <strong><?= Html::encode(Yii::$app->user->getIdentity()->displayName); ?></strong><br/><span class="truncate"><?= Html::encode(Yii::$app->user->getIdentity()->profile->title); ?></span>
                        </div>
                    </div>
                <?php endif; ?>


                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu pull-left">
                <?php foreach ($this->context->getItems() as $item): ?>
                    <?php if ($item['label'] == '---'): ?>
                        <li class="divider"></li>
                        <?php else: ?>
                        <li>
                            <a <?= isset($item['id']) ? 'id="' . $item['id'] . '"' : '' ?> href="<?= $item['url']; ?>" <?= isset($item['pjax']) && $item['pjax'] === false ? 'data-pjax-prevent' : '' ?>>
                                <?= $item['icon'] . ' ' . $item['label']; ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </li>
    </ul>
<?php endif; ?>