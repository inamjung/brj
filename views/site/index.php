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
            text: 'สรุปการซ่อมตามแผนก'
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





    
    
</div>
