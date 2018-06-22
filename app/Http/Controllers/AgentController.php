<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AgentController extends Controller
{
   public function index()
   {
       return view('agents.createAgent');
   }


   public function createAgent(Request $request)
   {
       $this->validate($request, [
           'first_name' => 'required',
           'last_name' => 'required',
           'phone' => 'required',
           'address' => 'required',
       ]);
     
      $agent = new User;
      $agent->firstName = $request->input('first_name');
      $agent->lastName = $request->input('last_name');
      $agent->phone = $request->input('phone');
      $agent->username = $request->input('phone');
      $agent->address = $request->input('address');
      $agent->password = bcrypt('password');

     $agent->save();
   
     return redirect()->back()->with('success', 'Field agent created successful');
      
   }
}
