<?php

namespace App\Http\Controllers\Api;


use App\Classes\CategoryRepository;


class CategoryController extends BaseApiController
{
    /**
     * @var CategoryRepository
     */
    public function __construct(CategoryRepository $repository){
        $this->repository = $repository;
    }


}
