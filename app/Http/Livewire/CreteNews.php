<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\News;

class CreteNews extends Component
{
    use WithFileUploads;

    public $title_ar;
    public $title_en;
    public $description;
    public $image;

    public function render()
    {
        return view('livewire.crete-news');
    }

    public function save()
    {
        $this->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $news = new News();

        $news->admin_id      = auth()->guard('admin')->user()->id;
        $news->title_ar      = $this->title_ar;
        $news->title_en       = $this->title_en;
        $news->description   = $this->description;

        $image =  $this->image;
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/news'), $new_name);
        $ $news->image      = $new_name;

        $news->save();

       $this->resetInputs(); 

       Session()->falsh('success', 'news created successfully' );
       return redirect()->to('news-livewire');
    }
    

    private function resetInputs(){
        $this->title_ar = null;
        $this->title_en = null;
        $this->description = null;
        $this->image = null;
    }
}
