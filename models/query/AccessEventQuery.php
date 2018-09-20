<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[AccessEvent]].
 *
 * @see \app\models\AccessEvent
 */
class AccessEventQuery extends \yii\db\ActiveQuery

{
    /*public function active()
       {
           return $this->andWhere('[[status]]=1');
       }*/

    /**
     * @inheritdoc
     * @return \app\models\AccessEvent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\AccessEvent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}

