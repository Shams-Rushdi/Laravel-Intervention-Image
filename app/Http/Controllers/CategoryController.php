<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('image')->
            getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img = $img->resize(370,246);
            
            $directory = public_path('upload/category');
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            
            $img->toJpeg(80)->save($directory.'/'.$name_gen);
            
            $save_url = 'upload/category/'.$name_gen;
            
            Category :: insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
            'image' => $save_url,
            ]);
            
            }
    }
}
