<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblPermohonan;

/**
 * TblPermohonanSearch represents the model behind the search form about `frontend\models\TblPermohonan`.
 */
class TblPermohonanSearch extends TblPermohonan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['permohonan_id', 'user_id', 'cawangan_id', 'statusPermohonan_id'], 'integer'],
            [['permohonan_tarikh', 'permohonan_pusatkos', 'permohonan_fakjab', 'permohonan_catitan'], 'safe'],
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
        $query = TblPermohonan::find();

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
            'permohonan_id' => $this->permohonan_id,
            'user_id' => $this->user_id,
            'cawangan_id' => $this->cawangan_id,
            'statusPermohonan_id' => $this->statusPermohonan_id,
            'permohonan_tarikh' => $this->permohonan_tarikh,
        ]);

        $query->andFilterWhere(['like', 'permohonan_pusatkos', $this->permohonan_pusatkos])
            ->andFilterWhere(['like', 'permohonan_fakjab', $this->permohonan_fakjab])
            ->andFilterWhere(['like', 'permohonan_catitan', $this->permohonan_catitan]);

        return $dataProvider;
    }
}
