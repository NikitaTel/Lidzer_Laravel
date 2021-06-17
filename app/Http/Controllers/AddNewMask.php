<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMaskRequest;
use Illuminate\Http\Request;
use App\Mask;
class AddNewMask extends Controller
{
    public function add(Request $request) {
        $name = $request->input('name');
        $category = $request->input('category');
        $price = $request->input('price');
        $image = $request->file('image')->store('uploads', 'public');
        $qr = $request->file('qr')->store('uploads', 'public');

        $mask = new Mask();
        $mask->mask_name= $name;
        $mask->mask_img = $image;
        $mask->mask_qr = $qr;
        $mask->category_id = $category;
        $mask->price = $price;

        $mask->save();

        return redirect()->route('profile');
    }
}
