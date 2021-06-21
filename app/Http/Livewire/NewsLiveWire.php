<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin;
use Livewire\WithFileUploads;
use App\Models\News;


class NewsLiveWire extends Component
{
    use WithFileUploads;

    public $title_ar;
    public $title_en;
    public $description;
    public $image;

    public function render()
    {
        $id =  auth()->guard('admin')->user()->id;
        $current_admin = Admin::findOrFail($id);
        $news =  $current_admin->news;

        return view('livewire.news-live-wire', [
            'news' => $news
        ]);
    }

    public function store()
    {
        $this->validate([
            'title_ar' => 'required',
            'title_en' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $news = new News();

        $news->admin_id       = auth()->guard('admin')->user()->id;
        $news->title_ar       = $this->title_ar;
        $news->title_en       = $this->title_en;
        $news->description    = $this->description;

        $this->image->store('images');
        $ $news->image  = $this->image;

        $news->save();


        Session()->falsh('success', 'news created successfully');
        $this->resetInputs();
        $this.emit('studentAdded');
    }

    private function resetInputs()
    {
        $this->title_ar = null;
        $this->title_en = null;
        $this->description = null;
        $this->image = null;
    }

    public function clickk(){
        dd("hh");
    }
}
