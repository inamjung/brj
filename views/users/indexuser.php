<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลผู้ใช้งาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-user"></i>
            ข้อมูลส่วนตัว
        </div>
        <div class="panel-body">
<!--            <p>
                <?= Html::a('แก้ไขรหัสผ่าน', ['user/setting/account'], ['class' => 'btn btn-danger']) ?>
            </p>-->

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    [
                    'attribute'=>'avatar',
                    'format'=>'html',
                    'value'=>function($model){
                        return html::img('avatars/'.$model->avatar,['class'=>'thumbnail-responsive',
                            'style'=>'width: 80px;']);
                }
            ],
                    'username',
                    'name',
                    'email:email',
                    [
                        'attribute' => 'department_id',
                        'value' => 'userdep.name',
                    ],
//            'password_hash',
//            'auth_key',
                    // 'confirmation_token',
                    // 'confirmation_sent_at',
                    // 'confirmed_at',
                    // 'unconfirmed_email:email',
                    // 'recovery_token',
                    // 'recovery_sent_at',
                    // 'blocked_at',
                    // 'registered_from',
                    // 'logged_in_from',
                    // 'logged_in_at',
                    // 'created_at',
                    // 'updated_at',
                    // 'registration_ip',
                    // 'status',
                    // 'password_reset_token',            
                    // 'role',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'options' => ['style' => 'width:50px;'],
                        'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="...">{update}</div>',
                        'buttons' => [
//                    'view'=>function($url,$model,$key){
//                        return Html::a('<i class="glyphicon glyphicon-eye-open"></i>',$url,['class'=>'btn btn-default']);
//                    }, 
                            'update' => function($url, $model, $key) {
                                return Html::a('<i class="glyphicon glyphicon-edit"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']);
                            },
//                    
//                    'delete'=>function($url,$model,$key){
//                         return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url,[
//                                'title' => Yii::t('yii', 'Delete'),
//                                'data-confirm' => Yii::t('yii', 'คุณต้องการลบไฟล์นี้?'),
//                                'data-method' => 'post',
//                                'data-pjax' => '0',
//                                'class'=>'btn btn-default'
//                                ]);
//                    }
                                ]
                            ],
                        //[
                        //'class' => 'yii\grid\ActionColumn'
                        //],
                        ],
                    ]);
                    ?>
        </div>
    </div>
</div>