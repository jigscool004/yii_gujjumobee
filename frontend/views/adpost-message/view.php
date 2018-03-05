<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment"></span> Messages
                </div>
                <div class="panel-collapse " id="collapseOne">
                    <div class="panel-body">
                        <ul class="chat">
                            <?php
                            foreach ($model as $key => $adpostMessage) {
                                    //$position = ($adpostMessage->is_sent == 1) ? 'right' :'left';
                                    if ($adpostMessage->is_sent == 1) {
                                        $position = 'right';
                                        $rposition = 'left';
                                    } else {
                                        $position = 'left';
                                        $rposition = 'right';
                                    }

                                ?>
                                <li class="<?=$position;?> clearfix"><span class="chat-img pull-<?=$position;?>">
                            <img src="http://placehold.it/50/55C1E7/fff&text=<?php echo substr($adpostMessage->adpostUserCreatedBy->name,0,1)?>" alt="User Avatar" class="img-circle"/>
                        </span>
                                    <div class="chat-body clearfix">


                                        <p class="primary-font pull-<?=$position;?> clearfix">
                                            <?php echo $adpostMessage->message?>
                                        </p>
                                        <div class="clearfix"></div>
                                        <div class="headers ">
                                                <small class="pull-<?=$position;?> text-muted">
                                                <span class="glyphicon glyphicon-time"></span>
                                                <?php echo \common\components\Commoncontroller::time_elapsed_string($adpostMessage->created_on)?>
                                            </small>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <input id="btn-input" type="text" class="form-control input-sm"
                                   placeholder="Type your message here..."/>
                            <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

