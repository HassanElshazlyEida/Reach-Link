<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Classes\CategoryRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends BaseApiController
{
    /**
     * @var CategoryRepository
     */
    public function __construct(CategoryRepository $repository){
        $this->repository = $repository;
    }
}
