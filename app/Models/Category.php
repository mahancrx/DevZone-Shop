<?php

namespace App\Models;

use App\Helper\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'etitle',
        'slug',
        'image',
        'parent_id',
    ];

    public static function createCategory($request)
    {
        Category::query()->create([
            'title'=>$request->input('title'),
            'etitle'=>$request->input('etitle'),
            'slug'=>str()->slug($request->input('etitle')),
            'image'=>Image::Image('categories',$request->image),
            'parent_id'=>$request->input('parent_id'),
        ]);
    }
}
