<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Hash;
use URL;

class PortfolioSingleController extends Controller
{
    public function index()
    {

		return view('portfolio_check'); 

   	}
    public function show($token)
    {

        $token_new = DB::table('accesstoken')->where('accesstoken', $token)->first();
        //$technologies = DB::select('select * from technology where parent_id = 0');
        $technologies = DB::select('select * from technology');
        if(!empty($token_new)) {

         if($token_new->status == 1){
                    if($token_new->technology == 'all'){
                        $totaldata =  DB::select('select * from portfolio');
                        $portfolio = DB::select('select * from portfolio ORDER BY display_index ASC LIMIT 99999 OFFSET 0 ');
                        //$portfolio = DB::select('select * from portfolio');
                    }else{

                         $totaldata = DB::table('accesstoken')
									                    ->leftJoin('portfolio', 'accesstoken.technology', '=', 'portfolio.technology')
									                    ->where('accesstoken.accesstoken',$token)
									                    ->where('accesstoken.status',1)
                                                        ->orderBy('portfolio.display_index', 'asc')
									                    ->get();
                         $portfolio = DB::table('accesstoken')
									                    ->leftJoin('portfolio', 'accesstoken.technology', '=', 'portfolio.technology')
									                    ->where('accesstoken.accesstoken',$token)
									                    ->where('accesstoken.status',1)
                                                        ->orderBy('portfolio.display_index', 'asc')
									                    ->skip(0)
									                    ->take(99999)
									                    ->get();
                    }


                     if(!empty($portfolio)){
                        return view('portfolio1', ['portfolios' => $portfolio,'technology' => $token_new->technology, 'technologies' => $technologies , 'token' => $token , 'totalcount' => count($totaldata)]);//
                    }else{

                        return view('error');
                    }

                }else{
                    return view('portfolio_check');
                }

         }else{
            return view('portfolio_check');
        }



    }

    public function showmoredata($token)
    {

        $token_new = DB::table('accesstoken')->where('accesstoken', $token)->first();
        $categories = DB::select('select * from category where parent_id = 0');
        if(!empty($token_new)) {

         if($token_new->status == 1){
                    if($token_new->technology == 'all'){
                        $totaldata =  DB::select('select * from portfolio');
                        $portfolio = DB::select('select * from portfolio LIMIT 999 OFFSET 8');
                        //$portfolio = DB::select('select * from portfolio');
                    }else{

                         $totaldata = DB::table('accesstoken')
                                                        ->leftJoin('portfolio', 'accesstoken.technology', '=', 'portfolio.technology')
                                                        ->where('accesstoken.accesstoken',$token)
                                                        ->where('accesstoken.status',1)
                                                        ->get();
                         $portfolio = DB::table('accesstoken')
                                                        ->leftJoin('portfolio', 'accesstoken.technology', '=', 'portfolio.technology')
                                                        ->where('accesstoken.accesstoken',$token)
                                                        ->where('accesstoken.status',1)
                                                        ->skip(8)
                                                        ->take(999)
                                                        ->get();
                    }


                     if(!empty($portfolio)){
                        return view('moredata', ['portfolios' => $portfolio,'technology' => $token_new->technology, 'categories' => $categories , 'token' => $token , 'totalcount' => count($totaldata)]);//
                    }else{

                        return view('error');
                    }

                }else{
                    return view('portfolio_check');
                }

         }else{
            return view('portfolio_check');
        }



    }


    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function singledetails($token)
    {
        $portfolio = DB::select('select * from portfolio where portfolioid = '.$token);
        return view('details_page', ['portfolio' => $portfolio]);
    }



    /**
     * Show the application welcome screen to the user.
     *
     *
    **/

    public function cronforaccesstoken()
    {


        $ids = array();

        $accesstokens = DB::select('SELECT * FROM accesstoken WHERE created_date < DATE_SUB(NOW(), INTERVAL 24 HOUR) AND created_date <= NOW() AND status = 1 ');

        foreach ($accesstokens as $accesstoken) {
                $ids[] = $accesstoken->accesstoken_id;
        }

        if(count($ids) > 0){
            $accesstokensupdates = DB::select("Update  accesstoken SET status = 0  Where accesstoken_id IN (".implode(',',$ids).")");
        }


    }

