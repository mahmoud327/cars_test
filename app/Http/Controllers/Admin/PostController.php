<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'categories' => Category::latest()->get(),

            'posts' => Post::latest()
                ->with('category')
                ->paginate(10),

        ];
        return view('admin.posts.index', $data);
    }
    public function create()
    {

        $data = [
            'categories' => Category::latest()->get(),
        ];
        return view('admin.posts.create', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $post= Post::create($data);
        if($request->image){
            $post->image = $this->uploadImage('uploads/posts/', $request->file('image'));
            $post->save();
        }

        if ($request->document) {

            foreach ($request->document as $file) {
                $post->medias()->create([
                    'url' => $file
                ]);
            }
        }


        return redirect(route('posts.index'))->with('status', "add successfully");
    }



    public function destroy(post $post)
    {
        $post->delete();
        // $post = $this->postService->deletePost($post);

        return back()->with('status', "deleted successfully");
    }

    public function uploadPostImage(Request $request)
    {
        $file = $request->file('dzfile');
        $filename = $this->uploadImage('uploads/posts/', $file);

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}
