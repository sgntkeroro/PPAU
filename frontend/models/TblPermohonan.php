<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_permohonan".
 *
 * @property integer $permohonan_id
 * @property integer $user_id
 * @property integer $cawangan_id
 * @property integer $statusPermohonan_id
 * @property string $permohonan_tarikh
 * @property string $permohonan_pusatkos
 * @property string $permohonan_fakjab
 * @property string $permohonan_catitan
 *
 * @property TblPerkara[] $tblPerkaras
 * @property TblCawangan $cawangan
 * @property TblStatuspermohonan $statusPermohonan
 * @property User $user
 */
class TblPermohonan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_permohonan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'cawangan_id', 'statusPermohonan_id', 'permohonan_tarikh', 'permohonan_fakjab'], 'required'],
            [['user_id', 'cawangan_id', 'statusPermohonan_id'], 'integer'],
            [['permohonan_tarikh'], 'safe'],
            [['permohonan_catitan'], 'string'],
            [['permohonan_pusatkos', 'permohonan_fakjab'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'permohonan_id' => 'Permohonan ID',
            'user_id' => 'ID Pemohon',
            'cawangan_id' => 'Cawangan',
            'statusPermohonan_id' => 'Status Permohonan',
            'permohonan_tarikh' => 'Tarikh Permohonan',
            'permohonan_pusatkos' => 'Pusat Kos',
            'permohonan_fakjab' => 'Fakulti / Jabatan',
            'permohonan_catitan' => 'Catitan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPerkaras()
    {
        return $this->hasMany(TblPerkara::className(), ['permohonan_id' => 'permohonan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCawangan()
    {
        return $this->hasOne(TblCawangan::className(), ['cawangan_id' => 'cawangan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusPermohonan()
    {
        return $this->hasOne(TblStatuspermohonan::className(), ['statusPermohonan_id' => 'statusPermohonan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
