<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_tahunsedia".
 *
 * @property integer $tahunSedia_id
 * @property integer $tahunSedia_tahun
 *
 * @property TblPerkara[] $tblPerkaras
 */
class TblTahunsedia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_tahunsedia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tahunSedia_tahun'], 'required'],
            [['tahunSedia_tahun'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tahunSedia_id' => 'Tahun Sedia ID',
            'tahunSedia_tahun' => 'Tahun Sedia Tahun',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPerkaras()
    {
        return $this->hasMany(TblPerkara::className(), ['tahunSedia_id' => 'tahunSedia_id']);
    }
}
