<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\WithPagination;

class Trashed extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $listeners = [
      'forceDestroy',
      'refreshComponent'=> '$refresh',
    ];
    public function forceDeleteCategory($id)
    {
        $this->dispatchBrowserEvent('forceDeleteCategory', ['id'=>$id]);
    }

    public function forceDestroy($id)
    {
        \App\Models\Category::query()->withTrashed()->find($id)->forceDelete();
        $this->emit('refreshComponent');
    }

    public function restoreCategory($id)
    {
        \App\Models\Category::query()->withTrashed()->find($id)->restore();
        $this->emit('refreshComponent');

    }


    public function render()
    {
        $categories= \App\Models\Category::query()->onlyTrashed()->
        where('title','like','%'.$this->search.'%')->
        orwhere('etitle','like','%'.$this->search.'%')->
        where('deleted_at', '!=', null)->
        paginate(10);
        return view('livewire.admin.category.trashed', compact('categories'));
    }
}
