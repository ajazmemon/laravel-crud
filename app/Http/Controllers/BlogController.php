<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();
        return view('blog',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all = $request->all();
        $all['hobby'] = implode(',', $all['hobby']);
        $fileName = time().'.'.request()->logo->getClientOriginalExtension();
        $request->logo->store('img');
        $all['logo'] = $fileName;
        Blog::create($all);
        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @rad2deg(number)eturn \Illuminate\Http\Response
     */
    public function edit(Blog $blog,$id)
    {
        $blog = Blog::findOrFail($id);
        $blog['hobby'] = explode(",", $blog['hobby']);
        return view('create',['blog'=>$blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog,$id)
    {
        $blog = Blog::find($id);

        $all = $request->all();

        if (empty($all->logo)) {
            $all['logo'] = $blog->logo;
        }
        if (empty($all->gender)) {
            $all['gender'] = $blog->gender;
        }
        if (empty($all->hobby)) {
            $all['hobby'] = $blog->hobby;
        }
        
        $file = Input::file('logo');
        if (Input::hasFile('logo')) {
            $fileName = time().'.'.request()->logo->getClientOriginalExtension();
            $oldFilelogo = public_path('img') . $blog->logo;
            if (is_file($oldFilelogo)) {
                unlink($oldFilelogo);
            }
            $file->move('img/', $fileName);
            $all['logo'] = $fileName;
        } else {
            $fileName = $blog->logo;
        }
        

        $blog->application_name = $all['application_name'];
        $blog->title = $all['title'];
        $blog->address = $all['address'];
        $blog->email = $all['email'];
        $blog->logo = $all['logo'];
        $blog->getway = $all['getway'];
        $blog->hobby = $all['hobby'];
        $blog->gender = $all['gender'];
        $blog->save();

        return redirect('blog');
        
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
