<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_mesyuarat".
 *
 * @property integer $mesyuarat_id
 * @property integer $perkara_id
 * @property string $mesyuarat_tarikh
 * @property integer $mesyuarat_kuantiti
 * @property double $mesyuarat_jumlah
 * @property string $mesyuarat_catitan
 * @property integer $statusMesyuarat_id
 *
 * @property TblPerkara $perkara
 * @property TblStatusmesyuarat $statusMesyuarat
 */
class TblMesyuarat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_mesyuarat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perkara_id', 'mesyuarat_kuantiti', 'statusMesyuarat_id'], 'integer'],
            // [['mesyuarat_tarikh', 'mesyuarat_kuantiti', 'mesyuarat_jumlah', 'statusMesyuarat_id'], 'required'],
            [['mesyuarat_tarikh'], 'safe'],
            [['mesyuarat_jumlah'], 'number'],
            [['mesyuarat_catitan'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mesyuarat_id' => 'Mesyuarat ID',
            'perkara_id' => 'Perkara ID',
            'mesyuarat_tarikh' => 'Mesyuarat Tarikh',
            'mesyuarat_kuantiti' => 'Mesyuarat Kuantiti',
            'mesyuarat_jumlah' => 'Mesyuarat Jumlah',
            'mesyuarat_catitan' => 'Mesyuarat Catitan',
            'statusMesyuarat_id' => 'Status Mesyuarat ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerkara()
    {
        return $this->hasOne(TblPerkara::className(), ['perkara_id' => 'perkara_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusMesyuarat()
    {
        return $this->hasOne(TblStatusmesyuarat::className(), ['statusMesyuarat_id' => 'statusMesyuarat_id']);
    }
}
