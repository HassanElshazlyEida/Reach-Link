<?php

namespace App\Http\Controllers\Api;

use App\Classes\AdsRepository;
use App\Models\Ads;

use App\Models\User;
use App\Http\Requests\AdsFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdsCollection;

class AdsController extends Controller
{
    public function __construct(AdsRepository $repository){
        $this->repository = $repository;
        $this->repository->with('category','tags','advertiser');
    }
    public function filter(AdsFilter $request){

        if($request->category){
            $category=$request->category;
            $this->repository->whereHas('category',function($q) use ($category){
                return $q->where("name","LIKE","%{$category}%")
                ->orWhere("content","LIKE","%{$category}%");
            });
        }
        if($request->tag){
            $tag=$request->tag;
            $this->repository->orWhereHas('tags',function($q) use ($tag){
                return $q->where("title","LIKE","%{$tag}%");
            });
        }
        return response()->json(new AdsCollection($this->repository->get()));
    }
    public function advertiser(User $advertiser){
        return response()->json(new AdsCollection($advertiser->ads));
    }
}
