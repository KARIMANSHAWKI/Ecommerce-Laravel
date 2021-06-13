<?php
namespace App\Http\Interfaces;
use Illuminate\Http\Request;


interface NewsRepositryInterface {

     public function getAllNews();

     public function getUpdate($id);

    public function getById($id);

    public function create( Request $request);

    public function update( Request $request);

    public function delete($id);

}