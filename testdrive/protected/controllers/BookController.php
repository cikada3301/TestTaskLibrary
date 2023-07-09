<?php

include ('\IWL\LibraryTask\testdrive\protected\models\forms\BookForm.php');

class BookController extends Controller
{
    private $bookRepository;
    private $authorRepository;

    public function actionAdd()
    {
        $this->bookRepository = Yii::app()->bookRepository;
        $this->authorRepository = Yii::app()->authorRepository;

        $authUser = Yii::app()->user;

        $author = $this->authorRepository->findByName($authUser->id);

        $model = new BookForm;
        if (isset($_POST['BookForm'])) {
            $model->attributes = $_POST['BookForm'];
            $model->file = CUploadedFile::getInstance($model, 'file');
            if ($model->validate()) {
                $book = new Books();
                $book->name = $model->name;
                $book->description = $model->description;

                if ($model->file != null) {
                    $book->file = file_get_contents($model->file->tempName);
                }

                $book->save();

                $this->saveBooksAuthors($model, $author);
                $this->saveBooksGenres($model);

                $this->redirect(array('site/index'));
            }
        }
        $this->render('/site/bookform', array('model' => $model));
    }

    public function actionDownload() {
        $book = Books::model()->findByPk($_GET['id']);
        $data = $book->file;

        $tempFile = tempnam(sys_get_temp_dir(), 'zip');
        file_put_contents($tempFile, $data);
        $zip = zip_open($tempFile);

        $zipFile = tempnam(sys_get_temp_dir(), 'zip');
        $zipArchive = new ZipArchive();
        $zipArchive->open($zipFile, ZipArchive::CREATE);
        while ($zipEntry = zip_read($zip)) {
            $entryName = zip_entry_name($zipEntry);
            $entrySize = zip_entry_filesize($zipEntry);
            $entryData = zip_entry_read($zipEntry, $entrySize);
            $zipArchive->addFromString($entryName, $entryData);
        }
        $zipArchive->close();

        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $book->name . '.zip"');
        header('Content-Length: ' . filesize($zipFile));
        readfile($zipFile);

        unlink($tempFile);
        unlink($zipFile);
    }

    private function saveBooksGenres(BookForm $model)
    {
        foreach ($model->genres as $genreId) {
            $bookGenres = new BooksGenres();
            $bookId = $this->bookRepository->findByName($model->name);
            $bookGenres->book_id = $bookId->id;
            $bookGenres->genre_id = $genreId;
            $bookGenres->save();
        }
    }

    private function saveBooksAuthors($model, $author)
    {
        $bookAuthors = new BooksAuthors();
        $bookId = $this->bookRepository->findByName($model->name);
        $bookAuthors->author_id = $author->id;
        $bookAuthors->book_id = $bookId->id;
        $bookAuthors->save();
    }
}