<?php

namespace App\Http\Livewire\Admin\Role;

use Livewire\Component;
use Livewire\WithPagination;

class Role extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $listeners = [
        'destroyRole',
        'refreshRole' => '$refresh'
    ];

    public function deleteRole($id)
    {
        $this->dispatchBrowserEvent('deleteRole', ['id'=>$id]);
    }

    public function destroyRole($id)
    {
        \Spatie\Permission\Models\Role::destroy($id);
        $this->emit('refreshRole');
    }

    public function render()
    {
        $roles = \Spatie\Permission\Models\Role::query()->
        where('name','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.role.role', compact('roles'));
    }
}
