<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblCawangan;

/**
 * TblCawanganSearch represents the model behind the search form about `backend\models\TblCawangan`.
 */
class TblCawanganSearch extends TblCawangan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cawangan_id', 'negeri_id'], 'integer'],
            [['cawangan_nama', 'cawangan_poskod'], 'safe'],
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
        $query = TblCawangan::find();

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
            'cawangan_id' => $this->cawangan_id,
            'negeri_id' => $this->negeri_id,
        ]);

        $query->andFilterWhere(['like', 'cawangan_nama', $this->cawangan_nama])
            ->andFilterWhere(['like', 'cawangan_poskod', $this->cawangan_poskod]);

        return $dataProvider;
    }
}
