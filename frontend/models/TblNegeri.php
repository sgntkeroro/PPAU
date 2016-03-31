<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_negeri".
 *
 * @property integer $negeri_id
 * @property string $negeri_nama
 *
 * @property TblCawangan[] $tblCawangans
 */
class TblNegeri extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_negeri';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['negeri_nama'], 'required'],
            [['negeri_nama'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'negeri_id' => 'Negeri ID',
            'negeri_nama' => 'Negeri Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblCawangans()
    {
        return $this->hasMany(TblCawangan::className(), ['negeri_id' => 'negeri_id']);
    }
}
