<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Model;
use frontend\models\TblPermohonan;
use frontend\models\TblPermohonanSearch;
use frontend\models\TblPerkara;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\JsonParser;
use yii\web\UploadedFile;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\db\Query;
use yii\db\Command;

use yii\helpers\ArrayHelper;

/**
 * TblPermohonanController implements the CRUD actions for TblPermohonan model.
 */
class TblPermohonanController extends Controller
{
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::classname(),
                'only'=>['create','update'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblPermohonan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblPermohonanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPermohonan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $query = new Query;
        $query ->select([
            'user.user_id as user_id',
            'tbl_perkara.perkara_nama as perkaraNama',
            'tbl_perkara.perkara_kodakaun as kodAkaun',
            'tbl_perkara.perkara_kuantiti as kuantiti',
            'tbl_perkara.perkara_harga as harga',
            'tbl_perkara.perkara_jumlahHarga as jumlahHarga',
            'tbl_perkara.JK_id as kelulusanJK',
            'tbl_perkara.katPelanggan_id as katPelanggan',
            'tbl_perkara.perkara_tujuanPembelian as tujuanBeli',
            'tbl_perkara.katPermohonan_id as katPermohonan',
            'tbl_perkara.perkara_jenisPeruntukan as jenisPeruntukan',
            'tbl_perkara.tahunSedia_id as tahunSedia',
            'tbl_perkara.perkara_lokasiCadangan as lokasiCadangan',
            'tbl_perkara.perkara_bukuLog as bukuLog',
            'tbl_perkara.perkara_programBaru as programBaru',
            'tbl_perkara.perkara_prgrmTahapPengajian as tahapPengajian',
            'tbl_perkara.perkara_pegawai as pegawai',
            'tbl_perkara.perkara_pegawaiJawatan as jawatan'
            ])
               ->from('tbl_perkara','tbl_permohonan')
               ->innerJoin('tbl_permohonan','tbl_perkara.permohonan_id=tbl_permohonan.permohonan_id')
               ->innerJoin('user','tbl_permohonan.user_id=user.id')
               ->where('tbl_permohonan.permohonan_id = "'.$id.'"');
               $command=$query->createCommand();
               $data=$command->queryAll();

        return  $this->render('view' ,[
            'view'=>$data,
            'model' => $this->findModel($id),
            ]);
    }

    /**
     * Creates a new TblPermohonan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblPermohonan();
        $modelsPerkara = [new TblPerkara];

        if ($model->load(Yii::$app->request->post())) {

            $model->statusPermohonan_id = 2;
            $model->save();

            $modelsPerkara = Model::createMultiple(TblPerkara::classname());
            Model::loadMultiple($modelsPerkara, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPerkara) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsPerkara as $modelPerkara) {
                            $modelPerkara->permohonan_id = $model->permohonan_id;
                            $modelPerkara->perkara_jumlahHarga = ($modelPerkara->perkara_kuantiti * $modelPerkara->perkara_harga);
                            if (! ($flag = $modelPerkara->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->permohonan_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        else {
            return $this->render('create', [
                'model' => $model,
                'modelsPerkara' => (empty($modelsPerkara)) ? [new TblPerkara] : $modelsPerkara
            ]);
        }
    }

    /**
     * Updates an existing TblPermohonan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsPerkara = $model->tblPerkaras;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsPerkara, 'permohonan_id', 'permohonan_id');
            $modelsPerkara = Model::createMultiple(TblPerkara::classname(), $modelsPerkara);
            Model::loadMultiple($modelsPerkara, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsPerkara, 'permohonan_id', 'permohonan_id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsPerkara),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPerkara) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            TblPerkara::deleteAll(['permohonan_id' => $deletedIDs]);
                        }
                        foreach ($modelsPerkara as $modelPerkara) {
                            $modelPerkara->permohonan_id = $model->permohonan_id;
                            if (! ($flag = $modelPerkara->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->permohonan_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsPerkara' => (empty($modelsPerkara)) ? [new TblPerkara] : $modelsPerkara
        ]);
    }

    /**
     * Deletes an existing TblPermohonan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $modelsPerkara = ArrayHelper::map($model->tblPerkaras, 'permohonan_id', 'permohonan_id');

        TblPerkara::deleteAll(['permohonan_id' => $modelsPerkara]);
        $name = $model->permohonan_id;

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Record  <strong>"' . $name . '"</strong> deleted successfully.');
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the TblPermohonan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPermohonan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblPermohonan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
