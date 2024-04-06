<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public function render()
    {
        $users = \App\Models\User::query()->
            where('name','like','%'.$this->search.'%')->
            orwhere('email','like','%'.$this->search.'%')->
            orwhere('mobile','like','%'.$this->search.'%')->
            paginate(10);
        return view('livewire.admin.user.user', compact('users'));
    }
}
