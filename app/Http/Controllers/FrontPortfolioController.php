<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Hash;
use URL;
use Response;
class FrontPortfolioController extends Controller
{
    
	public function index()
    {
		
        return view('portfolio_check'); 
            
    }

    public function show($token)
    {

        $token_new = DB::table('accesstoken')->where('accesstoken', $token)->first();
        $categories = DB::select('select * from category');
        if($token_new->status == 1){
            if($token_new->technology == 'all'){
                $portfolio = DB::select('select * from portfolio');
            }else{
                 $portfolio = DB::table('accesstoken')
            ->leftJoin('portfolio', 'accesstoken.technology', '=', 'portfolio.technology')
            ->where('accesstoken.accesstoken',$token)
            ->where('accesstoken.status',1)
            ->get();
            }


             if(!empty($portfolio)){
                return view('portfolio', ['portfolios' => $portfolio,'technology' => $token_new->technology, 'categories' => $categories]);//
            }else{

                return view('error');
            }

        }else{
            return view('portfolio_check');
        }


    }

    public function singledetails($token)
    {   
        $portfolio = DB::select('select * from portfolio where portfolioid = '.$token);
        return view('details_page', ['portfolio' => $portfolio]);
    }

    public function newTheme($token=null) {
        if(!empty($token)){

            $data = array();
            $data['technologies'] = DB::select('select technology_id, technology_name from technology WHERE parent_id=0 ORDER BY indexes ASC');
            $data['categories'] = DB::select('select category_id, category_name from category where parent_id = 0 ORDER BY category_name ASC');
            $data['tags'] = DB::select('select tag_id, tag_name from tag');
            $data['themes'] = DB::select('select theme_id, theme_name from theme');
            $data['packages'] = DB::select('select package_id, package_name from package');
            $token_new = DB::table('accesstoken')->where('accesstoken', $token)->first();

            if($token_new->status == 1){
                if($token_new->technology == 'all'){
                     $portfolio = DB::table('portfolio')
                    ->orderBy('display_index', 'ASC')
                    ->limit(12)
                    ->get();

                    
                }else{
                     $portfolio = DB::table('accesstoken')
                    ->leftJoin('portfolio', 'accesstoken.technology', '=', 'portfolio.technology')
                    ->where('accesstoken.accesstoken',$token)
                    ->where('accesstoken.status',1)
                    ->orderBy('display_index', 'ASC')
                    ->limit(12)
                    ->get();
                }
               //echo '<pre>';
               //print_r($portfolio);
               //exit;
                $data['portfoliosdata'] = $portfolio;
                $data['token'] = $token;
               
                return view('new_theme')->with($data);
            } else {
                return view('portfolio_check');
            }
        } else {

            return view('portfolio_check');
        }
        
    }
    public function newTheme1($token=null) {
        if(!empty($token)){

            $data = array();
            $data['technologies'] = DB::select('select technology_id, technology_name from technology');
            $data['categories'] = DB::select('select category_id, category_name from category where parent_id = 0');
            $data['tags'] = DB::select('select tag_id, tag_name from tag');
            $data['themes'] = DB::select('select theme_id, theme_name from theme');
            $data['packages'] = DB::select('select package_id, package_name from package');
            $token_new = DB::table('accesstoken')->where('accesstoken', $token)->first();

            if($token_new->status == 1){
                if($token_new->technology == 'all'){
                     $portfolio = DB::table('portfolio')
                    ->orderBy('display_index', 'ASC')
                    ->limit(12)
                    ->get();

                    
                }else{
                     $portfolio = DB::table('accesstoken')
                    ->leftJoin('portfolio', 'accesstoken.technology', '=', 'portfolio.technology')
                    ->where('accesstoken.accesstoken',$token)
                    ->where('accesstoken.status',1)
                    ->orderBy('display_index', 'ASC')
                    ->limit(12)
                    ->get();
                }
               //echo '<pre>';
               //print_r($portfolio);
               //exit;
                $data['portfoliosdata'] = $portfolio;
                $data['token'] = $token;
               
                return view('new_theme1')->with($data);
            } else {
                return view('portfolio_check');
            }
        } else {

            return view('portfolio_check');
        }
        
    }

