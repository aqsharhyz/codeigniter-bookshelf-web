<?php

namespace App\Controllers;

use App\Models\BookModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Books extends ResourceController
{
    // protected $bookModel = model(BookModel::class);

    public function index()
    {
        // $query = $this->request->getUri()->getQuery(['only' => ['name']]);
        $query = (string) $this->request->getGet('search');
        // dd($author);
        $model = model(BookModel::class);
        if ($query) {
            $data['books'] = $model->select('name, author, id')
                ->like('LOWER(name)', strtolower($query))
                ->orGroupStart()
                ->like('LOWER(author)', strtolower($query))
                ->groupEnd()
                ->where('user_id', session()->get('id'))
                ->findAll(10);
        } else {
            $data['books'] = $model->select('name, author, id')->where('user_id', session()->get('id'))->findAll(10);
        }
        $data['title'] = 'Books';
        return view('books/index', $data);
        // return $this->respond($data['books']);
    }

    public function new()
    {
        return view('books/create');
    }

    public function create()
    {
        $data = $this->request->getPost([
            'name',
            'year',
            'author',
            'publisher',
            'summary',
            'pageCount',
            'readPage',
            'finished',
            'reading',
            'user_id'
        ]);


        // $data = $this->request->getRawInput();
        // $data = $this->request->getPostGet('name');

        // echo $data;

        // dd($data);

        // var_dump($data);

        // print_r($data);


        $model = model(BookModel::class);
        if (!$this->validateData($data, $model->rule)) {
            return $this->fail($this->validator->getErrors());
        }

        $post = $this->validator->getValidated();

        $model->save($post);

        $id = $model->insertID();

        // return $this->respondCreated($post);

        return redirect()->to("/books/$id");
    }

    public function show($id = null)
    {
        $model = model(BookModel::class);

        if ($id === null) {
            // return respond 'must provide an id', 400
            return $this->fail('must provide an id', ResponseInterface::HTTP_BAD_REQUEST);
        }

        $data = [
            'book' => $model->find($id),
            'title' => 'Book Details',
        ];

        if ($data['book'] === null) {
            return $this->fail('cannot find book for the provided id', ResponseInterface::HTTP_NOT_FOUND);
        } else if ($data['book']['user_id'] !== session()->get('id')) {
            return $this->fail('cannot find book for the provided id', ResponseInterface::HTTP_NOT_FOUND);
        }

        return view('books/show', $data);
        // return $this->respond($data['book']);
    }

    public function edit($id = null)
    {
        $model = model(BookModel::class);

        $data = [
            'book' => $model->find($id),
            'title' => 'Edit Book',
        ];
        return view('books/edit', $data);
    }

    public function update($id = null)
    {
        $data = $this->request->getPost([
            'name',
            'year',
            'author',
            'publisher',
            'summary',
            'pageCount',
            'readPage',
            'finished',
            'reading',
            'user_id',
        ]);

        // dd($data);

        if ($id === null) {
            // return respond 'must provide an id', 400
            return $this->fail('must provide an id', ResponseInterface::HTTP_BAD_REQUEST);
        }

        $model = model(BookModel::class);

        if (!$this->validateData($data, $model->rule)) {
            return $this->fail($this->validator->getErrors());
        }

        $post = $this->validator->getValidated();

        $model->where('id', $id)->set($post)->update();

        // return $this->respondCreated($post);

        return $this->show($id);
    }

    public function delete($id = null)
    {
        if ($id === null) {
            return $this->fail('must provide an id', ResponseInterface::HTTP_BAD_REQUEST);
        }

        dd(session()->get('id'));

        $model = model(BookModel::class);
        $book = $model->find($id);

        if ($book === null) {
            return $this->fail('cannot find book for the provided id', ResponseInterface::HTTP_NOT_FOUND);
        } else if ($book['user_id'] !== session()->get('id')) {
            return $this->fail('cannot find book for the provided id', ResponseInterface::HTTP_NOT_FOUND);
        }

        $model->delete($id);

        return redirect()->to('/books');
    }
}
