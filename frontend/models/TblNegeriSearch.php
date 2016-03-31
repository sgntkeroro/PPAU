<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblNegeri;

/**
 * TblNegeriSearch represents the model behind the search form about `frontend\models\TblNegeri`.
 */
class TblNegeriSearch extends TblNegeri
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['negeri_id'], 'integer'],
            [['negeri_nama'], 'safe'],
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
        $query = TblNegeri::find();

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
            'negeri_id' => $this->negeri_id,
        ]);

        $query->andFilterWhere(['like', 'negeri_nama', $this->negeri_nama]);

        return $dataProvider;
    }
}
