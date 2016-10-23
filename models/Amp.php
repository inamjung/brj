<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "amp".
 *
 * @property integer $id
 * @property string $name
 * @property integer $chw_id
 */
class Amp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chw_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'อำเภอ',
            'chw_id' => 'จังหวัด',
        ];
    }
    public function getChwamp(){
        return $this->hasOne(Chw::className(), ['id'=>'chw_id']);
    }
}
