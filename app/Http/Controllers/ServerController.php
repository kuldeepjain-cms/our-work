<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
class ServerController extends Controller
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
        $data['page'] = 'server';
        $data['servers'] = DB::select('select * from server');

        return view('admin/server/server',$data);
    }

    public function show()
    {
        $data = array();
        $data['page'] = 'server';
        $data['servers'] = DB::select('select * from server');
        return view('admin/server/add',$data);
    }


    public function store(Request $request)
    {
        $method = $request->method();

        if ($request->isMethod('post')) {

            $server = $request->input('name');
            $countdata = DB::table('server')
                ->where('server_name', '=', $server);

            $count = $countdata->count();
            if($count == 0){
                $id = DB::table('server')->insertGetId(['server_name' => $server]);
                if($id != ''){
                    Session::flash('message', 'Server added successfully.');
                    return redirect('admin/server');
                }
            }else{
                    Session::flash('message', 'Server already exists.');
                    return redirect('admin/server/add');
            }
        }
        
        $data = array();
        $data['page'] = 'server';
        return view('admin/server/add',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function delete($id)
    {
        $query = DB::table('server')->where('server_id', '=', $id)->delete();
        Session::flash('message', 'Server deleted successfully.');
        return redirect('admin/server');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
    */

    public function edit($id)
    {
        $data = array();
        
        $data['results'] = DB::select('select * from server where server_id = '.$id);
        $data['servers'] = DB::select('select * from server');
        $data['page'] = 'server';
        return view('admin/server/edit',$data);
    }

    public function update(Request $request)
    {
        $method = $request->method();

        if ($request->isMethod('post')) {
            $server_name = $request->input('name'); 
            $server_id =  $request->input('id'); 
            $countdata = DB::table('server')
                ->where('server_name', '=', $server_name);

            $count = $countdata->count();
            if($count == 0){
                $query = DB::table('server')->where('server_id', $server_id)->update(['server_name' => $server_name]);
                if($server_id){
                    Session::flash('message', 'Server updated successfully.');
                    return redirect('admin/server');
                }
            }else{
                    Session::flash('message', 'Server already exists.');
                    return redirect('admin/server/edit/'.$server_id);
            }
         
        }
        
        $data = array();
        $id =  $request->input('id'); 
        $data['page'] = 'server';
        $data['results'] = DB::select('select * from server where server_id = '.$id);
        $data['servers'] = DB::select('select * from server');
        return view('admin/server/edit',$data);
    }
}
