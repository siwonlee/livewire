<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;
use Livewire\WithPagination;

class Pages extends Component
{

    use WithPagination;
    public $modalFormVisible = false;    
    public $slug;
    public $title;
    public $content;
    public $modelId;

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

        $this->resetValidation();
        $this->resetVars();
        $this-> modalFormVisible = true;


    }
 

    public function render()
    {
        return view('livewire.pages',[
'data' => $this->read()

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


        $this->modelId = null;
        
        $this->title = null;
        $this->slug = null;
        $this->content = null;
        
     }

     public function read(){

return Page::orderBy('created_at','desc')->paginate(5);
     }

     public function updateShowModal($id){
        $this->resetVars();
        $this->resetValidation();
$this->modelId = $id;
$this->modalFormVisible = true;
$this->loadModel();


     }

     public function loadModel(){

        $data = Page::find($this->modelId);
        $this->title = $data -> title;
        $this->slug = $data -> slug;
        $this->content = $data -> content;
        

     }

     public function update(){

        $this->validate();
        Page::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
        $this->resetVars();


         return view('livewire.pages');

     }
}
