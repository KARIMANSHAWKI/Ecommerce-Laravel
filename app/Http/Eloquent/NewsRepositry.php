<?php
namespace App\Http\Eloquent;

use App\Models\News;
use App\Http\Interfaces\NewsRepositryInterface;
use App\Models\Admin;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class NewsRepositry implements NewsRepositryInterface
{
    protected $model;
    protected $current_id;

    public function __construct(News $news)
    {
        $this->model = $news;
        // $this->$current_id = auth()->guard('admin')->user()->id;
    }

    public function getAllNews()
    {
        $id =  auth()->guard('admin')->user()->id;
        // $admin = Admin::all();
        $current_admin = Admin::findOrFail($id);
        return $current_admin->news;
        // dd($current_admin->news);
    }

  
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }


    public function create(Request $request)
    {
        
        $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $attributes = $request->all();

  
            $id =  auth()->guard('admin')->user()->id;
            $news = new News();
    
            // ******** Image *****
            $image =  $attributes['image'];
            $new_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/news'), $new_name);
            $news->image = $new_name;
    
            $news->admin_id = $id;
            $news->title_ar = $attributes['title_en'];
            $news->title_en = $attributes['title_en'];
            $news->description = $attributes['description'];
            // $news->image = $attributes['image'];
            $news->save();
            return redirect()->route('news.index')->with('success', 'news created successfull !');
        
    }

    public function getUpdate($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', ['news'=>$news]);
        // return $news;
    }

    public function update(Request $request)
    {
        $request->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $attributes = $request->all();
        $id =$attributes['id'];
        $news = News::find($id);

        $news->title_ar = $attributes['title_ar'];
        $news->title_en = $attributes['title_en'];
        $news->description = $attributes['description'];


        $path = public_path('images/news/'. $news->image);
        if (File::exists($path) &&   $attributes['image']) {
            File::delete($path);
            $image = $attributes['image'];
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/news'), $imageName);
            $news->image = $imageName;
        }
        $news->save();
        return redirect()->route('news.index')->with('success', 'news updated successfull !');
        // return $attributes;
    }

    public function delete($id)
    {
        $news = News::find($id);
        $news->delete();

        return redirect()->route('news.index')->with('message', 'news deleted successfull !');
    }



    public function sidplayModel()
    {
        return view('admin.news.create');
    }


    // this for list rules when create new user
    protected function getRules()
    {
        return $rules = [
            'title_ar' => 'required',
            'title_en' => 'required',
            'description' => 'required',
            'image' => 'required'
               ];
    }


    // this for list messages for validation
    protected function getMessage()
    {
        return $messages = [
              'title_ar.required' => 'Title in arabic Is Required',
              'title_en.required' => 'title in english Is Required',
              'description.required' => 'description Is Required',
              'image.required' => 'image Is Required'
          ];
    }
}
