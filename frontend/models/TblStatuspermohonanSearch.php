<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblStatuspermohonan;

/**
 * TblStatuspermohonanSearch represents the model behind the search form about `frontend\models\TblStatuspermohonan`.
 */
class TblStatuspermohonanSearch extends TblStatuspermohonan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statusPermohonan_id'], 'integer'],
            [['statusPermohonan_nama'], 'safe'],
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
        $query = TblStatuspermohonan::find();

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
            'statusPermohonan_id' => $this->statusPermohonan_id,
        ]);

        $query->andFilterWhere(['like', 'statusPermohonan_nama', $this->statusPermohonan_nama]);

        return $dataProvider;
    }
}
