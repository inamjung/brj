<?php

namespace app\controllers;

use Yii;
use app\models\Employees;
use app\models\EmployeesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\BaseArrayHelper;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use yii\helpers\Html;
use app\models\Chw;
use app\models\Amp;
use app\models\Tmb;

/**
 * EmployeesController implements the CRUD actions for Employees model.
 */
class EmployeesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Employees models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employees model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Employees model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   public function actionCreate()
    {
        $model = new Employees();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           // return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Employees model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);   
        $model->ex = $model->getArray($model->ex);
        $model->social = $model->getArray($model->social);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Employees model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Employees model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employees the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employees::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
     public function actionGetAmp(){
        $out = [];
        if (isset($_POST['depdrop_parents'])){
            $parents = $_POST['depdrop_parents'];
            if ($parents != NULL){
                $chw_id = $parents[0];
                $out = $this->getAmp($chw_id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }    
    public function actionGetTmb(){
        $out = [];
        if (isset($_POST['depdrop_parents'])){
            $ids = $_POST['depdrop_parents'];
            $chw_id = empty($ids[0]) ? NULL : $ids[0];
            $amp_id = empty($ids[1]) ? NULL : $ids[1];
            if ($chw_id !=NULL){
                $data = $this->getTmb($amp_id);
                echo Json::encode(['output'=>$data, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }     
    protected function getAmp($id){
        $datas = Amp::find()->where(['chw_id'=>$id])->all();
        return $this->MapData($datas,'id','name');
    }
    
    protected function getTmb($id){
        $datas = Tmb::find()->where(['amp_id'=>$id])->orderBy('name ASC')->all();
        return $this->MapData($datas,'id','name');
    }    
    protected function MapData($datas,$fieldID,$fieldName){
        $obj = [];
        foreach ($datas as $key => $value){
            array_push($obj, ['id'=>$value->{$fieldID},'name'=>$value->{$fieldName}]);
        }
        return $obj;
    }
}
