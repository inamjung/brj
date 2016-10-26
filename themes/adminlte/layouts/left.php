<?php
    use yii\helpers\Url;
    use yii\bootstrap\Nav;
    use yii\helpers\Html;
?>

<aside class="main-sidebar">

    <section class="sidebar">
 <?php if(!Yii::$app->user->isGuest){ ?>         
<div class="pull-left image">
    <?= Html::img('avatars/' . Yii::$app->user->identity->avatar,
            ['class' => 'img-circle', 'width' => '40px;'])
    ?>                

</div>
  <?php } ?>
        <!-- Sidebar user panel -->
        <?=
        Nav::widget(
                [
                    'encodeLabels' => false,
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        '<li class="header"></li>',
                        Yii::$app->user->isGuest ?
                                ['label' => '<i class="glyphicon glyphicon-log-in"></i> เข้าสู่ระบบ', 'url' => ['/user/security/login']] :
                                ['label' => 'ผู้ใช้งาน (' . Yii::$app->user->identity->username . ')', 'items' => [
                                ['label' => 'ข้อมูลส่วนตัว', 'url' => ['/users/indexuser']],

                                ['label' => 'Logout', 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']],
                            ]],
                    ],
                ]
        );
        ?>
        <hr>
        <ul class="sidebar-menu">
            <li class="treeview "> 
                <a href="#">
                    <i class="glyphicon glyphicon-cog"></i> <span>ตั้งค่า</span>
                    <i class="fa pull-right fa-angle-down"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo Url::to(['groups/index']); ?>"><i class="fa fa-circle text-green"></i> <span> กลุ่มงาน</span> <small class="label pull-right bg-blue"></small></a> </li>
                    <li><a href="<?php echo Url::to(['departments/index']); ?>"><i class="fa fa-circle text-green"></i> <span> หน่วยงาน</span> <small class="label pull-right bg-blue"></small></a> </li>
                    <li><a href="<?php echo Url::to(['employees/index']); ?>"><i class="fa fa-circle text-green"></i> <span> พนักงาน</span> <small class="label pull-right bg-blue"></small></a> </li> 
                </ul>
        </ul>
        
        <ul class="sidebar-menu">
            <li class="treeview active"> 
                <a href="#">
                    <i class="glyphicon glyphicon-cog"></i> <span>รายงานHOS-XP</span>
                    <i class="fa pull-right fa-angle-down"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo Url::to(['hosreport/report/patienttype']); ?>"><i class="fa fa-circle text-blue"></i> <span> ผป.ตามสิทธิ์</span> <small class="label pull-right bg-blue"></small></a> </li>
                    
                </ul>
        </ul>


    </section>

</aside>
