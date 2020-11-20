<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\category;

class Usearch extends Component
{

public $search = '';

    public function render()
    {


        return view('livewire.usearch',[

            'users' => Category::search($this->search)->paginate(10),
             ]);

   
    }
}
