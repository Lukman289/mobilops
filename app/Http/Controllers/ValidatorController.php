<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidatorController extends Controller
{
    public function index() {
        return view("validator.index");
    }   
    
    public function approve(Request $request) {
        $validated = $request->all();

        dd($validated);
    }
}