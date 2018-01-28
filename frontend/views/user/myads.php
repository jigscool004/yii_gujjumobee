<?php
/**
 * Created by PhpStorm.
 * User: Jigar Kumar
 * Date: 1/28/2018
 * Time: 4:55 PM
 */
use yii\widgets\ListView;
use yii\widgets\LinkPager;

?>
<style>
    .category-grid-box-1 .image img{height: 350px;}
</style>
<div class="posts-masonry" style="position: relative; ">
    <?php

    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'tag' => 'div',
            'class' => 'list-wrapper',
            'id' => 'list-wrapper',
        ],
        'itemOptions' => ['class' => 'col-md-6 col-sm-6 col-xs-12'],
        'layout' => "<div class='col-md-12 ' style='margin-bottom: 10px;'><div class='clearfix pull-right'>{summary}</div></div>\n{items}
                       <div class='clearfix'></div>",
        'itemView' => '_list_item',
    ]);

    echo LinkPager::widget([
        'pagination' => $dataProvider->pagination
    ]);
    ?>

</div>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>