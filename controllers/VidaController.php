<?php

namespace app\controllers;

use app\models\Vida;
use app\models\VidaSearch;
use kartik\mpdf\Pdf;
use Yii;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * VidaController implements the CRUD actions for Vida model.
 */
class VidaController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Vida models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VidaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // construye una consulta a la BD
        $query = Vida::find();

        // obtiene el número total de vida
        $count = $query->count();
        // crea un objeto paginación con dicho total
        $pagination = new Pagination(['totalCount' => $count]);

        // limita la consulta utilizando la paginación y recupera las polizas de  vida
        $vida = $query->offset($pagination->offset)
                          ->limit($pagination->limit)
                          ->all();


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'pagination' => $pagination,
            'vida' => $vida,
        ]);
    }

    /**
     * Displays a single Vida model.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Vida model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vida();

        if (\Yii::$app->user->can('emitirPoliza')) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }

            return $this->render('create', [
            'model' => $model,
            ]);
        }
        return $this->redirect(['index']);
    }

    public function actionCreatepl()
    {
        $model = new Vida();

        if (\Yii::$app->user->can('controlPlanp')) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }

            return $this->render('createPl', [
            'model' => $model,
            ]);
        }
    }

    public function actionCreatesalud()
    {
        $model = new Vida();

        if (\Yii::$app->user->can('emitirPoliza')) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }

            return $this->render('createSalud', [
            'model' => $model,
            ]);
        }
        return $this->redirect(['index']);
    }

    /**
     * Updates an existing Vida model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (\Yii::$app->user->can('modificarPoliza')) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }

            if ($model->tipo_poliza === '0') {
                return $this->render('update', [
                'model' => $model,
                ]);
            }
            if ($model->tipo_poliza === '1') {
                return $this->render('updatePl', [
                'model' => $model,
                ]);
            }
            if ($model->tipo_poliza === '2') {
                return $this->render('updateSalud', [
                'model' => $model,
                ]);
            }
        }
    }

    /**
     * Deletes an existing Vida model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (\Yii::$app->user->can('eliminarPoliza')) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Vida model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Vida the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vida::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionReport($id)
    {
        $model = $this->findModel($id);
        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('poliza', ['model' => $model]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
             // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
             // call mPDF methods on the fly
            'methods' => [
                'SetHeader' => ['Krajee Report Header'],
                'SetFooter' => ['{PAGENO}'],
            ],
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }
}
