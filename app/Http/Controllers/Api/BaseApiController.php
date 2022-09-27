<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Http\Requests\BaseFormRequest;


abstract class BaseApiController
{


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
        
        return response()->json($this->repository->create($request->all()));
    }


    public function errorStore(Exception $e, $params = [])
    {
        return response()->json([
            'error' => true,
            'message' => $this->errorMessage($e),
            'exception' => $e->getTrace(),
        ]);
    }


    public function update($response, $params = [])
    {
        $response['model'] = app($this
            ->repository
            ->presenter())
            ->getTransformer()
            ->transform($response['model']);
        return response()->json($response);
    }


    public function errorUpdate(Exception $e, $params = [])
    {
        return response()->json([
            'error' => true,
            'message' => $this->errorMessage($e)
        ]);
    }


    public function destroy($response, $params = [])
    {
        $response['model'] = app($this
            ->repository
            ->presenter())
            ->getTransformer()
            ->transform($response['model']);
        return response()->json($response);
    }


    public function errorDestroy(Exception $e, $params = [])
    {
        return response()->json([
            'error' => true,
            'message' => $this->errorMessage($e)
        ]);
    }
}
