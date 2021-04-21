<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
class TechnologyController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth:admin');
		//$this->middleware('admin');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = array();
		$data['page'] = 'technology';
		$data['technologies'] = DB::select('select * from technology');

		return view('admin/technology/technology',$data);
	}

	public function show()
	{
		$data = array();
		$data['page'] = 'technology';
		$data['technologies'] = DB::select('select * from technology where parent_id = 0');
		return view('admin/technology/add',$data);
	}


	public function store(Request $request)
	{
		$method = $request->method();

		if ($request->isMethod('post')) {

			$technology = $request->input('name');
			$parent_id = $request->input('parent_id'); 
			
			$countdata = DB::table('technology')
                ->where('technology_name', '=', $technology);

            $count = $countdata->count();
            if($count == 0){

				$id = DB::table('technology')->insertGetId(
													    ['technology_name' => $technology,'parent_id'=>$parent_id]
													);
				if($id != ''){
					Session::flash('message', 'Technology added successfully.');
					return redirect('admin/technology');
				}
			}else{
					Session::flash('message', 'Technology already exists.');
					return redirect('admin/technology/add');
			}
		 
		}
		
		$data = array();
		$data['page'] = 'technology';
		return view('admin/technology/add',$data);
	}

	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

	public function delete($id)
	{
		$query = DB::table('technology')->where('technology_id', '=', $id)->delete();
		Session::flash('message', 'Technology deleted successfully.');
		return redirect('admin/technology');
		
	}

	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
    */

	public function edit($id)
	{
		$data = array();
		
		$data['results'] = DB::select('select * from technology where technology_id = '.$id);
		$data['technologies'] = DB::select('select * from technology');
		$data['page'] = 'technology';
		return view('admin/technology/edit',$data);
	}

	public function update(Request $request)
	{
		$method = $request->method();

		if ($request->isMethod('post')) {

			$technology = $request->input('name'); 
			$parent_id = $request->input('parent_id'); 
			$id =  $request->input('id'); 

			$countdata = DB::table('technology')
                ->where('technology_name', '=', $technology);

            $count = $countdata->count();
            if($count == 0){

				$query = DB::table('technology')->where('technology_id', $id)->update(
													    ['technology_name' => $technology,'parent_id'=>$parent_id]
													);
				if($id){
					Session::flash('message', 'Technology updated successfully.');
					return redirect('admin/technology');
				}
			}else{
					Session::flash('message', 'Technology already exists.');
					return redirect('admin/technology/edit/'.$id);
			}
		 
		}
		
		$data = array();
		$id =  $request->input('id'); 
		$data['page'] = 'technology';
		$data['results'] = DB::select('select * from technology where technology_id = '.$id);
		$data['technologies'] = DB::select('select * from technology');
		return view('admin/technology/edit',$data);
	}
}
