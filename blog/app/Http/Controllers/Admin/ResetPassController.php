<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Validation;
use Mail;


class ResetPassController
{
 public function test(){
     return view('admin.resset_pass.forgor_pass');
 }
 public function testEmail(){
     $name = 'test email';
     Mail::send('email.test', compact('name'), function($email){
         $email->to('nntt2896@gmail.com','aabc');
     });
 }
}
