<?php

class Authors extends CActiveRecord
{
	public function tableName()
	{
		return 'authors';
	}

    public function findByName($name)
    {
        return $this->find('username = :name', array(':name' => $name));
    }

	public function rules()
	{
		return array(
            array('username', 'unique', 'message' => 'User with current username is already exist'),
			array('username, password', 'required'),
			array('username, password', 'length', 'max'=>255),
			array('id, username, password', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'books' => array(self::MANY_MANY, 'Books', 'books_authors(author_id, book_id)'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
