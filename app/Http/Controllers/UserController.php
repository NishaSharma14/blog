<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $status_code = 200;
    
    //------------[User SignUp]-------------
    public function userSignUp(Request $request){
        $validator      = Validator::make($request->all(),[
            "name"      =>  "required",
            "email"     => "required|email",
            "password"  => "required",
            "phone"     => "required"

        ]);

        if($validator->fails()){
            return response()->json(["status"   =>  "failed", "message" => "validation_error", "errors" => $validator->errors()]);
        }
        $name = $request->name;
        $name = explode(" ", $name);
        $first_name = $name[0];
        $last_name = "";
        
        if(isset($name[1])){
            $last_name = $name[1];
        }

        $userDataArray  =   array(
            "first_name" => $first_name,
            "last_name"  => $last_name,
            "full_name"  => $request->name,
            "email"      => $request->email,
            "password"   => md5($request->password),
            "phone"      => $request->phone
        );
        // $user_status = User::where("email", $request->email)->first();
        // //$user = User::create($userDataArray);
        // if(!is_null($userDataArray)){
        //     return response()->json(["status" => "true", "success" => true, "data" => $userDataArray, "userStatus" => $user_status]);

        // }
        
        $user_status = User::where("email", $request->email)->first();
        if(!is_null($user_status)){
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! email already registered"]);
        }
        
        $user = User::create($userDataArray);
            
        if(!is_null($user)){
            return response()->json(["status" => $this->status_code, "success" => true, "message" => "Registration completed successfully", "data" => $user]);
        }

        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "failed to register"]);
        }
    }

}
