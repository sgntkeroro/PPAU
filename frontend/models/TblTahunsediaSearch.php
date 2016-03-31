<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblTahunsedia;

/**
 * TblTahunsediaSearch represents the model behind the search form about `frontend\models\TblTahunsedia`.
 */
class TblTahunsediaSearch extends TblTahunsedia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tahunSedia_id', 'tahunSedia_tahun'], 'integer'],
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
        $query = TblTahunsedia::find();

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
            'tahunSedia_id' => $this->tahunSedia_id,
            'tahunSedia_tahun' => $this->tahunSedia_tahun,
        ]);

        return $dataProvider;
    }
}
