<?php

namespace models\dal;

use Authors;
use Yii;

class AuthorRepository extends \CApplicationComponent
{
    public function findByName($username) {
        return Authors::model()->findByName($username);
    }

    public function save(Authors $model) {
        return $model->save();
    }
}