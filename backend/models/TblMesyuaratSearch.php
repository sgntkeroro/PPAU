<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblMesyuarat;

/**
 * TblMesyuaratSearch represents the model behind the search form about `backend\models\TblMesyuarat`.
 */
class TblMesyuaratSearch extends TblMesyuarat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mesyuarat_id', 'perkara_id', 'mesyuarat_kuantiti', 'statusMesyuarat_id'], 'integer'],
            [['mesyuarat_tarikh', 'mesyuarat_catitan'], 'safe'],
            [['mesyuarat_jumlah'], 'number'],
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
        $query = TblMesyuarat::find();

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
            'mesyuarat_id' => $this->mesyuarat_id,
            'perkara_id' => $this->perkara_id,
            'mesyuarat_tarikh' => $this->mesyuarat_tarikh,
            'mesyuarat_kuantiti' => $this->mesyuarat_kuantiti,
            'mesyuarat_jumlah' => $this->mesyuarat_jumlah,
            'statusMesyuarat_id' => $this->statusMesyuarat_id,
        ]);

        $query->andFilterWhere(['like', 'mesyuarat_catitan', $this->mesyuarat_catitan]);

        return $dataProvider;
    }
}
