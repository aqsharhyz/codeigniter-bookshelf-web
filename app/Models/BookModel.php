<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table            = 'book';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'user_id',
        'year',
        'author',
        'summary',
        'publisher',
        'pageCount',
        'readPage',
        'finished',
        'reading',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [
        
    ];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected $rule = [
        'name' => 'required|max_length[100]',
        'user_id' => 'required|numeric|max_length[11]',
        'year' => 'required|numeric|max_length[4]',
        'author' => 'required|max_length[100]',
        'publisher' => 'required|max_length[100]',
        'summary' => 'required|max_length[5000]',
        'pageCount' => 'required|numeric|max_length[6]',
        'readPage' => 'required|numeric|max_length[6]',
        'finished' => 'integer|in_list[0,1]',
        'reading' => 'integer|in_list[0,1]',
    ];
    
    protected function validateReadPage(array $data) {
        return $data['readPage'] <= $data['pageCount'];
    }

    public function getBooks($id = false){
        if($id === false){
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }

    public function createBook($data) {
        
    }
}
