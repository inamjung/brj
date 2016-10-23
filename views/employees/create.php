<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Employees */

$this->title = 'Create Employees';
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-create">

   <div class="panel panel-primary">
        <div class="panel-heading">
            <h3><i class="glyphicon glyphicon-pencil"></i> เพิ่มพนักงาน</h3></div>
        <div class="panel-body">
            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>
