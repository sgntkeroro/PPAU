<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblPerkara;

/**
 * TblPerkaraSearch represents the model behind the search form about `frontend\models\TblPerkara`.
 */
class TblPerkaraSearch extends TblPerkara
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perkara_id', 'permohonan_id', 'JK_id', 'katPelanggan_id', 'katPermohonan_id', 'tahunSedia_id', 'perkara_kuantiti'], 'integer'],
            [['perkara_nama', 'perkara_fakJab', 'perkara_kodakaun', 'perkara_tujuanPembelian', 'perkara_jenisPeruntukan', 'perkara_lokasiCadangan', 'perkara_bukuLog', 'perkara_programBaru', 'perkara_prgrmTahapPengajian', 'perkara_pegawai', 'perkara_pegawaiJawatan'], 'safe'],
            [['perkara_harga', 'perkara_jumlahHarga'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TblPerkara::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'perkara_id' => $this->perkara_id,
            'permohonan_id' => $this->permohonan_id,
            'JK_id' => $this->JK_id,
            'katPelanggan_id' => $this->katPelanggan_id,
            'katPermohonan_id' => $this->katPermohonan_id,
            'tahunSedia_id' => $this->tahunSedia_id,
            'perkara_kuantiti' => $this->perkara_kuantiti,
            'perkara_harga' => $this->perkara_harga,
            'perkara_jumlahHarga' => $this->perkara_jumlahHarga,
        ]);

        $query->andFilterWhere(['like', 'perkara_nama', $this->perkara_nama])
            ->andFilterWhere(['like', 'perkara_fakJab', $this->perkara_fakJab])
            ->andFilterWhere(['like', 'perkara_kodakaun', $this->perkara_kodakaun])
            ->andFilterWhere(['like', 'perkara_tujuanPembelian', $this->perkara_tujuanPembelian])
            ->andFilterWhere(['like', 'perkara_jenisPeruntukan', $this->perkara_jenisPeruntukan])
            ->andFilterWhere(['like', 'perkara_lokasiCadangan', $this->perkara_lokasiCadangan])
            ->andFilterWhere(['like', 'perkara_bukuLog', $this->perkara_bukuLog])
            ->andFilterWhere(['like', 'perkara_programBaru', $this->perkara_programBaru])
            ->andFilterWhere(['like', 'perkara_prgrmTahapPengajian', $this->perkara_prgrmTahapPengajian])
            ->andFilterWhere(['like', 'perkara_pegawai', $this->perkara_pegawai])
            ->andFilterWhere(['like', 'perkara_pegawaiJawatan', $this->perkara_pegawaiJawatan]);

        return $dataProvider;
    }
}
