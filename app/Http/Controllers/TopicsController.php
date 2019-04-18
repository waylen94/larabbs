<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Handlers\ImageUploadHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

// 	public function index()
// 	{
// // 		$topics = Topic::paginate();
// // 		return view('topics.index', compact('topics'));
// // 		$topics = Topic::with('user', 'category')->paginate(30);

// // 		return view('topics.index', compact('topics'));
        
// 	}
    public function index(Request $request, Topic $topic)
    {
        $topics = $topic->withOrder($request->order)->paginate(20);
        return view('topics.index', compact('topics'));
    }

    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }

	public function create(Topic $topic)
	{
	    $categories = Category::all();
	    return view('topics.create_and_edit', compact('topic', 'categories'));
	}

	public function store(TopicRequest $request,  Topic $topic)
	{
	    $topic->fill($request->all());
	    $topic->user_id = Auth::id();
	    $topic->save();
	    
		return redirect()->route('topics.show', $topic->id)->with('success', 'Created successfully.');
	}

	public function edit(Topic $topic)
	{
        $this->authorize('update', $topic);
        $categories = Category::all();
        return view('topics.create_and_edit', compact('topic','categories'));
	}

	public function update(TopicRequest $request, Topic $topic)
	{
		$this->authorize('update', $topic);
		$topic->update($request->all());

		return redirect()->route('topics.show', $topic->id)->with('success', 'Updated successfully.');
	}

	public function destroy(Topic $topic)
	{
		$this->authorize('destroy', $topic);
		$topic->delete();

		return redirect()->route('topics.index')->with('success', 'Deleted successfully.');
	}
	
	public function uploadImage(Request $request, ImageUploadHandler $uploader)
	{
	    //default the process failure
	    $data = [
	        'success'   => false,
	        'msg'       => 'uploading fail!',
	        'file_path' => ''
	    ];
	    if ($file = $request->upload_file) {
	        $result = $uploader->save($request->upload_file, 'topics', Auth::id(), 1024);
	        if ($result) {
	            $data['file_path'] = $result['path'];
	            $data['msg']       = "uploading success!";
	            $data['success']   = true;
	        }
	    }
	    return $data;
	}
}