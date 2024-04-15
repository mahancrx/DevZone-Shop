<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public function render()
    {
        $categories= \App\Models\Category::query()->
        where('title','like','%'.$this->search.'%')->
        orwhere('etitle','like','%'.$this->search.'%')->
        orwhere('slug','like','%'.$this->search.'%')->
        orwhere('parent_id','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.category.category', compact('categories'));
    }
}
