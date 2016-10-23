<?php
    use yii\helpers\Url;
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="treeview "> 
                <a href="#">
                    <i class="glyphicon glyphicon-cog"></i> <span>เมนู</span>
                    <i class="fa pull-right fa-angle-down"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo Url::to(['groups/index']); ?>"><i class="fa fa-circle text-green"></i> <span> กลุ่มงาน</span> <small class="label pull-right bg-blue"></small></a> </li>
                    <li><a href="<?php echo Url::to(['departments/index']); ?>"><i class="fa fa-circle text-green"></i> <span> หน่วยงาน</span> <small class="label pull-right bg-blue"></small></a> </li>
                    <li><a href="<?php echo Url::to(['employees/index']); ?>"><i class="fa fa-circle text-green"></i> <span> พนักงาน</span> <small class="label pull-right bg-blue"></small></a> </li> 
                </ul>
        </ul>


    </section>

</aside>
