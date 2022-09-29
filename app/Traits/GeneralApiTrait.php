<?php
namespace  App\Traits;

use App\Classes\Responseobject;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

trait GeneralApiTrait {

    public function failed($validator)
    {
        $response   = new Responseobject();
        $response->status = $response::status_failed;
        $response->code = $response::code_failed;
        foreach ($validator->errors()->getMessages() as $item) {
            array_push($response->msg, $item);
        }

        return Response::json(
            $response
        );
    }
    public function failed_response($status,$code,$msg)
    {
        $response   = new Responseobject();
        $response->status = $status;
        $response->code = $code;
        $response->msg= $msg;
        return Response::json(
            $response
        );
    }
    public function returnError($msg){
        return response()->json([
            'status'=>false,
            "msg"=>$msg
        ]);
    }
    public function errorField($field){
        $massage = __($field.' required');
        return response()->json([
            "msg" => $massage,
            "status" => false
        ]);
    }

    public function returnSuccess($msg=""){
        return response()->json([
            'status'=>true,
            "msg"=>$msg
        ]);
    }
    public function returnData($key,$value,$msg="",array $extra=[]){
        return $this->data($key,$value,$msg,true,$extra);
    }
    public function returnFailData($key,$value,$msg="",array $extra=[]){

        return $this->data($key,$value,$msg,false,$extra);
    }
    public function data($key,$value,$msg="",$status,array $extra=[]){

        if (!empty($extra)) {
            foreach ($extra as $key => $value) {
                $data[$key] = $value;
            }
        }
        $data = [
            $key=>$value,
            'status'=>$status,
            "msg"=>$msg
        ];
        return response()->json($data);

    }
    public function ValidatorMessages($messages){
        $data = [
            'status'=>false,
            "msg"=>'validation failed'
        ];
        if (!empty($messages)) {
            $data["msg"] = array_values($messages)[0][0];
        }
        return response()->json($data);
    }

    public function returnValidationError($validator){
        return $this->returnError($validator->errors()->first());
    }

    public function Validator($request, $rules, $niceNames = [])
    {
        return Validator::make($request->all(), $rules, [], $niceNames);
    }
    public function validated($request, $rules, $niceNames = []){
        $valid=$this->Validator($request, $rules, $niceNames);
        if($valid->fails()){
            return $this->returnValidationError($valid);
        }else {
            return true;
        }
    }

}
