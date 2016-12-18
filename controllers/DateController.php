<?php

namespace app\controllers;

use app\models\Result;
use Yii;
use app\models\Date;
use app\models\DateSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DateController implements the CRUD actions for Date model.
 */
class DateController extends Controller

{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'confirm' => ['POST','GET'],

                ],
            ],
        ];
    }

    /**
     * Lists all Date models.
     * @return mixed
     */
    public function actionIndex()

    {

        $dates = Date::find()->orderBy('date')->all();        
        return $this->render('index', [
            'dates' => $dates,
        ]);
    }

    /**
     * Displays a single Date model.
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
     * Creates a new Date model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Date();
        $model->date=date("Y-m-d");

        $dates = Date::find()->orderBy('date')->all();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                                
            Yii::$app->session->setFlash('save', 'Дaнные '. date('d.m.Y', strtotime($model->date)).' сохранены'  );
            
            return $this->redirect(array('create'));
        } else {
            return $this->render('create', [
                'model' => $model,
                'dates' => $dates,
            ]);
        }
    }

    /**
     * Updates an existing Date model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Date model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionConfirm()
    {

        if (Yii::$app->request->isPost) {
            if (!isset($_POST['ajax']))
                $date = date('Y-m-d', strtotime($_GET['date']));
            $model=Date::find() ->where(["date" => $date])->one();

            if(!$model){
                return false;
            }

            return $_GET['date'];


        }
//        else
//            throw new HttpException(400, 'Ошибочный запрос. Пожайлуйста, не повторяйте его снова.');
    }


    /**
     * Finds the Date model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Date the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Date::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
