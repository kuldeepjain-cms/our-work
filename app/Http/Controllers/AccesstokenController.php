<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
class AccesstokenController extends Controller
{
    /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth:admin');
		//$this->middleware('admin');
	}

	public function index()
	{
		$data = array();
		$user_id = Auth::user()->id;
		$isAdmin = Auth::user()->isAdmin;
		if($isAdmin == 2){
			$data['accesstokens'] = DB::table('accesstoken')
        ->leftJoin('clients', 'accesstoken.client_id', '=', 'clients.client_id')
        ->orderBy('accesstoken.accesstoken_id', 'desc')
         ->where('accesstoken.user_id', '=', $user_id)
        ->get();

		}else{
			$data['accesstokens'] = DB::table('accesstoken')
        ->leftJoin('clients', 'accesstoken.client_id', '=', 'clients.client_id')
        ->orderBy('accesstoken.accesstoken_id', 'desc')
        ->get();
	
		}
		$data['page'] = 'accesstoken';
		
        //DB::select('select * from accesstoken where status = 1');

		/*DB::table('accesstoken')
        ->leftJoin('clients', 'accesstoken.client_id', '=', 'clients.client_id')
        ->get();*/
		$data['clients'] = DB::select('select * from clients');
		
		return view('admin/accesstoken/accesstoken',$data);
	}

	public function show()
	{
		$data = array();
		$data['page'] = 'accesstoken';
		$data['accesstoken'] = md5(rand());
		$data['clients'] = DB::select('select * from clients');
		$data['categories'] = DB::select('select * from technology WHERE parent_id=0');
		return view('admin/accesstoken/add',$data);
	}

	public function store(Request $request)
	{
		$method = $request->method();

		if ($request->isMethod('post')) {
			$user_id = Auth::user()->id;
			$accesstoken = $request->input('name'); 
			$technology = $request->input('technology'); 
			$client_id =  $request->input('client_id'); 
			$status =  $request->input('status'); 

			$id = DB::table('accesstoken')->insertGetId(
					    ['technology' => $technology, 'accesstoken' => $accesstoken,'client_id' => $client_id,'status'=>$status , 'user_id' => $user_id]
					);
			if($id != ''){
				Session::flash('message', 'Accesstoken added successfully.');
				return redirect('admin/accesstoken');
			}
		 
		}
		
		$data = array();
		$data['page'] = 'accesstoken';
		$data['accesstoken'] = md5(rand());
		$data['clients'] = DB::select('select * from clients');
		return view('admin/accesstoken/add',$data);
	}

	public function delete($id)
	{
		$query = DB::table('accesstoken')->where('accesstoken_id', '=', $id)->delete();
		Session::flash('message', 'Accesstoken deleted successfully.');
		return redirect('admin/accesstoken');
		
	}

	public function edit($id)
	{
		$data = array();
		//$query = DB::table('accesstoken')->where('accesstoken_id', '=', $id)->delete();
		$data['results'] = DB::select('select * from accesstoken where accesstoken_id = '.$id);
		$data['clients'] = DB::select('select * from clients');
		$data['categories'] = DB::select('select * from technology WHERE parent_id=0');
		$data['page'] = 'accesstoken';
		return view('admin/accesstoken/edit',$data);
	}

	public function update(Request $request)
	{
		$method = $request->method();

		if ($request->isMethod('post')) {

			$accesstoken = $request->input('name'); 
			$technology = $request->input('technology'); 
			$client_id =  $request->input('client_id'); 
			$status =  $request->input('status'); 
			$id =  $request->input('id'); 

			$query = DB::table('accesstoken')->where('accesstoken_id', $id)->update(
			    ['technology' => $technology, 'accesstoken' => $accesstoken,'client_id' => $client_id,'status'=>$status]
			);
			if($id){
				Session::flash('message', 'Accesstoken updated successfully.');
				return redirect('admin/accesstoken');
			}
		 
		}
		
		$data = array();
		$id =  $request->input('id'); 
		$data['page'] = 'accesstoken';
		$data['results'] = DB::select('select * from accesstoken where accesstoken_id = '.$id);
		$data['clients'] = DB::select('select * from clients');
		return view('admin/accesstoken/edit',$data);
	}
}