    public function ajaxloadmorecount(){
        $count = "";
        if(isset($_POST['ids']) && !empty($_POST['ids'])){
            $ids = implode(',',$_POST['ids']);
        }else{
                $ids = 0;
        }
        $cat = $_POST['cat'];
        if($cat == 'all'){
             $query = "select * from portfolio WHERE portfolioid NOT IN (".$ids.") LIMIT 6";
        }else{
             $query = "select * from portfolio WHERE portfolioid NOT IN (".$ids.") and technology = '$cat' LIMIT 6";
        }


        $portfolios = DB::select($query);

        echo  count($portfolios);
    }

    public function ajaxloadmore(){
        //echo  json_decode($_POST['cat']);//$_POST['cat'];
        $article = "";
        if(isset($_POST['ids']) && !empty($_POST['ids'])){
            $ids = implode(',',$_POST['ids']);
        }else{
                $ids = 0;
        }

        $cat = $_POST['cat'];
        $limit = 6;
        if($cat == 'all'){
             $query = "select * from portfolio WHERE portfolioid NOT IN (".$ids.") LIMIT 6";
        }else{
             $query = "select * from portfolio WHERE portfolioid NOT IN (".$ids.") and technology = '$cat' LIMIT 6";
        }

        $portfolios = DB::select($query);
        if(!empty($portfolios)){

            foreach ($portfolios as $portfolio) {

                $article .=  '<article class="col-md-4 col-sm-6 filter all portfolio-item '.str_replace(' ', '', $portfolio->technology).'" id="'.$portfolio->portfolioid.'">
                                    <div class="portfolio-thumb in wow fadeInUp " data-wow-duration="1s">
                                        <a href="'.url('portfoliodetail/'.$portfolio->portfolioid).'" class="main-link">
                                            <img class="img-responsive img-center" src="'. URL::asset('template/frontend/images/'.$portfolio->image) .'" alt="'.$portfolio->title.'">
                                            <div class="project-title">
                                                <h2 class="title-project">'.$portfolio->title.'</h2><span class="label label-default portfoliolbl"><i class="port_tag"></i>'.$portfolio->technology.'</span></div><span class="overlay-mask"></span></a>
                                    </div>
                                </article>';
            }

            //$article .=  '<div class="clearfix"></div>';

        }

        echo $article;

    }


