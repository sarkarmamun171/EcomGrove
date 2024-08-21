<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Carbon\Carbon;

class TagController extends Controller
{
    public function tag(){
        $tags = Tag::all();
        return view('admin.tag.tag',[
            'tags'=>$tags,
        ]);
    }
    public function tag_store(Request $request){
        Tag::insert([
            'tag'=>$request->tag,
            'created_at'=>Carbon::now()
        ]);
        return back();
    }
}
