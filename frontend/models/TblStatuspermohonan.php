<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_statuspermohonan".
 *
 * @property integer $statusPermohonan_id
 * @property string $statusPermohonan_nama
 *
 * @property TblPermohonan[] $tblPermohonans
 */
class TblStatuspermohonan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_statuspermohonan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statusPermohonan_nama'], 'required'],
            [['statusPermohonan_nama'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'statusPermohonan_id' => 'Status Permohonan ID',
            'statusPermohonan_nama' => 'Status Permohonan Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPermohonans()
    {
        return $this->hasMany(TblPermohonan::className(), ['statusPermohonan_id' => 'statusPermohonan_id']);
    }
}
