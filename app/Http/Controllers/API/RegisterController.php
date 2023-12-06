<?php

use illuminate\Http\Request;
use App\Http\Contorller\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterController extends BaseController{
    public function register(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|sam:password',
            'role'=>'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.',$validator->errors());
        }

        $input=$request->all();
        $input['password']=bcrypt($input['password']);
        $user = User::create($input);
        $success['token']=$user->createToken($request->username)->plainTextToken;
        $success['name']= $user->name;

        return $this->sendResponse($success,'User register successfully.');
    }

    public function login(Request $request){
        // if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        //     $user=Auth::user();
        //     $success['token']=$user->createToken('Myapp')->plainTextToken;
        //     $success['name']=$user->name;

        //     return $this->sendResponse($success,'User login successfully.');


        // }else{
        //     return $this->sendError('Unauthorized.',['error'=>'Unauthorized']);
        // }

        $request->validate([
            'username'=>'required',
            'password'=>'required',
            'device_name'=>'required',
        ]);

        $user=User::where('username',$request->userame)->first();

        if(! $user|| !Hash::check($request->password,$user->password)){
            return $this->sendError('Validation Error.','The Provided credentialsare incorrect');
        }
        $success['token']=$user->createToken($request->device_name)->plainTextToken;
        $success['name']=$user->name;
        return$this->sendResponse($success,'User login successfully.');
    }
}











?>