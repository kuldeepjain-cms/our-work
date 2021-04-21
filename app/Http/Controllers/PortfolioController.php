<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Session;
use App\Item;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\Input;
class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    } 
    public function index()
    {
        $data = array();
        $data['page'] = 'portfolio';
        $data['portfolios'] = DB::select('select * from portfolio order by portfolioid desc');
        return view('admin/portfolio/portfolio',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        if ($request->isMethod('post')) {
            $title = $request->input('name');
            $client = $request->input('client_name');
            $technology = $request->input('technology'); 
            $content =  addslashes($request->input('content')); 
            $site_link =  $request->input('site_link');
            $display_index = $request->input('display_index');
            $web_server = $request->input('web_server');
            $theme = $request->input('theme');
            $multi_theme = $request->input('multi_theme');
            $multi_site = $request->input('multi_site');
            $duration = $request->input('duration');
            $addons = $request->input('addons');
            $this->validate($request,[
                'name' => 'required',
                'technology' => 'required',
                'display_index' => 'required|unique:portfolio',
                'content' => 'required',
                'site_link' => 'required',
                'tags'  => 'required',
                'duration' => 'required'

            ]);
            $filename = '';
            if($request->input('category')){
                $category = implode(",", $request->input('category'));
            }else{
                $category = " ";
            }
            if($request->input('tags')){
                $tags =  implode(",", $request->input('tags'));
            }else{
                $tags = " ";
            }
            if($request->input('js_css_package')){
                $js_css_package = implode(",", $request->input('js_css_package'));
            }else{
                $js_css_package = " ";
            }
            if($request->input('payment_method')){
                $payment_method = implode(",", $request->input('payment_method'));
            }else{
                $payment_method = " ";
            }
            if($request->file('image') != ''){
                $file = $request->file('image')->getClientOriginalName(); 
                $extension = explode(".", $file);
                $filename = date('ymdhis').".".$extension[1];
                $request->file('image')->move('template/frontend/images/', $filename);
            } 
            $id = DB::table('portfolio')->insertGetId(
                        ['title' => $title,'client_name' => $client,'category' => $category,'technology' => $technology,'content' => $content,'site_link'=>$site_link,'image'=>$filename,'tags'=>$tags,'display_index'=>$display_index, 'web_server' => $web_server, 'theme' => $theme, 'js_css_packages' => $js_css_package, 'payment_methods' => $payment_method, 'multi_theme' => $multi_theme, 'multi_sites' => $multi_site, 'duration' => $duration, 'addons' => $addons]);
            if($id != ''){
                Session::flash('message', 'Portfolio added successfully.');
                return redirect('admin/portfolio')->withInput();
            }
            Session::flash('message', 'Portfolio added successfully.');
            return redirect('admin/portfolio')->withInput();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        $data = array();
        $data['page'] = 'portfolio';
        $data['categories'] = DB::select('select * from category');
        $data['technologies'] = DB::select('select * from technology');
        $data['servers'] = DB::select('select * from server');
        $data['themes'] = DB::select('select * from theme');
        $data['packages'] = DB::select('select * from package');
        $data['payments'] = DB::select('select * from payment');
        $data['tag'] = DB::select('select * from tag');
        $data['displayindex'] = DB::select('select * from portfolio order by display_index DESC LIMIT 1');
        return view('admin/portfolio/add',$data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array();
        $data['results'] = DB::select('select * from portfolio where portfolioid = '.$id);
        $data['categories'] = DB::select('select * from category');
        $data['technologies'] = DB::select('select * from technology');
        $data['servers'] = DB::select('select * from server');
        $data['themes'] = DB::select('select * from theme');
        $data['packages'] = DB::select('select * from package');
        $data['payments'] = DB::select('select * from payment');
        $data['tag'] = DB::select('select * from tag');
        $data['page'] = 'portfolio';
        return view('admin/portfolio/edit',$data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        if ($request->isMethod('post')) {
            $date = date('Y-m-d');
            $title = $request->input('name');
            $client = $request->input('client_name'); 
            $technology = $request->input('technology'); 
            //$category = $request->input('category');
            if($request->input('category')){
                $category =  implode(",", $request->input('category'));
            }else{
                $category = "";
            }
            $content =  addslashes($request->input('content')); 
            $id =  $request->input('id'); 
            $site_link =  rtrim($request->input('site_link'),'/'); 
            $filename = '';
            if($request->input('tags')){
                $tags =  implode(",", $request->input('tags'));
            }else{
                $tags = "";
            }
            $display = $request->input('display_index');

            $web_server = $request->input('web_server');
            $theme = $request->input('theme');
            if($request->input('js_css_package')){
                $js_css_package = implode(",", $request->input('js_css_package'));
            }else{
                $js_css_package = "";
            }
            if($request->input('payment_method')){
                $payment_method = implode(",", $request->input('payment_method'));
            }else{
                $payment_method = "";
            }
            $multi_theme = $request->input('multi_theme');
            $multi_site = $request->input('multi_site');
            $duration = $request->input('duration');
            $addons = $request->input('addons');

            $this->validate($request,[
                'name' => 'required',
                'category' => 'required',
                'technology' => 'required',
                'display_index' => 'required',
                //'display_index' => 'unique:portfolio,display_index,'.$display,
                'content' => 'required',
                'site_link' => 'required',
            ]);
            if($request->file('image') != ''){

                $file = $request->file('image')->getClientOriginalName();
              
                $extension = explode(".", $file);
                $filename = date('ymdhis').".".$extension[1];
                $request->file('image')->move('template/frontend/images/', $filename);
                $filename = ',`image`  = "'.$filename.'"';
            } 

        if(isset($filename) && $filename!=""){
           $oldimage = $request->input('old_image');
           $file_path = base_path().'/template/frontend/images/'.$oldimage;
           unlink($file_path);
        }   
           //echo 'UPDATE `portfolio` SET `title` = "'.$title.'", `category` ="'.$category.'", `technology` ="'.$technology.'", `tags` ="'.$tags.'", `content` = "'.$content.'", `site_link` = "'.$site_link.'" '.$filename.' , `display_index` ="'.$display.'", `web_server` ="'.$web_server.'", `theme` ="'.$theme.'", `js_css_packages` ="'.$js_css_package.'", `payment_methods` ="'.$payment_method.'", `multi_theme` ="'.$multi_theme.'", `multi_sites` ="'.$multi_site.'", `duration` = "'.$duration.'", `addons` ="'.$addons.'", `updated_at` = "'.$date.'" WHERE `portfolioid` = '.$id; die(); 
            //echo 'UPDATE `portfolio` SET `title` = "'.$title.'", `technology` ="'.$technology.'", `content` = "'.$content.'", `site_link` = "'.$site_link.'" '.$filename.' WHERE `portfolioid` = '.$id; exit;
            $query = DB::update('UPDATE `portfolio` SET `title` = "'.$title.'",`client_name` = "'.$client.'", `category` ="'.$category.'", `technology` ="'.$technology.'", `tags` ="'.$tags.'", `content` = "'.$content.'", `site_link` = "'.$site_link.'" '.$filename.' , `display_index` ="'.$display.'", `web_server` ="'.$web_server.'", `theme` ="'.$theme.'", `js_css_packages` ="'.$js_css_package.'", `payment_methods` ="'.$payment_method.'", `multi_theme` ="'.$multi_theme.'", `multi_sites` ="'.$multi_site.'", `duration` = "'.$duration.'", `addons` ="'.$addons.'", `updated_at` = "'.$date.'" WHERE `portfolioid` = '.$id);
           Session::flash('message', 'Portfolio updated successfully.');
           return redirect('admin/portfolio');         
        } 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $query1 = DB::select('select * from portfolio where portfolioid = '.$id);
        foreach($query1 as $imagedata){
        
            $imagename = $imagedata->image;
         if (file_exists(base_path().'/template/frontend/images/'.$imagename) && !empty($imagename) && $imagename!='' && $imagename!='No_img_portfolio.jpg') {
            $file_path = base_path().'/template/frontend/images/'.$imagename;
            unlink($file_path);
         }
           
        }
        
        $query = DB::table('portfolio')->where('portfolioid', '=', $id)->delete();


        Session::flash('message', 'Portfolio deleted successfully.');
        return redirect('admin/portfolio');
    }

    public function sortindex()
    {
        $data = array();
        $data['page'] = 'portfolioindex';
        $data['sortindex'] = DB::select('SELECT * FROM portfolio ORDER BY display_index ASC');
        return view('admin/portfolio/sortindex',$data);
    }
    public function sortupdate(Request $request)
    {
        $array = $request->input('arrayindex'); 
        $count = 1;
        foreach ($array as $idval) {
        
            $query = DB::update('UPDATE `portfolio` SET `display_index` ="'.$count.'" WHERE `portfolioid` = '.$idval);
            $count ++;
            
        }
        $data = array();
        $data['page'] = 'portfolioindex';
        $data['sortindex'] = DB::select('SELECT portfolioid,display_index,technology,title FROM portfolio ORDER BY display_index ASC');
        
        return response ()->json ($data['sortindex']);
        
    }
    public function downloadExcel($type)
    {
        $data = DB::select('SELECT * FROM portfolio ');
        $data['portfolio'] = $data;

        $category = DB::select('SELECT * FROM category ');
        $data['category'] = $category;

        $technology = DB::select('SELECT * FROM technology ');
        $data['technology'] = $technology;

        $tag = DB::select('SELECT * FROM tag ');
        $data['tag'] = $tag;

        $server = DB::select('SELECT * FROM server ');
        $data['server'] = $server;

        $theme = DB::select('SELECT * FROM theme ');
        $data['theme'] = $theme;

        $package = DB::select('SELECT * FROM package ');
        $data['package'] = $package;

        $payment = DB::select('SELECT * FROM payment ');
        $data['payment'] = $payment;

        return Excel::create('portfolio'.date('Y-m-d-h-i-s'), function($excel) use ($data) {
            $excel->sheet('portfolio', function($sheet) use ($data)
            {
                 $sheet->loadView('admin.portfolio.export')->with([
                        'portfolio' => $data
                    ]);
            });
            $excel->sheet('category', function($sheet) use ($data)
            {
                 $sheet->loadView('admin.portfolio.category')->with([
                        'category' => $data
                    ]);
            });
            $excel->sheet('technology', function($sheet) use ($data)
            {
                 $sheet->loadView('admin.portfolio.technology')->with([
                        'technology' => $data
                    ]);
            });
            $excel->sheet('tag', function($sheet) use ($data)
            {
                 $sheet->loadView('admin.portfolio.tag')->with([
                        'tag' => $data
                    ]);
            });
            $excel->sheet('server', function($sheet) use ($data)
            {
                 $sheet->loadView('admin.portfolio.server')->with([
                        'server' => $data
                    ]);
            });
            $excel->sheet('theme', function($sheet) use ($data)
            {
                 $sheet->loadView('admin.portfolio.theme')->with([
                        'theme' => $data
                    ]);
            });
            $excel->sheet('package', function($sheet) use ($data)
            {
                 $sheet->loadView('admin.portfolio.package')->with([
                        'package' => $data
                    ]);
            });
            $excel->sheet('payment', function($sheet) use ($data)
            {
                 $sheet->loadView('admin.portfolio.payment')->with([
                        'payment' => $data
                    ]);
            });
            $excel->sheet('multi_theme', function($sheet) use ($data)
            {
                 $sheet->loadView('admin.portfolio.multitheme');
            });
            $excel->sheet('multi_site', function($sheet) use ($data)
            {
                 $sheet->loadView('admin.portfolio.multisite');
            });
        })->download('xlsx');
    }

    public function importfile(Request $request)
    {
        $file = request()->file('file');
        $path = $file->getRealPath();
        $data = Excel::load($path, function($reader) {})->get();
        
                
                
            if(empty($data) || $data->count() < 1) return redirect()->back()->with('error', 'The system encountered an error while importing the data. Please try again.');
            foreach($data as $newdata) {
                $sheetTitle = $newdata->getTitle();
                if($sheetTitle == 'portfolio'){
    
                foreach($newdata as $portdata){
                    //print_r($portdata['portfolioid']);
                $portfolioid = $portdata['portfolioid'];
                $title = $portdata['title'];
                $category = $portdata['category'];
                $technology = $portdata['technology'];
                $display_index = $portdata['display_index'];
                $tags = $portdata['tags'];
                $site_link = $portdata['site_link'];
                $image = $portdata['image'];
                $web_server = $portdata['web_server'];
                $theme = $portdata['theme'];
                $js_css_packages = $portdata['js_css_packages'];
                $payment_methods = $portdata['payment_methods'];
                $multi_theme = $portdata['multi_theme'];
                $multi_sites = $portdata['multi_sites'];
                $duration = $portdata['duration'];
                $addons = $portdata['addons'];
                $content = $portdata['content'];
                $date = date('Y-m-d');
                $content = trim($content,'"');
                $content = addslashes($content);


                $query1 = DB::select('select * from portfolio where portfolioid = '.$portfolioid);
                $countdata = count($query1);
                if($countdata>0){
                   $query = DB::update('UPDATE `portfolio` SET `title` = "'.$title.'", `category` ="'.$category.'", `technology` ="'.$technology.'", `tags` ="'.$tags.'", `content` = "'.$content.'", `site_link` = "'.$site_link.'" ,`image` = "'.$image.'", `display_index` ="'.$display_index.'", `web_server` ="'.$web_server.'", `theme` ="'.$theme.'", `js_css_packages` ="'.$js_css_packages.'", `payment_methods` ="'.$payment_methods.'", `multi_theme` ="'.$multi_theme.'", `multi_sites` ="'.$multi_sites.'", `duration` = "'.$duration.'", `addons` ="'.$addons.'", `updated_at` = "'.$date.'" WHERE `portfolioid` = '.$portfolioid);
                   //echo 'UPDATE `portfolio` SET `title` = "'.$title.'", `category` ="'.$category.'", `technology` ="'.$technology.'", `tags` ="'.$tags.'", `content` = "'.$content.'", `site_link` = "'.$site_link.'" ,`image` = "'.$image.'", `display_index` ="'.$display_index.'", `web_server` ="'.$web_server.'", `theme` ="'.$theme.'", `js_css_packages` ="'.$js_css_packages.'", `payment_methods` ="'.$payment_methods.'", `multi_theme` ="'.$multi_theme.'", `multi_sites` ="'.$multi_sites.'", `duration` = "'.$duration.'", `addons` ="'.$addons.'", `updated_at` = "'.$date.'" WHERE `portfolioid` = '.$portfolioid;
                }else{
                    $id = DB::table('portfolio')->insertGetId(
                            ['title' => $title,'category' => $category,'technology' => $technology,'content' => $content,'site_link'=>$site_link,'image'=>'No_img_portfolio.jpg','tags'=>$tags,'display_index'=>$display_index, 'web_server' => $web_server, 'theme' => $theme, 'js_css_packages' => $js_css_packages, 'payment_methods' => $payment_methods, 'multi_theme' => $multi_theme, 'multi_sites' => $multi_sites, 'duration' => $duration, 'addons' => $addons]); 
                }
                }
            }
            }
         return redirect()->back()->with('message', 'Portfolio Updated Successfully.');
      
    }
}
