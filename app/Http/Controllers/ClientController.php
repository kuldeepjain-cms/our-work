<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use Validator;
class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        //$this->middleware('admin');
    }

    public function index()
    {
        $data = array();
		$data['page'] = 'client';
		$data['clients'] = DB::select('select * from clients');

        return view('admin/client/client',$data);
    }

    public function show()
	{
		$data = array();
		$data['page'] = 'client';
		return view('admin/client/add',$data);
	}


	public function store(Request $request)
	{
		$method = $request->method();
		$this->validate($request,[
                'name' => 'required',
                'email' => 'required|unique:clients',
        ]);
		if ($request->isMethod('post')) {

			$name = $request->input('name'); 
			$email = $request->input('email');
			
			$id = DB::table('clients')->insertGetId(
												    ['email' => $email, 'name' => $name]
												);
			if($id != ''){
				Session::flash('message', 'Client added successfully.');
				return redirect('admin/client');
			}
		 
		}
		
		$data = array();
		$data['page'] = 'client';
		return view('admin/client/add',$data);
	}

	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

	public function delete($id)
	{
		$query = DB::table('clients')->where('client_id', '=', $id)->delete();
		Session::flash('message', 'Client deleted successfully.');
		return redirect('admin/client');
		
	}

	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
    */

	public function edit($id)
	{
		$data = array();
		//$query = DB::table('accesstoken')->where('accesstoken_id', '=', $id)->delete();
		$data['results'] = DB::select('select * from clients where client_id = '.$id);
		$data['page'] = 'client';
		return view('admin/client/edit',$data);
		
	}

	public function update(Request $request)
	{
		$method = $request->method();
		$this->validate($request,[
                'name' => 'required',
                'email' => 'required|unique:clients,email,'.$request->input('id').',client_id',
        ]);
		if ($request->isMethod('post')) {

			$name = $request->input('name'); 
			$email = $request->input('email'); 
			$id = $request->input('id'); 
			$query = DB::table('clients')->where('client_id', $id)->update(
												    ['email' => $email, 'name' => $name]
												);
			if($query == 0){
				Session::flash('message', 'Client updated successfully.');
				return redirect('admin/client');
			}
		 
		}
		
		$data = array();
		$id =  $request->input('id'); 
		$data['page'] = 'client';
		$data['results'] = DB::select('select * from clients where client_id = '.$id);
		return view('admin/client/edit',$data);
	}
}
