<?php

class UserIdentity extends CUserIdentity
{
    private $authorRepository;

    public function authenticate()
    {
        $this->authorRepository = Yii::app()->authorRepository;
        $author = $this->authorRepository->findByName($this->username);
        if ($author == null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($author->password != $this->password) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }
        else
            $this->errorCode = self::ERROR_NONE;
        return !$this->errorCode;
    }
}