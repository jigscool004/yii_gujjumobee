<?php
/**
 * Created by PhpStorm.
 * User: Jigar Kumar
 * Date: 1/28/2018
 * Time: 4:55 PM
 */
use yii\widgets\ListView;
use yii\widgets\LinkPager;
$this->title = $title;
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


        $('.manage-adpost-archive').on('click',function (e) {
            e.preventDefault();
            var $this = $(this),
                isArchiveValue = $this.attr('data-key');
            dataString = {
                'adpost_id':$this.attr('data-id'),
                'is_archived' : isArchiveValue
            };

            bootbox.confirm({
                message: "Are you sure..?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result) {
                        $.ajax({
                            url: '<?php echo Yii::$app->urlManager->createUrl('adpost/managearchivestatus') ?>',
                            method: 'POST',
                            data:dataString,
                            //dataType: 'json',
                            success: function (data) {
                                if (data == 1) {
                                    newIsArchiveValue = isArchiveValue == 1 ? 0 : 1;
                                    title = isArchiveValue == 1 ? 'Mark as UnArchive' : 'Mark as Archive';
                                    $this.attr({
                                        'data-key' : newIsArchiveValue,
                                        'title' : title,
                                        'data-original-title':title
                                    });
                                    $iconI = $this.find('i');
                                    if ($iconI.hasClass('glyphicon-folder-open')) {
                                        $iconI.removeClass('glyphicon-folder-open').addClass('glyphicon-folder-close');
                                    } else if ($iconI.hasClass('glyphicon-folder-close')) {
                                        $iconI.removeClass('glyphicon-folder-close').addClass('glyphicon-folder-open');
                                    }
                                }
                            }
                        });
                    }
                }
            });

        });

        $('.manage-sale-status').on('click',function (e) {
            e.preventDefault();
            var $this = $(this),
                isSoldValue = $this.attr('data-key');
            dataString = {
                'adpost_id':$this.attr('data-id'),
                'is_sold' : isSoldValue
            };

            bootbox.confirm({
                message: "Are you sure..?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result) {
                        $.ajax({
                            url: '<?php echo Yii::$app->urlManager->createUrl('adpost/managestatus') ?>',
                            method: 'POST',
                            data:dataString,
                            //dataType: 'json',
                            success: function (data) {
                                if (data == 1) {
                                    newIsSoldValue = isSoldValue == 1 ? 0 : 1;
                                    title = isSoldValue == 1 ? 'Mark as Unsold' : 'Mark as sold';
                                    $this.attr({
                                        'data-key' : newIsSoldValue,
                                        'title' : title,
                                        'data-original-title':title
                                    });
                                    $iconI = $this.find('i');
                                    if ($iconI.hasClass('glyphicon-ok-circle')) {
                                        $iconI.removeClass('glyphicon-ok-circle').addClass('glyphicon-ban-circle');
                                    } else if ($iconI.hasClass('glyphicon-ban-circle')) {
                                        $iconI.removeClass('glyphicon-ban-circle').addClass('glyphicon-ok-circle');
                                    }
                                }
                            }
                        });
                    }
                }
            });

        });
    })
</script>