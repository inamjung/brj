<?php
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */

$this->title = 'BRJ-HOSPITAL';
?>
<div class="site-index">
<?php //echo Html::img('@web/images/brj.png',
        //['class'=>'img-responsive center-block img-round']
        //)?>

<div class="row">   
        <div class="col-md-6">     
            <div id="chart1"></div>                    
        </div>
        <div class="col-md-6">     
            <div id="chart2"></div>                    
        </div>
</div>
    <hr>

    <div class="row">
        
               <div class="col-md-6">  
                   <div class="panel panel-primary">
            <div class="panel-heading"> ตารางจาก db3</div>
            <div class="panel-body">
           <?php
            $sql = "select year(date) year,month(date) month
                    ,concat(month(date),'-' ,year(date)) my
                    ,sum(if(type='Getopd',amount,0)) Getopd 
                    ,sum(if(type='Getipd',amount,0)) Getipd
                    ,sum(if(type='Pay',amount,0)) Pay
                    ,sum(if(type='Getopd',amount,0)) + sum(if(type='Getipd',amount,0)) allget
                    from (
                    select 'Pay' as type,date_instock date,amount
                    from receive r
                    where r.date_instock between '2015-10-1' and  '2016-9-30' and r.type_id='1'
                    union all
                    select 'Getopd' as type,vstdate,inc_drug
                    from hos.vn_stat 
                    where vstdate between '2015-10-1' and  '2016-9-30'
                    union all
                    select 'Getipd' as type,dchdate,inc12
                    from hos.an_stat 
                    where dchdate between '2015-10-1' and  '2016-9-30'
                    ) a
                    group by year,month";
            
                    $rawData = Yii::$app->db3->createcommand($sql)->queryAll();
                    
                    if(!empty($rawData[0])){
                        $cols = array_keys($rawData[0]);
                    }
        $data_grid = new \yii\data\ArrayDataProvider([
        //'key' => 'hoscode',
        'allModels' => $rawData,
        'sort' => !empty($cols) ? [ 'attributes' => $cols] : FALSE,
        'pagination' => FALSE,
    ]);

    echo \kartik\grid\GridView::widget([
        'dataProvider' => $data_grid,
        'summary' => "",
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '0'],
        'hover'=>TRUE,
        'striped'=>FALSE,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'year',
            'Getopd',
            'Getipd',
            ],
    ]);
  
            
            
           ?>
            
                               
        </div> 
            </div>
        </div>
        
    </div>    
    
    <div style="display: none">
    <?=
        Highcharts::widget([
            'scripts' => [
                'highcharts-more', // enables supplementary chart types (gauge, arearange, columnrange, etc.)
                //'modules/exporting', // adds Exporting button/menu to chart
                'themes/grid',       // applies global 'grid' theme to all charts
                'highcharts-3d',
                'modules/drilldown'
            ]
        ]);
    ?>                  
        
    </div>

            <?php
            $sql = "select clinic ,count(*) as total
                    from clinicmember
                    group by clinic";
            $rawData = Yii::$app->db2->createCommand($sql)->queryAll();
            $main_data = [];
            foreach ($rawData as $data) {
                $main_data[] = [
                    'name' => $data['clinic'],
                    'y' => $data['total'] * 1,                    
                ];
            }
            $main = json_encode($main_data);
          
$this->registerJs("$(function () {

    $('#chart1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'จำนวนผู้ป้วยในคลินิกโรคเรื้อรัง'
        },
        xAxis: {
            type: 'category'
        },
        

        legend: {
            enabled: true
        },

        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true
                }
            }
        },

        series: [
        {
            name: 'คลินิก',
            colorByPoint: true,
            data:$main
            
        }
        ],
         
    });
});", yii\web\View::POS_END);
?>       
                                
                            
<!--   //////////////-->
    <?php
            $sql = "SELECT type_id,COUNT(*) as total FROM receive
                    GROUP BY type_id";
            $rawData = Yii::$app->db3->createCommand($sql)->queryAll();
            $main_data = [];
            foreach ($rawData as $data) {
                $main_data[] = [
                    'name' => $data['type_id'],
                    'y' => $data['total'] * 1,                    
                ];
            }
            $main = json_encode($main_data);
          
$this->registerJs("$(function () {

    $('#chart2').highcharts({
        chart: {
            type: 'pie'
        },
        title: {
            text: 'ประเภทที่รับเข้าระบบ'
        },
        xAxis: {
            type: 'category'
        },        

        legend: {
            enabled: true
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: [
        {
            name: 'คลินิก',
            colorByPoint: true,
            data:$main            
        }
        ],
         
    });
});", yii\web\View::POS_END);
?>
<!--////////////-->

</div>


    
    

