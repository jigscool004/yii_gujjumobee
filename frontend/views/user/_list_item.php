<?php
/**
 * Created by PhpStorm.
 * User: Jigar Kumar
 * Date: 1/28/2018
 * Time: 4:58 PM
 */
use yii\helpers\Html;
use yii\helpers\Url;

$firstPhotoName = isset($model->adpostPhotos[0]->save_name) ? $model->adpostPhotos[0]->save_name : '';
$filePath = $model->getFileUrl($model);
//var_dump();
?>

    <div class="category-grid-box-1">
        <div class="image">
            <img class="img-responsive" src="<?php echo $filePath . '/' . $firstPhotoName ?>" alt="<?php echo $model->adtitle;
            ?>">
            <div class="ribbon popular"></div>
            <div class="price-tag">
                <div class="price"><span><?php echo $model->price ?></span></div>
            </div>
        </div>
        <div class="short-description-1 clearfix">
            <div class="category-title"> <span><a href="#"><?php echo $model->mobileCategory->name ?></a></span> </div>
            <h3><?php echo Html::a($model->adtitle,['adpost/' . $model->id])?></h3>
        </div>
        <div class="ad-info-1">
            <ul>
                <li> <i class="fa fa-map-marker"></i><a href="#"><?php echo $model->adpostCity->name ?></a> </li>
                <li> <i class="fa fa-clock-o"></i><?php echo date('d-m-Y',strtotime($model->created_on)) ?></li>
            </ul>
        </div>
    </div>

