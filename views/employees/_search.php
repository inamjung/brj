<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employees-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'bd') ?>

    <?= $form->field($model, 'blood') ?>

    <?= $form->field($model, 'cid') ?>

    <?php // echo $form->field($model, 'ex') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'addr') ?>

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'social') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'marry') ?>

    <?php // echo $form->field($model, 'tmb_id') ?>

    <?php // echo $form->field($model, 'amp_id') ?>

    <?php // echo $form->field($model, 'chw_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
