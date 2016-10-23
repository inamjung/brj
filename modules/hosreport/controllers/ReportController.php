<?php
namespace app\modules\hosreport\controllers;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use Yii;
class ReportController extends Controller{
    
    public function actionPatienttype(){
        $connection = \Yii::$app->db2;
        $data = $connection->createCommand("SELECT
                    vn_stat.pttype,
                    pttype.`name` as pttypename,
                    Count(DISTINCT(vn_stat.hn)) AS total
                    FROM vn_stat
                    LEFT JOIN pttype ON vn_stat.pttype = pttype.pttype
                    WHERE vn_stat.vstdate BETWEEN '2015-10-01' AND '2015-12-31'
                    GROUP BY vn_stat.pttype
                    ORDER BY total DESC")->queryAll();
        
      
        
        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data
            
        ]);
        return $this->render('patienttype',[
            'dataProvider'=>$dataProvider,
            
        ]);
    }
}

