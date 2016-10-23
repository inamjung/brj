<?php
    use yii\helpers\Html;
    use yii\helpers\ArrayHelper;
    use yii\helpers\Url;
    use yii\data\ArrayDataProvider;
    use kartik\grid\GridView;
?>


<?php

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
        [
            'attribute'=>'pttype',
            'label'=>'รหัสสิทธิ์'
        ],
        [
            'attribute'=>'pttypename',
            'label'=>'สิทธิ์'
        ],
        [
            'attribute'=>'total',
            'label'=>'จำนวน'
        ]        
    ];
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
    'columns' => $gridColumns,
    'responsive' => true,
    'hover' => true,
    'striped' => false,
    'floatHeader' => FALSE,    
    'panel' => [
        'type' => GridView::TYPE_SUCCESS,
    ],
]);
?>

