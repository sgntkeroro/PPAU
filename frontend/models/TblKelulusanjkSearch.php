<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblKelulusanjk;

/**
 * TblKelulusanjkSearch represents the model behind the search form about `frontend\models\TblKelulusanjk`.
 */
class TblKelulusanjkSearch extends TblKelulusanjk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JK_id'], 'integer'],
            [['JK_nama'], 'safe'],
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
        $query = TblKelulusanjk::find();

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
            'JK_id' => $this->JK_id,
        ]);

        $query->andFilterWhere(['like', 'JK_nama', $this->JK_nama]);

        return $dataProvider;
    }
}
