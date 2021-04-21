<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
class ThemeController extends Controller
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
        $data['page'] = 'theme';
        $data['themes'] = DB::select('select * from theme');

        return view('admin/theme/theme',$data);
    }

    public function show()
    {
        $data = array();
        $data['page'] = 'theme';
        $data['themes'] = DB::select('select * from theme');
        return view('admin/theme/add',$data);
    }


    public function store(Request $request)
    {
        $method = $request->method();

        if ($request->isMethod('post')) {

            $theme_name = $request->input('name');

            $countdata = DB::table('theme')
                ->where('theme_name', '=', $theme_name);

            $count = $countdata->count();
            if($count == 0){
                $id = DB::table('theme')->insertGetId(['theme_name' => $theme_name]);
                if($id != ''){
                    Session::flash('message', 'Theme added successfully.');
                    return redirect('admin/themes');
                }
            }else{
                    Session::flash('message', 'Theme already exists.');
                    return redirect('admin/themes/add');
            }

           
         
        }
        
        $data = array();
        $data['page'] = 'theme';
        return view('admin/theme/add',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function delete($id)
    {
        $query = DB::table('theme')->where('theme_id', '=', $id)->delete();
        Session::flash('message', 'Theme deleted successfully.');
        return redirect('admin/themes');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
    */

    public function edit($id)
    {
        $data = array();
        
        $data['results'] = DB::select('select * from theme where theme_id = '.$id);
        $data['tags'] = DB::select('select * from theme');
        $data['page'] = 'theme';
        return view('admin/theme/edit',$data);
    }

    public function update(Request $request)
    {
        $method = $request->method();

        if ($request->isMethod('post')) {
            $theme_name = $request->input('name'); 
            $theme_id =  $request->input('id'); 

            $countdata = DB::table('theme')
                ->where('theme_name', '=', $theme_name);

            $count = $countdata->count();
            if($count == 0){

                $query = DB::table('theme')->where('theme_id', $theme_id)->update(['theme_name' => $theme_name]);
                if($theme_id){
                    Session::flash('message', 'Theme updated successfully.');
                    return redirect('admin/themes');
                }
            }else{
                    Session::flash('message', 'Theme already exists.');
                    return redirect('admin/themes/edit/'.$theme_id);
            }
         
        }
        
        $data = array();
        $id =  $request->input('id'); 
        $data['page'] = 'tag';
        $data['results'] = DB::select('select * from theme where theme_id = '.$id);
        $data['theme'] = DB::select('select * from theme');
        return view('admin/theme/edit',$data);
    }
}
