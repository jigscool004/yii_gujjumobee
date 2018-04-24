<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AdpostMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adpost Messages';
?>
<div class="profile-section margin-bottom-20">
    <div class="profile-tabs">
        <?php echo $this->render('_tabmenu') ?>
        <div class="tab-content">
            <div id="edit" class="profile-edit tab-pane fade active in">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\CheckboxColumn'],
                        // ['class' => 'yii\grid\SerialColumn'],

                        // 'id',
                        [
                            'label' => 'User',
                            'value' => function ($model) {
                                return $model->adpostUser->name . " ({$model->totalMsg})";
                            }
                        ],
                        [
                            'label' => 'Ad Message',
                            'format' => 'raw',
                            'attribute' => 'message',
                            'value' => function($data) {
                                //$messageString = '';
                                $messageString = "<p>{$data->adpost->adtitle}</p> ";
                                $messageString .= "<span>" .substr($data->message,0,100) . "</span>" ;
//                    $url = Yii::$app->urlManager->createUrl('/adpost-message/view/',
//                                    [
//                                            'adpost_id' => $data->adpost_id,
//                                            'user_id' => $data->user_id
//                                    ]);
                                return Html::a($messageString,Url::to(['adpost-message/view/' , 'id' => $data->adpost_id,'user_id' => $data->user_id],true));
                            } ,

                        ],
                        [
                            'attribute' => 'created_on',
                            'label' => 'Date',
                            'value' => function($data) {
                                //echo $data->createdOn;
                                return \common\components\Commoncontroller::time_elapsed_string($data->createdOn);
                            }
                        ]
                        //'message:ntext',
                        //'is_sent',
                        //'is_deleted',
                        //'is_archived',
                        //'created_on',

//            ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>



