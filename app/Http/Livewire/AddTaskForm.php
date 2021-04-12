<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddTaskForm extends Component
{
    public $members = [];

    public function mount($members){
        $this->members = $members;
    }

    public function render()
    {
        return view('livewire.add-task-form');
    }
}
