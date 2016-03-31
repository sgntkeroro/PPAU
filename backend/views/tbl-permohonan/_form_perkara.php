<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\JuiAsset;
use yii\web\JsExpression;
use kartik\widgets\FileInput;
use app\modules\yii2extensions\models\Image;
use wbraganca\dynamicform\DynamicFormWidget;

use backend\models\TblCawangan;
use backend\models\TblKelulusanjk;
use backend\models\TblKatpelanggan;
use backend\models\TblTahunsedia;
use backend\models\TblKatpermohonan;

?>

<div id="panel-option-values" class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-check-square-o"></i> Perkara / Aset</h3>
    </div>

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper',
        'widgetBody' => '.form-options-body',
        'widgetItem' => '.form-options-item',
        'min' => 1,
        'insertButton' => '.add-item',
        'deleteButton' => '.delete-item',
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

    <table class="table table-bordered table-striped margin-b-none">
        
        <tbody class="form-options-body">
            <?php foreach ($modelsPerkara as $index => $modelPerkara): ?>
                <tr class="form-options-item">
                    <td class="sortable-handle text-center vcenter" style="cursor: move;">
                        <i class="fa fa-arrows"></i>
                    </td>
                    <td class="vcenter">
                        <tr>
                            <?= $form->field($modelPerkara, "[{$index}]perkara_nama")->label(false)->textInput(['maxlength' => 128]); ?>
                        </tr>
                        <tr>
                            <?= $form->field($modelPerkara, "[{$index}]perkara_kodakaun")->label(false)->textInput(['maxlength' => 128]); ?>
                        </tr>
                        <tr>
                            <?= $form->field($modelPerkara, "[{$index}]perkara_kuantiti")->label(false)->textInput(['maxlength' => 128]); ?>
                        </tr>
                        <tr>
                            <?= $form->field($modelPerkara, "[{$index}]perkara_harga")->label(false)->textInput(['maxlength' => 128]); ?>
                        </tr>
                        <tr>
                            <?= $form->field($modelPerkara, "[{$index}]perkara_fakJab")->label(false)->textInput(['maxlength' => 128]); ?>
                        </tr>
                        <tr>
                            <?= $form->field($modelPerkara, "[{$index}]JK_id")->dropDownList(
                                    ArrayHelper::map(TblKelulusanjk::find()->all(),'JK_id','JK_nama'),
                                    ['prompt'=>'Kelulusan Jawatankuasa']
                            ) ?>
                        </tr>
                        <tr>
                            <?= $form->field($modelPerkara, "[{$index}]katPelanggan_id")->dropDownList(
                                    ArrayHelper::map(TblKatPelanggan::find()->all(),'katPelanggan_id','katPelanggan_nama'),
                                    ['prompt'=>'Kategori Pelanggan']
                            ) ?>
                        </tr>
                        <tr>
                            <?= $form->field($modelPerkara, "[{$index}]tahunSedia_id")->dropDownList(
                                    ArrayHelper::map(TblTahunsedia::find()->all(),'tahunSedia_id','tahunSedia_tahun'),
                                    ['prompt'=>'Pilih Tahun']
                            ) ?>
                        </tr>
                        <tr>
                            <?= $form->field($modelPerkara, "[{$index}]perkara_tujuanPembelian")->textInput(['maxlength' => true]) ?>
                        </tr>
                        <tr>
                            <?= $form->field($modelPerkara, "[{$index}]perkara_jenisPeruntukan")->textInput(['maxlength' => true]) ?>
                        </tr>
                        <tr>
                            <?= $form->field($modelPerkara, "[{$index}]perkara_lokasiCadangan")->textInput(['maxlength' => true]) ?>
                        </tr>
                        <tr>
                            <?= $form->field($modelPerkara, "[{$index}]katPermohonan_id")->dropDownList(
                                    ArrayHelper::map(TblKatpermohonan::find()->all(),'katPermohonan_id','katPermohonan_nama'),
                                    ['prompt'=>'Kategori Permohonan']
                                ) ?>
                        </tr>
                        <?php if (!$modelPerkara->isNewRecord): ?>
                            <?= Html::activeHiddenInput($modelPerkara, "[{$index}]id"); ?>
                            <?= Html::activeHiddenInput($modelPerkara, "[{$index}]image_id"); ?>
                            <?= Html::activeHiddenInput($modelPerkara, "[{$index}]deleteImg"); ?>
                        <?php endif; ?>
                        <?php
                            $modelImage = Image::findOne(['id' => $modelPerkara->perkara_bukuLog]);
                            $initialPreview = [];

                            if ($modelImage) {
                                $pathImg = Yii::$app->fileStorage->baseUrl . 'frontend/web/uploads' . $modelImage->path;
                                $initialPreview[] = Html::img($pathImg, ['class' => 'file-preview-image']);
                            }
                        ?>
                        <tr>
                            <?= $form->field($modelPerkara, "[{$index}]img")->label(false)->widget(FileInput::classname(), [
                                'options' => [
                                    'multiple' => false,
                                    'accept' => 'image/*',
                                    'class' => 'optionvalue-img'
                                ],
                                'pluginOptions' => [
                                    'previewFileType' => 'image',
                                    'showCaption' => false,
                                    'showUpload' => false,
                                    'browseClass' => 'btn btn-default btn-sm',
                                    'browseLabel' => ' Pick image',
                                    'browseIcon' => '<i class="glyphicon glyphicon-picture"></i>',
                                    'removeClass' => 'btn btn-danger btn-sm',
                                    'removeLabel' => ' Delete',
                                    'removeIcon' => '<i class="fa fa-trash"></i>',
                                    'previewSettings' => [
                                        'image' => ['width' => '138px', 'height' => 'auto']
                                    ],
                                    'initialPreview' => $initialPreview,
                                    'layoutTemplates' => ['footer' => '']
                                ]
                            ]) ?>   
                        </tr>
                        <tr>
                            <?= $form->field($modelPerkara, "[{$index}]perkara_programBaru")->textInput(['maxlength' => true]) ?>
                        </tr>
                    </td>
                    <td class="text-center vcenter">
                        <button type="button" class="delete-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td><button type="button" class="add-item btn btn-success btn-sm"><span class="fa fa-plus"></span> New</button></td>
            </tr>
        </tfoot>
    </table>
    <?php DynamicFormWidget::end(); ?>
</div>

<?php
$js = <<<'EOD'
$(".optionvalue-img").on("filecleared", function(event) {
    var regexID = /^(.+?)([-\d-]{1,})(.+)$/i;
    var id = event.target.id;
    var matches = id.match(regexID);
    if (matches && matches.length === 4) {
        var identifiers = matches[2].split("-");
        $("#optionvalue-" + identifiers[1] + "-deleteimg").val("1");
    }
});
var fixHelperSortable = function(e, ui) {
    ui.children().each(function() {
        $(this).width($(this).width());
    });
    return ui;
};
$(".form-options-body").sortable({
    items: "tr",
    cursor: "move",
    opacity: 0.6,
    axis: "y",
    handle: ".sortable-handle",
    helper: fixHelperSortable,
    update: function(ev){
        $(".dynamicform_wrapper").yiiDynamicForm("updateContainer");
    }
}).disableSelection();

EOD;
JuiAsset::register($this);
$this->registerJs($js);
?>