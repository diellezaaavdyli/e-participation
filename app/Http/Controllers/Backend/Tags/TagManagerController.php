<?php

namespace App\Http\Controllers\Backend\Tags;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Backend\Tag\TagRequest;
class TagManagerController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('backend.tags.tags', compact('tags'));
    }

    public function store(TagRequest $request)
    {
            $tag = new Tag;
            $tag->name = $request->name;
            $tag->slug =  Str::slug($request->name, '-');
            $tag->save();
            return redirect()->back()->with(
                ['success'=> 'New Tag is created!'],
                ['errors'=> 'error']
            );
    }

    public function update(TagRequest $request)
    {
        $tag = Tag::where('id', $request->id)->first();
        $tag->name = $request->name;
        $tag->slug =  Str::slug($request->name, '-');
        $tag->update();
        return redirect()->back()->with(
            ['success'=> 'The tag is updated!'],
            ['errors'=> 'error']
        );
    }

    public function updatestatus(Request $request)
    {
        $tag = Tag::where('id', $request->id)->first();
        if($request->status == null){
            $tag->status = 0;
        } else {
            $tag->status = $request->status;
        }
        $tag->update();
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $tag = Tag::where('id', $request->id)->first();
        $tag->delete();
        return redirect()->back();
    }

    public function deleted(){
        $tags = Tag::onlyTrashed()->get();
        return view('backend.tags.tags-deleted', compact('tags'));
    }

    public function restore(Request $request){
        $tag = Tag::onlyTrashed()->where('id', $request->id)->first();
        $tag->restore();
        return redirect()->back();
    }

    public function forcedelete(Request $request){
        $tag = Tag::onlyTrashed()->where('id', $request->id)->first();
        $tag->forceDelete();
        return redirect()->back();
    }
}
