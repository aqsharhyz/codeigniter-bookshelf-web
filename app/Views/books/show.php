<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1><?= esc($title) ?></h1>
    <div class="card" style="width: 80%;">
        <div class="card-body">
            <h3 class="card-title text-primary"><?= esc($book['name']) ?></h3>
            <h5 class="card-subtitle mb-2 text-muted"><?= esc($book["author"]) ?></h5>
            <p class="card-text"><?= esc($book['summary']) ?></p>
            <p class="card-text">Published by: <?= esc($book['publisher']) ?></p>
            <p class="card-text">Year: <?= esc($book['year']) ?></p>
            <p class="card-text">Page Count: <?= esc($book['pageCount']) ?></p>
            <p class="card-text">Read Page: <?= esc($book['readPage']) ?></p>
            <p class="card-text">Reading: <?= esc($book['reading']? "Yes":"No") ?></p>
            <p class="card-text">Finished: <?= esc($book['finished']? "Yes":"No") ?></p>
            <button type="button" class="btn btn-primary"><a href="/books/<?= esc($book['id'], 'url') ?>/edit" class="text-white">Edit</a></button>
            <form action="/books/<?= esc($book['id'], 'url') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE" />
                <input type="hidden" name="id" value="<?= esc($book['id']) ?>">
                <button type="submit" class="btn btn-danger">Delete Book</button>
            </form>
            <p><a href="/books">Back</a></p>
        </div>
    </div>
<?= $this->endSection() ?>
