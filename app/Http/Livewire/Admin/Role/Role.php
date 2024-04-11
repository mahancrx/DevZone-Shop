<?php

namespace App\Http\Livewire\Admin\Role;

use Livewire\Component;
use Livewire\WithPagination;

class Role extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public function render()
    {
        $roles = \Spatie\Permission\Models\Role::query()->
        where('name','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.role.role', compact('roles'));
    }
}
