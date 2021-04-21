<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
class TagController extends Controller
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
        $data['page'] = 'tag';
        $data['tags'] = DB::select('select * from tag');

        return view('admin/tags/tags',$data);
    }

    public function show()
    {
        $data = array();
        $data['page'] = 'tag';
        $data['tags'] = DB::select('select * from tag');
        return view('admin/tags/add',$data);
    }


    public function store(Request $request)
    {
        $method = $request->method();

        if ($request->isMethod('post')) {

            $category = $request->input('name');
            $countdata = DB::table('tag')
                ->where('tag_name', '=', $category);

            $count = $countdata->count();
            if($count == 0){
                $id = DB::table('tag')->insertGetId(['tag_name' => $category]);
                if($id != ''){
                    Session::flash('message', 'Tag added successfully.');
                    return redirect('admin/tags');
                }
            }else{
                    Session::flash('message', 'Tag already exists!.');
                    return redirect('admin/tags/add');
            }
         
        }
        
        $data = array();
        $data['page'] = 'tag';
        return view('admin/tags/add',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function delete($id)
    {
        $query = DB::table('tag')->where('tag_id', '=', $id)->delete();
        Session::flash('message', 'Tag deleted successfully.');
        return redirect('admin/tags');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
    */

    public function edit($id)
    {
        $data = array();
        
        $data['results'] = DB::select('select * from tag where tag_id = '.$id);
        $data['tags'] = DB::select('select * from tag');
        $data['page'] = 'tag';
        return view('admin/tags/edit',$data);
    }

    public function update(Request $request)
    {
        $method = $request->method();

        if ($request->isMethod('post')) {
            $tag_name = $request->input('name'); 
            $tag_id =  $request->input('id'); 
            $countdata = DB::table('tag')
                ->where('tag_name', '=', $tag_name);

            $count = $countdata->count();
            if($count == 0){
                $query = DB::table('tag')->where('tag_id', $tag_id)->update(['tag_name' => $tag_name]);
                if($tag_id){
                    Session::flash('message', 'Tag updated successfully.');
                    return redirect('admin/tags');
                }
            }else{
                     Session::flash('message', 'Tag already exists.');
                    return redirect('admin/tags/edit/'.$tag_id);
            }
         
        }
        
        $data = array();
        $id =  $request->input('id'); 
        $data['page'] = 'tag';
        $data['results'] = DB::select('select * from tag where tag_id = '.$id);
        $data['tags'] = DB::select('select * from tag');
        return view('admin/tags/edit',$data);
    }
}