    //public function ajaxloadmore($token, $offset)
    public function ajaxloadmoreold()
    {

        $portfolioes = array();
        $limit = 6; //$offset + 6;
        //$offset += 6;
        $article = "";
        $token_new = DB::table('accesstoken')->where('technology', $token)->first();

        if($token_new->technology == 'all'){
            //  echo 'select * from portfolio LIMIT '.$limit.'  OFFSET '.$offset.'fsdfd'; exit;
            $portfolios = DB::select('select * from portfolio LIMIT '.$limit.'  OFFSET '.$offset);
            //$portfolios = DB::select('select * from portfolio LIMIT '.$offset);
        }else{
            $portfolios = DB::table('accesstoken')
            ->leftJoin('portfolio', 'accesstoken.technology', '=', 'portfolio.technology')
            //->where('accesstoken.accesstoken',$token)
            ->where('portfolio.technology',$token)
            ->where('accesstoken.status',1)
            ->skip($offset)
            ->take(6)
            //->take($offset)
            ->get();

        }

        /*
        if($token_new->technology == 'all'){
            $portfolios = DB::select('select * from portfolio WHERE portfolioid NOT IN ('.$ids.') LIMIT '.$limit.'  OFFSET '.$offset);
        }else{
            $portfolios = DB::table('accesstoken')
            ->leftJoin('portfolio', 'accesstoken.technology', '=', 'portfolio.technology')
            ->where('portfolio.technology',$token)
            ->where('accesstoken.status',1)
            ->whereNotIn('portfolio.portfolioid', $ids)
            ->skip($offset)
            ->take(6)
            ->get();

        } */

        if(!empty($portfolios)){

            foreach ($portfolios as $portfolio) {

                $article .=  '<article class="col-md-4 col-sm-6 filter all portfolio-item '.str_replace(' ', '', $portfolio->technology).'" id="'.$portfolio->portfolioid.'">
                                    <div class="portfolio-thumb in wow fadeInUp " data-wow-duration="1s">
                                        <a href="'.url('portfoliodetail/'.$portfolio->portfolioid).'" class="main-link">
                                            <img class="img-responsive img-center" src="'. URL::asset('template/frontend/images/'.$portfolio->image) .'" alt="'.$portfolio->title.'">
                                            <div class="project-title">
                                                <h2 class="title-project">'.$portfolio->title.'</h2><span class="label label-default portfoliolbl"><i class="port_tag"></i>'.$portfolio->technology.'</span></div><span class="overlay-mask"></span></a>
                                    </div>
                                </article>';
            }

            //$article .=  '<div class="clearfix"></div>';

        }


       // print_r($portfolioes); exit;
       echo $article;


    }
public function ajaxloadmorewithids($token,$ids,$offset)
    {

        $portfolioes = array();
        $limit = 6; //$offset + 6;
        //$offset += 6;
        $article = "";
        $token_new = DB::table('accesstoken')->where('technology', $token)->first();

        if($token_new->technology == 'all'){
            $portfolios = DB::select('select * from portfolio WHERE portfolioid NOT IN ('.$ids.') LIMIT '.$limit.'  OFFSET '.$offset);
        }else{
            $portfolios = DB::table('accesstoken')
            ->leftJoin('portfolio', 'accesstoken.technology', '=', 'portfolio.technology')
            ->where('portfolio.technology',$token)
            ->where('accesstoken.status',1)
            ->whereNotIn('portfolio.portfolioid', [$ids])
            ->skip($offset)
            ->take(6)
            ->get();

        }

        if(!empty($portfolios)){

            foreach ($portfolios as $portfolio) {

                $article .=  '<article class="col-md-4 col-sm-6 filter all portfolio-item '.str_replace(' ', '', $portfolio->technology).'" id="'.$portfolio->portfolioid.'">
                                    <div class="portfolio-thumb in wow fadeInUp " data-wow-duration="1s">
                                        <a href="'.url('portfoliodetail/'.$portfolio->portfolioid).'" class="main-link">
                                            <img class="img-responsive img-center" src="'. URL::asset('template/frontend/images/'.$portfolio->image) .'" alt="'.$portfolio->title.'">
                                            <div class="project-title">
                                                <h2 class="title-project">'.$portfolio->title.'</h2><span class="label label-default portfoliolbl"><i class="port_tag"></i>'.$portfolio->technology.'</span></div><span class="overlay-mask"></span></a>
                                    </div>
                                </article>';
            }
        }

        echo $article;
    }


     public function ajaxloadmore1($token,$offset)
    {

        $portfolioes = array();
        $limit = 6; //$offset + 6;
        $article = "";
        $token_new = DB::table('accesstoken')->where('accesstoken', $token)->first();

        if($token_new->technology == 'all'){
            //  echo 'select * from portfolio LIMIT '.$limit.'  OFFSET '.$offset.'fsdfd'; exit;
            $portfolios = DB::select('select * from portfolio LIMIT '.$limit.'  OFFSET '.$offset);
        }else{
            $portfolios = DB::table('accesstoken')
            ->leftJoin('portfolio', 'accesstoken.technology', '=', 'portfolio.technology')
            ->where('accesstoken.accesstoken',$token)
            ->where('accesstoken.status',1)
            ->skip($offset)
            ->take(6)
            ->get();
        }

        if(!empty($portfolios)){

            foreach ($portfolios as $portfolio) {

                $article .=  '<article class="col-md-4 col-sm-6 filter all portfolio-item '.str_replace(' ', '', $portfolio->technology).'" id="'.$portfolio->portfolioid.'">
                                    <div class="portfolio-thumb in wow fadeInUp " data-wow-duration="1s">
                                        <a href="'.url('portfoliodetail/'.$portfolio->portfolioid).'" class="main-link">
                                            <img class="img-responsive img-center" src="'. URL::asset('template/frontend/images/'.$portfolio->image) .'" alt="'.$portfolio->title.'">
                                            <div class="project-title">
                                                <h2 class="title-project">'.$portfolio->title.'</h2><span class="label label-default portfoliolbl"><i class="port_tag"></i>'.$portfolio->technology.'</span></div><span class="overlay-mask"></span></a>
                                    </div>
                                </article>';
            }

            //$article .=  '<div class="clearfix"></div>';

        }


       // print_r($portfolioes); exit;
        echo $article;


    }

}
