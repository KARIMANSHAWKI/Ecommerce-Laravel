<?php

namespace App\Http\Controllers;

use  App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Interfaces\NewsRepositryInterface;

class NewsController extends Controller
{
    private $newsRepositryInterface;

    public function __construct(NewsRepositryInterface $newsRepositryInterface)
    {
        $this->newsRepositryInterface = $newsRepositryInterface;
    }

    // &&&&&&&&&&&&& get all news &&&&&&&&&&&&&&&
    public function index(NewsRepositryInterface $newsRepositryInterface)
    {
        $news = $newsRepositryInterface->getAllNews();
        return view('admin.news.index', compact('news'));
    }

    // &&&&&&&&&&&&&& store one record in news table &&&&&&&&
    public function store(NewsRepositryInterface $newsRepositryInterface, Request $request)
    {
        
        return $newsRepositryInterface->create($request);
    }

    
    public function showModel(NewsRepositryInterface $newsRepositryInterface)
    {
        return $newsRepositryInterface->sidplayModel();
    }

 
    public function getEdit(NewsRepositryInterface $newsRepositryInterface, $id)
    {
        return $newsRepositryInterface->getUpdate($id);
    }

    public function update(NewsRepositryInterface $newsRepositryInterface, Request $request)
    {
        return $newsRepositryInterface->update($request);
       
    }

    public function destroy(NewsRepositryInterface $newsRepositryInterface, $id)
    {
        return  $newsRepositryInterface->delete($id);
    }
}
