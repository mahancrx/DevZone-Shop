<?php

namespace App\Models;

use App\Helper\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

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

    public function childCategory()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id')
            ->withTrashed()
            ->withDefault(['title'=>'دسته اصلی']);
    }

    public static function getCategories()
    {
        $array = [];
        $categories = self::query()->with('childCategory')->where('parent_id',0)->get();
        foreach ($categories as $cat1){
            $array[$cat1->id]=$cat1->title;
            foreach ($cat1->childCategory as $cat2){
                $array[$cat2->id]='-'.$cat2->title;
                foreach ($cat2->childCategory as $cat3){
                    $array[$cat3->id]='---'.$cat3->title;

                }
            }

        }

        return $array;
    }

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

    public static function updateCategory($request, $category)
    {

        $category->update([
            'title'=>$request->input('title'),
            'etitle'=>$request->input('etitle'),
            'slug'=>str()->slug($request->input('etitle')),
            'parent_id'=>$request->input('parent_id'),
            'image'=>$request->image ? Image::Image('categories',$request->image) : $category->image,
        ]);
    }
}
