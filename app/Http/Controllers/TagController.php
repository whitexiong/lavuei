<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TagController extends Controller
{
    /**
     *
     * @return Response
     */
    public function index(): Response
    {
        $tags = Tag::all();
        return Inertia::render('Tag/Index', compact('tags'));
    }

    /**
     * 创建一个标签
     * @param  TagRequest  $request
     * @return Response
     */
    public function create(Tag $tag)
    {
        return Inertia::render('Tag/Create', compact('tag'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);
        Tag::query()->create([
            'name' => $request->name,
            'type' => $request->type,
            'status' => $request->status,
        ]);
        return redirect()->route('tags.index')->with('successMessage', 'tag successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
