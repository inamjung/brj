<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Update Users: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-update">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-user"></i>
            แก้ไขข้อมูลส่วนตัว
        </div>
        <div class="panel-body">
            <?=
            $this->render('_form', [
                'model' => $model,
                't' => []
            ])
            ?>
        </div>
    </div> 
</div>

