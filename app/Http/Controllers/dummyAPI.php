<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class dummyAPI extends Controller
{
    

  public function getData()
  {
  	// return ["name"=>"kailash"];
  }

  public function add(Request $request)
  {

  	  $data = new User;
  	  $data->name =$request->name;
  	  $data->email =$request->email;
  	  $data->password =bcrypt($request->password);
       $result=$data->save();
        if($result)
        {
        	return ["result"=>"data has been saved"];
        }
        else{
        	return ["result"=>"data not saved"];
        }

        }

  

   public function update(Request $request)
  {
      $data = User::find($request->id);
  	  $data->name=$request->name;
  	  $data->email=$request->email;
  	  $data->password =bcrypt($request->password);
       $result=$data->save();
    
      if($result)
        {
        	return ["result"=>"data has been updated"];
        }
        else{
        	return ["result"=>"data not updated"];
        }
  }


  public function delete( Request $request)
  {
           User::where('id', $request->id)->delete();
      return ["result"=>"data has been deleted"];
  }

}
