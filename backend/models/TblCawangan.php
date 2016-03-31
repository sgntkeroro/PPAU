<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_cawangan".
 *
 * @property integer $cawangan_id
 * @property integer $negeri_id
 * @property string $cawangan_nama
 * @property string $cawangan_poskod
 *
 * @property TblNegeri $negeri
 * @property TblPermohonan[] $tblPermohonans
 */
class TblCawangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_cawangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['negeri_id', 'cawangan_nama', 'cawangan_poskod'], 'required'],
            [['negeri_id'], 'integer'],
            [['cawangan_nama', 'cawangan_poskod'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cawangan_id' => 'Cawangan ID',
            'negeri_id' => 'Negeri ID',
            'cawangan_nama' => 'Cawangan Nama',
            'cawangan_poskod' => 'Cawangan Poskod',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNegeri()
    {
        return $this->hasOne(TblNegeri::className(), ['negeri_id' => 'negeri_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPermohonans()
    {
        return $this->hasMany(TblPermohonan::className(), ['cawangan_id' => 'cawangan_id']);
    }
}
