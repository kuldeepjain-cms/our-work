<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
class CategoryController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth:admin');
		//$this->middleware('admin');
	}

	public function index()
	{
		$data = array();
		$data['page'] = 'category';
		$data['categories'] = DB::select('select * from category');

		return view('admin/category/category',$data);
	}

	public function show()
	{
		$data = array();
		$data['page'] = 'category';
		$data['categories'] = DB::select('select * from category');
		return view('admin/category/add',$data);
	}


	public function store(Request $request)
	{
		$method = $request->method();

		if ($request->isMethod('post')) {

			$category = $request->input('name');
			//$parent_id = $request->input('parent_id'); 
			$parent_id = 0; 
			
			$countdata = DB::table('category')
                ->where('category_name', '=', $category);

            $count = $countdata->count();
            if($count == 0){

				$id = DB::table('category')->insertGetId(
													    ['category_name' => $category,'parent_id'=>$parent_id]
													);
				
				if($id != ''){
					Session::flash('message', 'Category added successfully.');
					return redirect('admin/category');
				}
			}else{
					Session::flash('message', 'Category already exists.');
					return redirect('admin/category/add');
			}
		 
		}
		
		$data = array();
		$data['page'] = 'category';
		return view('admin/category/add',$data);
	}

	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

	public function delete($id)
	{
		$query = DB::table('category')->where('category_id', '=', $id)->delete();
		Session::flash('message', 'Category deleted successfully.');
		return redirect('admin/category');
		
	}

	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
    */

	public function edit($id)
	{
		$data = array();
		
		$data['results'] = DB::select('select * from category where category_id = '.$id);
		$data['categories'] = DB::select('select * from category');
		$data['page'] = 'category';
		
		return view('admin/category/edit',$data);
	}

	public function update(Request $request)
	{
		$method = $request->method();

		if ($request->isMethod('post')) {

			$category = $request->input('name'); 
			//$parent_id = $request->input('parent_id'); 
			$parent_id = 0; 
			$id =  $request->input('id'); 
			$countdata = DB::table('category')
                ->where('category_name', '=', $category);

            $count = $countdata->count();
            if($count == 0){

				$query = DB::table('category')->where('category_id', $id)->update(
													    ['category_name' => $category,'parent_id'=>$parent_id]
													);
				if($id){
					Session::flash('message', 'Category updated successfully.');
					return redirect('admin/category');
				}
			}else{
					Session::flash('message', 'Category already exists.');
					return redirect('admin/category/edit/'.$id);
			}
		 
		}
		
		$data = array();
		$id =  $request->input('id'); 
		$data['page'] = 'category';
		$data['results'] = DB::select('select * from category where category_id = '.$id);
		$data['categories'] = DB::select('select * from category');
		return view('admin/category/edit',$data);
	}
}
