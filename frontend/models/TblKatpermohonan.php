<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_katpermohonan".
 *
 * @property integer $katPermohonan_id
 * @property string $katPermohonan_nama
 *
 * @property TblPerkara[] $tblPerkaras
 */
class TblKatpermohonan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_katpermohonan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['katPermohonan_nama'], 'required'],
            [['katPermohonan_nama'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'katPermohonan_id' => 'Kat Permohonan ID',
            'katPermohonan_nama' => 'Kat Permohonan Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPerkaras()
    {
        return $this->hasMany(TblPerkara::className(), ['katPermohonan_id' => 'katPermohonan_id']);
    }
}
