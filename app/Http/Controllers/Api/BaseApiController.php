<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use App\Classes\Responseobject;
use App\Traits\GeneralApiTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\BaseFormRequest;

abstract class BaseApiController extends Controller
{
    use GeneralApiTrait;


    public function all($routeParams)
    {

        return $this->repository->paginate();
    }

    public function index(...$routeParams)
    {
        return response()->json($this->all($routeParams));
    }


    public function show($id)
    {

        return response()->json($this->repository->find($id));
    }

    public function store(BaseFormRequest $request)
    {
        return response()->json($this->repository->create($request->validated()));
    }


    public function update($id,Request $request)
    {

        return response()->json($this->repository->update($request->all(),$id));
    }


    public function destroy($id)
    {
        $is_deleted=$this->repository->destroy($id);
        if($is_deleted){
            return $this->returnSuccess(__("Model has been deleted successfully"));
        }else {
            return $this->failed_response(Responseobject::status_failed,Responseobject::code_not_found,__("Not found"));
        }
    }

}
