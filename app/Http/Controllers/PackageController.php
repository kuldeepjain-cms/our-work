<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
class PackageController extends Controller
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
        $data['page'] = 'package';
        $data['packages'] = DB::select('select * from package');

        return view('admin/package/package',$data);
    }

    public function show()
    {
        $data = array();
        $data['page'] = 'package';
        $data['packages'] = DB::select('select * from package');
        return view('admin/package/add',$data);
    }


    public function store(Request $request)
    {
        $method = $request->method();

        if ($request->isMethod('post')) {

            $package = $request->input('name');

            $countdata = DB::table('package')
                ->where('package_name', '=', $package);

            $count = $countdata->count();
            if($count == 0){

                $id = DB::table('package')->insertGetId(['package_name' => $package]);
                if($id != ''){
                    Session::flash('message', 'Packages added successfully.');
                    return redirect('admin/packages');
                }
            }else{
                    Session::flash('message', 'Package name already exists');
                    return redirect('admin/packages/add');
            }
        }
        
        $data = array();
        $data['page'] = 'package';
        return view('admin/package/add',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function delete($id)
    {
        $query = DB::table('package')->where('package_id', '=', $id)->delete();
        Session::flash('message', 'Packages deleted successfully.');
        return redirect('admin/packages');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
    */

    public function edit($id)
    {
        $data = array();
        
        $data['results'] = DB::select('select * from package where package_id = '.$id);
        $data['packages'] = DB::select('select * from package');
        $data['page'] = 'package';
        return view('admin/package/edit',$data);
    }

    public function update(Request $request)
    {
        $method = $request->method();

        if ($request->isMethod('post')) {
            $package_name = $request->input('name'); 
            $package_id =  $request->input('id'); 
           
            
            $website_info = DB::table('package')->where(
                'package_name', '=' ,$package_name
            );
            $count = $website_info->count();

            if( $count == 0){
                $query = DB::table('package')->where('package_id', $package_id)->update(['package_name' => $package_name]);
                if($package_id){
                    Session::flash('message', 'Packages updated successfully.');
                    return redirect('admin/packages');
                }
            }else{
                    Session::flash('message', 'Package name already exists');
                    return redirect('admin/packages/edit/'.$package_id);
            }
         
        }
        
        $data = array();
        $id =  $request->input('id'); 
        $data['page'] = 'package';
        $data['results'] = DB::select('select * from package where package_id = '.$id);
        $data['packages'] = DB::select('select * from package');
        return view('admin/package/edit',$data);
    }
}
