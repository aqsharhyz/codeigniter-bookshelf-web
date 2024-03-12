<?= $this->extend('layouts/main') ?>


<?= $this->section('content') ?>

<div class="container">
    <h1><?= esc($title) ?></h1>
    <form class="d-flex" role="search" action="/books" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="col-1">#</th>
                <th scope="col" class="col-4">Title</th>
                <th scope="col" class="col-2">Author</th>
                <th scope="col" class="col-6">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php if (!empty($books) && is_array($books)) : ?>

                <?php foreach ($books as $books_item) : ?>
                    <tr>
                        <th scope="row"><?= esc($i) ?></th>
                        <td><?= esc($books_item['name']) ?></td>
                        <td><?= esc($books_item['author']) ?></td>
                        <td>
                            <div class="container d-flex justify-space-around">
                                <button type="button" class="btn btn-primary"><a href="/books/<?= esc($books_item['id'], 'url') ?>" class="text-white">Detail</a></button>
                                <button type="button" class="btn btn-warning"><a href="/books/<?= esc($books_item['id'], 'url') ?>/edit">Edit</a></button>
                                <form action="/books/<?= esc($books_item['id'], 'url') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="hidden" name="id" value="<?= esc($books_item['id']) ?>">
                                    <button type="submit" class="btn btn-danger">Delete Book</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach ?>
            <?php else : ?>

                <tr>
                    <td colspan="3">No Books</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>