<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_kelulusanjk".
 *
 * @property integer $JK_id
 * @property string $JK_nama
 *
 * @property TblPerkara[] $tblPerkaras
 */
class TblKelulusanjk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_kelulusanjk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JK_nama'], 'required'],
            [['JK_nama'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'JK_id' => 'Jk ID',
            'JK_nama' => 'Jk Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPerkaras()
    {
        return $this->hasMany(TblPerkara::className(), ['JK_id' => 'JK_id']);
    }
}
