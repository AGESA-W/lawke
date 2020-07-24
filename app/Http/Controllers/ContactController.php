<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /***lawyers */
    public function contact(){
        return view('contact\lawyers.contacting');
    }

    /***clients */
    public function contactClient(){
        return view('contact\clients.contacting');
    }

    public function review(){
        return view('contact\clients.myReview');
    }

    public function search(){
        return view('contact\clients.searchLawyer');
    }

    public function message(){
        return view('contact\clients.sendMessage');
    }
}
