<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_perkara".
 *
 * @property integer $perkara_id
 * @property integer $permohonan_id
 * @property integer $JK_id
 * @property integer $katPelanggan_id
 * @property integer $katPermohonan_id
 * @property integer $tahunSedia_id
 * @property string $perkara_nama
 * @property string $perkara_fakJab
 * @property string $perkara_kodakaun
 * @property integer $perkara_kuantiti
 * @property double $perkara_harga
 * @property double $perkara_jumlahHarga
 * @property string $perkara_tujuanPembelian
 * @property string $perkara_jenisPeruntukan
 * @property string $perkara_lokasiCadangan
 * @property string $perkara_bukuLog
 * @property string $perkara_programBaru
 * @property string $perkara_prgrmTahapPengajian
 * @property string $perkara_pegawai
 * @property string $perkara_pegawaiJawatan
 *
 * @property TblMesyuarat[] $tblMesyuarats
 * @property TblPermohonan $permohonan
 * @property TblKelulusanjk $jK
 * @property TblKatpelanggan $katPelanggan
 * @property TblKatpermohonan $katPermohonan
 * @property TblTahunsedia $tahunSedia
 */
class TblPerkara extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_perkara';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['permohonan_id', 'JK_id', 'katPelanggan_id', 'katPermohonan_id', 'tahunSedia_id', 'perkara_kuantiti'], 'integer'],
            [['perkara_nama', 'perkara_fakJab', 'perkara_kuantiti', 'perkara_harga', 'perkara_jumlahHarga', 'perkara_tujuanPembelian', 'perkara_jenisPeruntukan', 'perkara_lokasiCadangan'], 'required'],
            [['perkara_harga', 'perkara_jumlahHarga'], 'number'],
            [['perkara_nama', 'perkara_fakJab', 'perkara_kodakaun', 'perkara_tujuanPembelian', 'perkara_jenisPeruntukan', 'perkara_lokasiCadangan', 'perkara_bukuLog', 'perkara_programBaru', 'perkara_prgrmTahapPengajian', 'perkara_pegawai', 'perkara_pegawaiJawatan'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'perkara_id' => 'Perkara ID',
            'permohonan_id' => 'Permohonan ID',
            'JK_id' => 'Jk ID',
            'katPelanggan_id' => 'Kat Pelanggan ID',
            'katPermohonan_id' => 'Kat Permohonan ID',
            'tahunSedia_id' => 'Tahun Sedia ID',
            'perkara_nama' => 'Perkara Nama',
            'perkara_fakJab' => 'Perkara Fak Jab',
            'perkara_kodakaun' => 'Perkara Kodakaun',
            'perkara_kuantiti' => 'Perkara Kuantiti',
            'perkara_harga' => 'Perkara Harga',
            'perkara_jumlahHarga' => 'Perkara Jumlah Harga',
            'perkara_tujuanPembelian' => 'Perkara Tujuan Pembelian',
            'perkara_jenisPeruntukan' => 'Perkara Jenis Peruntukan',
            'perkara_lokasiCadangan' => 'Perkara Lokasi Cadangan',
            'perkara_bukuLog' => 'Perkara Buku Log',
            'perkara_programBaru' => 'Perkara Program Baru',
            'perkara_prgrmTahapPengajian' => 'Perkara Prgrm Tahap Pengajian',
            'perkara_pegawai' => 'Perkara Pegawai',
            'perkara_pegawaiJawatan' => 'Perkara Pegawai Jawatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMesyuarats()
    {
        return $this->hasMany(TblMesyuarat::className(), ['perkara_id' => 'perkara_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermohonan()
    {
        return $this->hasOne(TblPermohonan::className(), ['permohonan_id' => 'permohonan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJK()
    {
        return $this->hasOne(TblKelulusanjk::className(), ['JK_id' => 'JK_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKatPelanggan()
    {
        return $this->hasOne(TblKatpelanggan::className(), ['katPelanggan_id' => 'katPelanggan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKatPermohonan()
    {
        return $this->hasOne(TblKatpermohonan::className(), ['katPermohonan_id' => 'katPermohonan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTahunSedia()
    {
        return $this->hasOne(TblTahunsedia::className(), ['tahunSedia_id' => 'tahunSedia_id']);
    }
}
