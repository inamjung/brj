<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\checkbox\CheckboxX;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\Url;
use app\models\Tmb;
use app\models\Amp;
use app\models\Chw;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Employees */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employees-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?=
            $form->field($model, 'bd')->widget(DatePicker::className(), [
                'language' => 'th',
                'options' => [
                    'placholder' => '<--ระบุวันเกิด-->'
                ],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighligt' => true
                ]
            ])
            ?>


        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?=
                    $form->field($model, 'blood')
                    ->dropDownList(\app\models\Employees::itemAlias('blood'), [
                        'prompt' => '<--ระบุหมู่เลือด-->'
                            ]
                    )
            ?>
        </div>
    </div> 
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'ex')->checkboxList(\app\models\Employees::itemAlias('ex')) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
<?= $form->field($model, 'sex')->radioList([ 'ชาย' => 'ชาย', 'หญิง' => 'หญิง',], ['prompt' => '']) ?>
        </div>
    </div> 
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'addr')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
<?=
$form->field($model, 'tel')->widget(\yii\widgets\MaskedInput::classname(), [
    'mask' => '999-999-9999',
])
?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'social')->checkboxList(\app\models\Employees::itemAlias('social')) ?>
        </div>
    </div> 
    <div class="row">        
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'marry')->radioList(['โสด' => 'โสด', 'แต่งงาน' => 'แต่งงาน', 'หม้าย' => 'หม้าย']) ?>
        </div>  
        <div class="col-xs-4 col-sm-4 col-md-4">
<?=
$form->field($model, 'status')->widget(\kartik\checkbox\CheckboxX::className(), [
    'pluginOptions' => [
        'threeState' => FALSE
    ]
])->label('ยังมีชีวิตอยู่')
?>
        </div>
    </div> 
    <div class="row"> 
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?=
            $form->field($model, 'chw_id')->widget(\kartik\widgets\Select2::className(), [
                'data' => yii\helpers\ArrayHelper::map(app\models\Chw::find()->all(), 'id', 'name'),
                'language' => 'th',
                'options' => ['placeholder' => '<--ระบุจังหวัด-->'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])
            ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <?= $form->field($model, 'amp_id')->widget(kartik\widgets\DepDrop::className(),[
                'data'=>[],
                'options' => ['placeholder' => '<--ระบุอำเภอ-->'],
                'type' => DepDrop::TYPE_SELECT2,
                        'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                        'pluginOptions' => [
                            'depends' => ['employees-chw_id'],            
                            'url' => yii\helpers\Url::to(['/employees/get-amp']),
                            'loadingText' => 'Loading1...',
                        ],
                    ]); ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">            
            <?= $form->field($model, 'tmb_id')->widget(kartik\widgets\DepDrop::className(),[
                'data'=>[],
                'options' => ['placeholder' => '<--ระบุตำบล-->'],
                'type' => DepDrop::TYPE_SELECT2,
                        'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                        'pluginOptions' => [
                            'depends' => ['employees-chw_id','employees-amp_id'],            
                            'url' => yii\helpers\Url::to(['/employees/get-tmb']),
                            'loadingText' => 'Loading1...',
                        ],
                    ]);?>
        </div>
    </div>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
