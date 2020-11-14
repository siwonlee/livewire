<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;


class Pages extends Component
{

    public $modalFormVisible = true;    
    public $slug;
    public $title;
    public $content;

    public function createShowModal(){ 

        $this-> modalFormVisible = true;


    }

    public function render()
    {
        return view('livewire.pages');
    }

    public function create()
    {

Page::create($this->modelData());
$this->modalFormVisible = false;
$this->resetVars();


         return view('livewire.pages');
    }

     public function modelData(){

        return [

            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
        ];

     }


     public function resetVars(){

        $this->title = null;
        $this->slug = null;
        $this->content = null;
        
     }
}
