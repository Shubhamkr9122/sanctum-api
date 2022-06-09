<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\User;

class StudentController extends Controller
{
    public function index(){
        $student = Student::all();

        return $student;
    }

    public function showSingleRecord($id){
        $student = Student::find($id);
        return $student;
    }

    public function storeRecord(Request $req){
            $stu = new Student();

            $req->validate([
                'name'=>'required',
                'email'=>'required',
                'age'=>'required|integer'
            ]);

            $stu->name = $req->name;
            $stu->email = $req->email;
            $stu->age = $req->age;

            $stu->save();
            // return response([
            //     'name'=>$stu->name,
            //     'email'=>$stu->email,
            //     'age'=>$stu->age
            // ]);

            return response($stu);
    }

    public function updateRecord(Request $req ,$id){
        $stu = Student::find($id);

        // return $req;
        // $stu->name = $req->name;
        // $stu->email = $req->email;
        // $stu->age = $req->age;

        $stu->update($req->all());        

        return response($stu);
    }

    public function deleteRecord($id){
        $stu = Student::find($id)->delete();

        return response([
            'status'=>'200',
            'msg'=>'Record Deleted'
        ]);
    }


    public function register(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        //Generte access token using sanctum
        $token = $user->createToken('mytoken')->plainTextToken;

        return response([
            'msg'=>'Token Created Successfully',
            'token'=>$token
        ]);
    }

    public function login(Request $request){
        // return $request;
        // $user = new User();
        $result = User::where('email',$request->email)->first();
        // dd($email);

        
        if(!$result){
            return response()->json([
                'status'=>'0',
                'msg'=>'Email Not Matching!'
            ]);
        }elseif(isset($result)){
        

            if(Hash::check($request->password,$result->password)){
                $token= $result->createToken('mytoken')->plainTextToken;

                return response()->json([
                    'status'=>'0',
                    'msg'=>'Login Successfully!',
                    'token'=>$token
                ]); 

                

            }else{
                return response()->json([
                    'status'=>'0',
                    'msg'=>'Incorrect Password!'
                ]);
            }
        }
        
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return response([
            'status'=>'200',
            'msg'=>'Logout Success,Token Deleted'
        ]);
    }
}
