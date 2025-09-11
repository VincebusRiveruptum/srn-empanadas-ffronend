<?php

namespace App\Controllers;

class Empanadas extends BaseController{
    public function index(){
        return view('empanadas/index');
    }

    public function create(){
        return view('empanadas/create');
    }

    public function edit(){
        return view('empanadas/edit');
    }

    public function show($id){
        return view('empanadas/show', [ 'empanadaId' => $id ]);
    }

    public function delete(){
        
    }

    public function update(){

    }
}