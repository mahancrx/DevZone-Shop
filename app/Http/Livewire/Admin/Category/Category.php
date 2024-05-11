<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyCategory',
        'refreshCategory' => '$refresh'
    ];


    public function deleteCategory($id)
    {
        $this->dispatchBrowserEvent('deleteCategory', ['id'=>$id]);
    }

    public function destroyCategory($id)
    {
        \App\Models\Category::destroy($id);
        $this->emit('refreshCategory');
    }


    public function render()
    {
        $categories= \App\Models\Category::query()->
        where('title','like','%'.$this->search.'%')->
        orwhere('etitle','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.category.category', compact('categories'));
    }
}
