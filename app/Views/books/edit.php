<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1><?= esc($title) ?></h1>
    <form method="POST" action="/books/<?= esc($book['id'], 'url') ?>">
        <input type="hidden" name="_method" value="PUT" />
        <div class="form-floating mb-3">
            <input class="form-control" id="inputTitle" type="text" placeholder="Title" name="name" value="<?= esc($book['name']) ?>" required />
            <label for="inputTitle">Title</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputYear" type="number" placeholder="Year" name="year" value="<?= esc($book['year']) ?>" required />
            <label for="inputYear">Year</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputAuthor" type="text" placeholder="Author" name="author" value="<?= esc($book['author']) ?>" required />
            <label for="inputAuthor">Author</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" id="inputSummary" placeholder="Summary" name="summary" rows="10" required><?= esc($book['summary']) ?></textarea>
            <label for="inputSummary">Summary</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputPublisher" type="text" placeholder="Publisher" name="publisher" value="<?= esc($book['publisher']) ?>" required />
            <label for="inputPublisher">Publisher</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputPageCount" type="number" placeholder="Page Count" name="pageCount" value="<?= esc($book['pageCount']) ?>" required />
            <label for="inputPageCount">Page Count</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputReadPage" type="number" placeholder="Read Page" name="readPage" value="<?= esc($book['readPage']) ?>" required />
            <label for="inputReadPage">Read Page</label>
        </div>
        <div class="form-check mb-3">
            <input type="hidden" name="reading" value=0 />
            <input class="form-check-input" id="inputReading" type="checkbox" name="reading" value=1 <?= $book['reading'] == 1 ? 'checked' : '' ?> />
            <label class="form-check-label" for="inputReading">Reading</label>
        </div>
        <div class="form-check mb-3">
            <input type="hidden" name="finished" value=0 />
            <input class="form-check-input" id="inputFinished" type="checkbox" name="finished" value=1 <?= $book['finished'] == 1 ? 'checked' : '' ?> />
            <label class="form-check-label" for="inputFinished">Finished</label>
        </div>
        <input type="hidden" name="user_id" value="<?= esc(session()->get('id')) ?>">
        <input type="submit" class="btn btn-primary" value="Edit" />
    </form>

    <?= $this->endSection() ?>