    public function ajaxloadmore() {

    if($_POST['id'] !=0){
        $showLimit = 12;
        if($_POST['catid'] !=""){
             $catid = $_POST['catid'];
             //echo 'test';

             $portfolio_count = DB::select("select count(*) as num_rows from portfolio WHERE technology= ".$catid."");
             $allNumRows = $portfolio_count[0]->num_rows;

            $portfolio1 = DB::select("select * from portfolio WHERE display_index > ".$_POST['id']." AND  technology= ".$catid." ORDER BY display_index ASC LIMIT $showLimit");
                
        } else{
            //echo 'try';
             $portfolio_count = DB::select("select count(*) as num_rows from portfolio ORDER BY display_index ASC");
             $allNumRows = $portfolio_count[0]->num_rows;
             $portfolio1 = DB::select("select * from portfolio WHERE display_index > ".$_POST['id']." ORDER BY display_index ASC LIMIT $showLimit");
        }
   
    //echo ("select * from portfolio WHERE display_index > ".$_POST['id']." AND  technology= ".$catid." ORDER BY display_index ASC LIMIT $showLimit");
    
        $html = '';
        $postID='';
        $catid='';
        foreach ($portfolio1 as $portfolio) {
            //$postID = $portfolio->portfolioid;
            $postID = $portfolio->display_index;
            $catid = $portfolio->technology;

            $html .= " <div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 gallery'>
            <div class='hover ehover10'>
                <img class='img-responsive' src=". URL::asset('template/frontend/images/'.$portfolio->image) ." alt='Title img' />
                <div class='point'>
                    <p>
                        <a data-fancybox='images' href=". URL::asset('template/frontend/images/'.$portfolio->image) ." data-caption='Hitt'>
                            <i class='zoom'></i>
                        </a>
                    </p>
                </div>
                <div class='overlay' style='background: #74bd30;'>
                    <div class='col-lg-8 col-md-12 col-sm-12 col-xs-12'>
                    <h2>".$portfolio->title."</h2>
                    <h3>Categories: -</h3>
                    <ul class='technology'>
                        <li>
                            <a href='javascript:void(0);'>
                                Wordpress
                            </a>
                        </li>        
                    </ul>
                    </div>
                     <a target='_blank' href=".url('portfoliodetail/'.$portfolio->portfolioid )." class='info'>VIEW MORE</a>
                </div>
            </div>
            </div>";        
        }
      
        if($allNumRows > $showLimit){
           
            $html .= "<div id='overlay' class='load-more' lastID='".$postID."' style='display: none;'><i class='fa fa-spinner fa-spin spin-big'></i></div>";
        } else {
            
            $html .= "<div id='overlay' class='load-more' lastID='0'><i class='fa fa-spinner fa-spin spin-big'></i></div>";
        }
       
        return $html;
    }
    }

    public function filterData(Request $request) {

        //return $request->input('technology');
        //return $request->input('category');
        //return $request->input('tag');
        //return $request->input('multitheme');
        //return $request->input('multisite');
        //return $request->input('theme');
        //return $request->input('package');
        $where="";
        $technology = $request->input('technology');
        $category = $request->input('category'); 
        $tag = $request->input('tag');
        $theme = $request->input('theme');
        $package = $request->input('package');
        $multitheme = $request->input('multitheme');
        $multisite = $request->input('multisite');


        if($technology !="" && $technology!='undefined' && $technology!='all'){

            $where .= ' technology='. $technology;
        }

        if(isset($category) && $category!='undefined' && $category!=""){
            if(!empty($where)) {
                 $where .= ' and ';
            }
            $where .= ' category IN('. $category.')';
        }
       
        if(isset($tag) && $tag!=""){
            if(!empty($where)) {
                 $where .= ' and ';
            }

            $where .= ' tags IN('. $tag.')';
        }
        if(isset($theme) && $theme!=" "){
            if(!empty($where)) {
                 $where .= ' and ';
            }

            $where .= ' theme IN('. $theme.')';
        }
        if(isset($package) && $package!=" "){
            if(!empty($where)) {
                 $where .= ' and ';
            }
            $where .= ' js_css_packages IN('. $package.')';
        }
        if(isset($multitheme) && $multitheme!=" "){
            if(!empty($where)) {
                 $where .= ' and ';
            }
            
            $where .= ' multi_theme='. $multitheme;
        }
        if(isset($multisite) &&  $multisite!=" "){
            if(!empty($where)) {
                 $where .= ' and ';
            }
            
            $where .= ' multi_sites='. $multisite;
        }

        if(!empty($where)){
            $portfolio = DB::select("select * from portfolio WHERE ".$where." ORDER BY display_index ASC");
        }else{
            $portfolio = DB::select("select * from portfolio ORDER BY display_index ASC");
        }
   
       //return "select * from portfolio WHERE".$where." ORDER BY portfolioid DESC";

        
        $html = '';
        foreach ($portfolio as $portfolio) {
            $postID = $portfolio->portfolioid;
            $html .= " <div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 gallery'>
            <div class='hover ehover10'>
                <img class='img-responsive' src=". URL::asset('template/frontend/images/'.$portfolio->image) ." alt='Title img' />
                <div class='point'>
                    <p>
                        <a data-fancybox='images' href=". URL::asset('template/frontend/images/'.$portfolio->image) ." data-caption='Hitt'>
                            <i class='zoom'></i>
                        </a>
                    </p>
                </div>
                <div class='overlay' style='background: #74bd30;'>
                    <div class='col-lg-8 col-md-12 col-sm-12 col-xs-12'>
                    <h2>".$portfolio->title."</h2>
                    <h3>Categories: -</h3>
                    <ul class='technology'>
                        <li>
                            <a href='javascript:void(0);'>
                                Wordpress
                            </a>
                        </li>        
                    </ul>
                    </div>
                     <a target='_blank' href=".url('portfoliodetail/'.$portfolio->portfolioid )." class='info'>VIEW MORE</a>
                </div>
            </div>
        </div>";
        
        }
        if(!empty($html)) {
            return $html;
        } else {
            return "<div class='noportfolio'><br/><br/><strong>No Portfolio found</strong></div>";
        }
        
    }

    public function getcatdata(Request $request)
    {
       $id = $request->input('id');
      
       $design = DB::select("select category_name from category WHERE category_id != ".$id." ORDER BY category_name ASC");

        return Response::json($design);
    }
}
