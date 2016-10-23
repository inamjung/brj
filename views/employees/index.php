<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มรายชื่อพนักงาน', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="panel panel-success">
        <div class="panel-heading"> รายชื่อพนักงาน</div>
        <div class="panel-body">     

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    'name',
                    'bd',
                    'blood',
                    'cid',
                    'ex',
                    'sex',
                    'addr:ntext',
                    'tel',
                    'social',
                    [
                        'class' => 'kartik\grid\BooleanColumn',
                        'attribute' => 'status',
                    ],
                    'marry',
                    'tmb_id',
                    'amp_id',
                    'chw_id',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
        </div>
    </div>
</div>        
