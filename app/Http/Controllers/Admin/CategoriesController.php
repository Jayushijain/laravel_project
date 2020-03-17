<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$categories              = Category::all();
		$page_info['page_title'] = 'Categories';
		$page_info['page_name']  = 'categories';

		return view('backend.admin.categories.index', compact('page_info', 'categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$categories              = Category::all();
		$page_info['page_title'] = 'Add New Category';
		$page_info['page_name']  = 'add_category';

		return view('backend.admin.categories.create', compact('page_info', 'categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();

		if ($input['parent_id'] == 0)
		{
			if ($request->file('thumbnail') == '')
			{
				$input['thumbnail'] = 'thumbnail.png';
			}
			else
			{
				if ($file = $request->file('thumbnail'))
				{
					$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
					$file->move('uploads/category_thumbnails', $filename);
					$input['thumbnail'] = $filename;
				}
			}
		}

		$category = Category::create($input);
		$category->save;

        if($category)
        {
            Session::flash('success_message','Category Created');
        }
        else
        {
            Session::flash('error_message','Category not Created');
        }
        
		return redirect('/admin/categories');
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
        $categories              = Category::where('parent_id',0)->get();
		$category                = Category::findOrFail($id);
        $page_info['page_title'] = 'Update Category';
        $page_info['page_name']  = 'edit_category';

        return view('backend.admin.categories.edit', compact('page_info', 'category','categories'));
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
        $category = Category::findOrFail($id);
		$input = $request->all();

        if ($input['parent_id'] == 0)
        {
            if ($request->file('thumbnail') == '')
            {
                $input['thumbnail'] = $category->thumbnail;
            }
            else
            {
                if ($file = $request->file('thumbnail'))
                {
                    $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).rand(100, 999).'.jpg';
                    $file->move('uploads/category_thumbnails', $filename);
                    $input['thumbnail'] = $filename;
                }
            }
        }

        if($category->update($input))
        {
            $category->save;
            Session::flash('success_message','Category Updated');
        }
        else
        {
             Session::flash('error_message','Category not Updated');
        }
        
        return redirect('/admin/categories');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$category = Category::findOrFail($id);

		if($category->thumbnail === " " || $category->thumbnail !== '/uploads/category_thumbnails/thumbnail.png')
		{
		    unlink(public_path().'/uploads/category_thumbnails/'.$category->thumbnail);
		}
		
        if($category->delete())
        {
        	Session::flash('success_message','Category deleted ');
        }
        else
        {
        	Session::flash('error_message','Category not deleted ');
        }
         
        return redirect('/admin/categories');
	}
}
