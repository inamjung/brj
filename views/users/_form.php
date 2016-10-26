<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['readonly'=>true,'maxlength' => true]) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'department_id')->widget(kartik\select2\Select2::className(),[
                'data'=> yii\helpers\ArrayHelper::map(app\models\Departments::find()->all(),'id','name'),
                'options'=>['placeholder'=>'เลือกหน่วยงาน'],
                'pluginOptions'=>['allowClear'=>true]
            ]) ?>
    <?= $form->field($model, 'depname')->widget(kartik\select2\Select2::className(),[
                'data'=> yii\helpers\ArrayHelper::map(app\models\Departments::find()->all(),'name','name'),
                'options'=>['placeholder'=>'ยืนยัน-หน่วยงาน'],
                'pluginOptions'=>['allowClear'=>true]
            ]) ?>

    <?= $form->field($model, 'role')->textInput() ?>
    <div class="row">        
                    <div class="col-xs-12 col-sm-12 col-md-12  ">
                <?= $form->field($model, 'avatar_img')->label('รูปประจำตัว')->fileInput() ?>       
                    </div>    
                </div>     
                        <?php if ($model->avatar) { ?>
                            <?= Html::img('avatars/' . $model->avatar, ['class' => 'img-responsive img-circle', 'width' => '150px;']); ?>
                <?php } ?> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>