<?php

use yii\helpers\Html;

?>
<ul class="chat">
    <?php
    foreach ($model as $key => $adpostMessage) {
        //$position = ($adpostMessage->is_sent == 1) ? 'right' :'left';
        if ($adpostMessage->created_by == Yii::$app->user->getId()) {
            $position = 'right';
            $rposition = 'left';
        } else {
            $position = 'left';
            $rposition = 'right';
        }

        ?>
        <li class="<?= $position; ?> clearfix"><span class="chat-img pull-<?= $position; ?>">
                            <img src="http://placehold.it/50/f58936/fff&text=<?php echo substr($adpostMessage->adpostUserCreatedBy->name, 0, 1) ?>"
                                 alt="User Avatar" class="img-circle"/>
                        </span>
            <div class="chat-body clearfix">


                <p class="primary-font pull-<?= $position; ?> clearfix">
                    <?php echo $adpostMessage->message ?>
                </p>
                <div class="clearfix"></div>
                <div class="headers ">
                    <small class="pull-<?= $position; ?> text-muted">
                        <span class="glyphicon glyphicon-time"></span>
                        <?php echo \common\components\Commoncontroller::time_elapsed_string($adpostMessage->created_on) ?>
                    </small>
                </div>
            </div>
        </li>
        <?php
    }
    ?>
</ul>
