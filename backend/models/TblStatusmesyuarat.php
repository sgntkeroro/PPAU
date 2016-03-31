<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_statusmesyuarat".
 *
 * @property integer $statusMesyuarat_id
 * @property string $statusMesyuarat_nama
 *
 * @property TblMesyuarat[] $tblMesyuarats
 */
class TblStatusmesyuarat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_statusmesyuarat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statusMesyuarat_nama'], 'required'],
            [['statusMesyuarat_nama'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'statusMesyuarat_id' => 'Status Mesyuarat ID',
            'statusMesyuarat_nama' => 'Status Mesyuarat Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMesyuarats()
    {
        return $this->hasMany(TblMesyuarat::className(), ['statusMesyuarat_id' => 'statusMesyuarat_id']);
    }
}
