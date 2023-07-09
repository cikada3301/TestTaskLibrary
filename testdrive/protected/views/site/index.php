<?php
$this->pageTitle = Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<h2>List of Books: </h2>

<div class="container" style="max-width: 90%">
    <div class="row">
        <?php foreach ($books as $book): ?>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Name: <?php echo $book->name; ?></h2>
                        <p class="card-subtitle mb-4">Description: <?php echo $book->description; ?></p>
                        <p class="card-text">Genres: <?= implode(', ', array_map(function ($genre) {
                                return $genre->name;
                            }, $book->genres)) ?> </p>
                        <p class="card-text">Authors: <?= implode(', ', array_map(function ($author) {
                                return $author->username;
                            }, $book->authors)) ?> </p>
                        <?php if ($book->file != null): ?>
                            <a class="btn btn-primary"
                               href="<?php echo $this->createUrl('book/download', array('id' => $book->id)); ?>">Download</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

