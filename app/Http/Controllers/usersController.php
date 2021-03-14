<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Http\Requests\createUserRequest;
use App\Http\Requests\updateUserRequest;
use Illuminate\Support\Facades\Session;

class usersController extends Controller
{
    public function index(){
    	$this->data['users']      	  = User::all();
    	return view('users.users',$this->data);
    }

    public function show( $id ){

    	$this->data['user']           = User::findOrFail($id);

    	return view('users.show',$this->data);

    }

    public function create(){
    	// $groups = Group::all();
    	// $this->data['groups'] = [];
    	// foreach ($groups as $group) {
    	// 	$this->data['groups'][$group->id] = $group->tittle;
    	// }
    	$this->data['groups']       = Group::findGroupTittle();
    	$this->data['headline1']    = 'Create User';
    	$this->data['headline2']  	= 'New User';
    	$this->data['button']		= 'Create User';

    	return view('users.form',$this->data);
    }
     public function store( createUserRequest $request ){
     	$fromData = $request->all();
     	if(User::create($fromData)){
   			Session::flash('message','User Created Successfully!');
   		}
   		return redirect()->to('users');
    }

    public function edit( $id ){
    	$this->data['user'] 		= User::findOrFail($id);
    	$this->data['groups']		= Group::findGroupTittle();
    	$this->data['headline1']    = 'Update User Information';
    	$this->data['headline2']  	= 'Update User';
    	$this->data['button']		=  'Update User';

    	return view('users.form',$this->data);

    }
    public function update( updateUserRequest $request, $id){

    	$data = $request->all();

    	$user = User::findOrFail($id);
    	$user->name 				= $data['name'];
    	$user->email 				= $data['email'];
    	$user->phone 				= $data['phone'];
    	$user->address 				=$data['address'];
    	$user->group_id			    = $data['group_id'];
    	if($user->save()){
    		Session::flash('message','User Updated Successfully!');
    	}
    	return redirect()->to('users');
    }

    public function destroy( $id ){
    	if(User::find($id)->delete()){
   			Session::flash('message','User Deleted Successfully!');
   		}
   		return redirect()->to('users');
    }
}
