<?php

namespace App\Http\Controllers\Api;

use App\Classes\TagRepository;
use App\Http\Controllers\Api\BaseApiController;

class TagController extends BaseApiController
{
    /**
    * @var TagRepository
    */
   public function __construct(TagRepository $repository){
       $this->repository = $repository;
   }




}
