<?php

class BooksGenres extends CActiveRecord
{
	public function tableName()
	{
		return 'books_genres';
	}

	public function rules()
	{
		return array(
			array('book_id, genre_id', 'required'),
			array('book_id, genre_id', 'numerical', 'integerOnly'=>true),
			array('book_id, genre_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array();
	}

	public function attributeLabels()
	{
		return array(
			'book_id' => 'Book',
			'genre_id' => 'Genre',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('book_id',$this->book_id);
		$criteria->compare('genre_id',$this->genre_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
