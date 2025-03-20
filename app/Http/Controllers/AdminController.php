<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{

    public function index(){
        $admins = DB::table('tbl_admin')
        ->orderBy('id', 'asc')
        ->get();
        return view('admins.list', compact('admins'));
    }


    public function list(){
        $admins = DB::table('tbl_admin')
        ->orderBy('id', 'asc')
        ->get();
        return view('admins.list', compact('admins'));
    }

    public function adding() {
        $id = null;
        $name = null;
        $username = null;
        $phone = null;
        $password = null;
        
        return view('admins.create', compact('id', 'name', 'username', 'phone', 'password'));
    }

    public function create(Request $request) {

        $validator = Validator::make($request->all(),
        [
            'name' => 'required|min:3',
            'phone' => 'required|min:10|max:10',
            'username' => 'required|email|unique:tbl_admin',
            'password' => 'required|min:3'
        ]);

        if($validator->fails()){
            return redirect('admins/adding')
            ->withErrors($validator)
            ->withInput();
        }

        $admin = DB::table('tbl_admin')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);

        Alert::success('Insert Successfully');
        return redirect('/admins');
    }


    public function edit($id){
        $admin = DB::table('tbl_admin')->where('id', $id)->first();

        if(isset($admin)){
            $id = $admin->id;
            $name = $admin->name;
            $phone = $admin->phone;
            $username = $admin->username;

            return view('admins.edit', compact('id', 'name', 'phone', 'username'));
        }
    }

    public function update($id, Request $request) {

        $validator = Validator::make($request->all(),
        [
            'name' => 'required|min:3',
            'phone' => 'required|min:3',
            'username' => [
                'required',
                'email',
                Rule::unique('tbl_admin')->ignore($id), // อนุญาตให้อัปเดตเป็น
            ],
        ]);

        if($validator->fails()){
            return redirect('admins/'.$id)
            ->withErrors($validator)
            ->withInput();
        }


        $admin = DB::table('tbl_admin')->where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'username' => $request->username,
        ]);
        Alert::success('Update Successfully');
        return redirect('/admins');
    }

   
   
    public function reset($id){
        $admin = DB::table('tbl_admin')->where('id', $id)->first();
        if(isset($admin)){
            $id = $admin->id;
            $name = $admin->name;
            $phone = $admin->phone;
            $username = $admin->username;

            return view('admins.editPassword', compact('id', 'name', 'username'));
        }
    }


    public function updatePwd($id, Request $request) {
 
                $validator = Validator::make($request->all(),
                [
                    'password' => 'required|min:3|confirmed',
                    'password_confirmation' => 'required|min:3'
                ]);

                if($validator->fails()){
                    return redirect('admins/reset/'.$id)
                    ->withErrors($validator)
                    ->withInput();
                }

                $admin = DB::table('tbl_admin')->where('id', $id)->update([
                    'password' => bcrypt($request->password)
                 ]);
                 Alert::success('Reset Password Successfully');
                return redirect('/admins');
    }

    


    public function remove($id) {
        $admin = DB::table('tbl_admin')->where('id', $id)->delete();
        Alert::success('Delete Successfully');
        return redirect('admins');
    }



} //class
