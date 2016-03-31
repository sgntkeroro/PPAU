<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;

use wbraganca\dynamicform\DynamicFormWidget;

use frontend\models\TblCawangan;
use frontend\models\TblKelulusanjk;
use frontend\models\TblKatpelanggan;
use frontend\models\TblTahunsedia;
use frontend\models\TblKatpermohonan;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPermohonan */
/* @var $form yii\widgets\ActiveForm */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(i) {
        jQuery(this).html("Address: " + (i + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(i) {
        jQuery(this).html("Address: " + (i + 1))
    });
});
';
$this->registerJs($js);
?>

<div class="tbl-permohonan-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form']]); ?>
    
    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($model, 'user_id')->textInput(['value'=>Yii::$app->user->identity->id, 'readonly' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'permohonan_tarikh')->textInput(['value'=>date('Y-m-d'), 'readonly' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'permohonan_pusatkos')->textInput(['maxlength' => true]) ?>
        </div>    
        <div class="col-sm-4">
            <?= $form->field($model, 'permohonan_fakjab')->textInput(['maxlength' => true]) ?>
        </div>        
        <div class="col-sm-2">
            <?= $form->field($model, 'cawangan_id')->dropDownList(
                ArrayHelper::map(TblCawangan::find()->all(),'cawangan_id','cawangan_nama'),
                ['prompt'=>'Sila Pilih Cawangan']
            ) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'permohonan_catitan')->textarea(['rows' => 2]) ?>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 100, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsPerkara[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                        'perkara_nama',
                        'perkara_kodakaun',
                        'perkara_kuantiti',
                        'perkara_harga',
                        'JK_id',
                        'katPelanggan_id',
                        'perkara_tujuanPembelian',
                        'perkara_jenisPeruntukan',
                        'perkara_lokasiCadangan',
                        'katPermohonan_id',
                        'perkara_bukuLog',
                        'perkara_programBaru',
                        'perkara_prgrmTahapPengajian',
                        'perkara_fakJab',
                        'katPermohonan_id',
                        'perkara_pegawai',
                        'perkara_pegawaiJawatan',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsPerkara as $i => $modelPerkara): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Peralatan / Aset <?= ($i+1) ?></h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelPerkara->isNewRecord) {
                                echo Html::activeHiddenInput($modelPerkara, "[{$i}]permohonan_id");
                            }
                        ?>

                        <div class="row">
                            <div class="col-sm-3">
                                <?= $form->field($modelPerkara, "[{$i}]perkara_nama")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelPerkara, "[{$i}]perkara_kodakaun")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelPerkara, "[{$i}]perkara_kuantiti")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelPerkara, "[{$i}]perkara_harga")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->

                        <div class="row">
                            <div class="col-sm-3">
                                <?= $form->field($modelPerkara, "[{$i}]perkara_fakJab")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelPerkara, "[{$i}]JK_id")->dropDownList(
                                    ArrayHelper::map(TblKelulusanjk::find()->all(),'JK_id','JK_nama'),
                                    ['prompt'=>'Kelulusan Jawatankuasa']
                                ) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelPerkara, "[{$i}]katPelanggan_id")->dropDownList(
                                    ArrayHelper::map(TblKatPelanggan::find()->all(),'katPelanggan_id','katPelanggan_nama'),
                                    ['prompt'=>'Kategori Pelanggan']
                                ) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelPerkara, "[{$i}]tahunSedia_id")->dropDownList(
                                    ArrayHelper::map(TblTahunsedia::find()->all(),'tahunSedia_id','tahunSedia_tahun'),
                                    ['prompt'=>'Pilih Tahun']
                                ) ?>
                            </div>
                        </div><!-- .row -->

                        <div class="row">
                            <div class="col-sm-3">
                                <?= $form->field($modelPerkara, "[{$i}]perkara_tujuanPembelian")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelPerkara, "[{$i}]perkara_jenisPeruntukan")->textInput(['maxlength' => true]) ?>
                            </div> 
                            <div class="col-sm-3">
                                <?= $form->field($modelPerkara, "[{$i}]perkara_lokasiCadangan")->textInput(['maxlength' => true]) ?>
                            </div>                             
                        </div><!-- .row -->

                        <div class="row">
                            <hr>
                            <div class="col-sm-6">
                                <?= $form->field($modelPerkara, "[{$i}]katPermohonan_id")->dropDownList(
                                    ArrayHelper::map(TblKatpermohonan::find()->all(),'katPermohonan_id','katPermohonan_nama'),
                                    ['prompt'=>'Kategori Permohonan']
                                ) ?>
                            </div>
                        </div><!-- .row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div align="left">
                                    <font size="2" color="red"> &nbsp; * Untuk kategori permohonan <i>'Tambahan kepada yang sedia ada'</i> . Sila lampirkan buku log kegunaan peralatan yang sedia ada.</font> 
                                </div>
                            
                                <br><?= $form->field($modelPerkara, "[{$i}]perkara_bukuLog")->fileInput() ?>
                            </div>
                        
                            <div class="col-sm-6">
                                <div class="row">
                                    <div align="left">
                                        <font size="2" color="red"> &nbsp; * Untuk kategori permohonan <i>'Permohonan Baru'</i> . Sila isi ruangan dibawah.</font> 
                                    </div>
                                </div>
                                <div class="row">
                                    <br><br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <?= $form->field($modelPerkara, "[{$i}]perkara_programBaru")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?= $form->field($modelPerkara, "[{$i}]perkara_prgrmTahapPengajian")->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>
                            </div><!-- .row -->
                        </div><hr>

                        <div class="col-sm-6">
                            <div class="row">
                                <div align="left">
                                    <font size="2" color="red"> &nbsp; * Khusus untuk permohonan pembelian peralatan makmal / peralatan ICT.</font> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($modelPerkara, "[{$i}]perkara_pegawai")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($modelPerkara, "[{$i}]perkara_pegawaiJawatan")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                        </div><!-- .row -->                            
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Hantar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
    $(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
        console.log("beforeInsert");
    });

    $(".dynamicform_wrapper").on("afterInsert", function(e, item) {
        console.log("afterInsert");
    });

    $(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
        if (! confirm("Are you sure you want to delete this item?")) {
            return false;
        }
        return true;
    });

    $(".dynamicform_wrapper").on("afterDelete", function(e) {
        console.log("Deleted item!");
    });

    $(".dynamicform_wrapper").on("limitReached", function(e, item) {
        alert("Limit reached");
    });
</script>