<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_katpelanggan".
 *
 * @property integer $katPelanggan_id
 * @property string $katPelanggan_nama
 *
 * @property TblPerkara[] $tblPerkaras
 */
class TblKatpelanggan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_katpelanggan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['katPelanggan_nama'], 'required'],
            [['katPelanggan_nama'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'katPelanggan_id' => 'Kat Pelanggan ID',
            'katPelanggan_nama' => 'Kat Pelanggan Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPerkaras()
    {
        return $this->hasMany(TblPerkara::className(), ['katPelanggan_id' => 'katPelanggan_id']);
    }
}
