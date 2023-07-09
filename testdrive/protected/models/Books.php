<?php

class Books extends CActiveRecord
{
	public function tableName()
	{
		return 'books';
	}

	public function rules()
	{
		return array(
			array('name, description', 'required'),
			array('name, description', 'length', 'max'=>255),
			array('file', 'safe'),
			array('id, name, description, file', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'authors' => array(self::MANY_MANY, 'Authors', 'books_authors(book_id, author_id)'),
			'genres' => array(self::MANY_MANY, 'Genres', 'books_genres(book_id, genre_id)'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'file' => 'File',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('file',$this->file,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
