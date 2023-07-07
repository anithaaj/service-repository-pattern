<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\PostRepository;
use Exception;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    protected $postService;

    public function __construct(PostRepository $postService){
        $this->postService=$postService;
        
    }
    public function index()
    {
        $result = $this->postService->getAll();
        $result = ['status' => 200];

        try{
            $result['data'] = $this->postService->getAll();
        }catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return view('table',[
            'result'=>$result['data']
        ]);

        // return response()->json($result, $result['status']);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

     public function tampil()
     {
        return view('update');
     }
     
    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'description'
        ]);

        $result = ['status' => 200];

        try{
            $result['data'] = $this->postService->save($data);
        }catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return redirect('/post');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->getById($id);
        }catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return view('update',[
            'result'=>$result['data']
        ]);
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([
            'title',
            'description'
        ]);

        $result = ['status' => 200];

        try{
            $result['data'] = $this->postService->update($data, $id);
        }catch (Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = ['status' => 200];

        try{
            $result['data'] = $this->postService->delete($id);
        }catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return redirect('/post');
    }
}
