<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;


class Pages extends Component
{

    public $modalFormVisible = false;    
    public $slug;
    public $title;
    public $content;

    // public function rules(){
    //     return [
    //         'title' => 'required',
    //         'slug' => 'required', 
    //         'content' => 'required',
    //         ];

    // }

    // public function updatedTitle($value){

    //     $this->slug = $value;
    // }

    protected $rules = [

        'title' => 'required',
        'slug' => 'required', 
        'content' => 'required',   
    ];

    public function createShowModal(){ 

        $this-> modalFormVisible = true;


    }

    public function render()
    {
        return view('livewire.pages',[
'data' => $this->read();

        ]);
    }

    public function create()
    {
        $this->validate();
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

     public function read(){

return Page::paginate(5);
     }
}
