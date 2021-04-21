<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
class PaymentController extends Controller
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
        $data['page'] = 'payment';
        $data['payments'] = DB::select('select * from payment');

        return view('admin/payment/payment',$data);
    }

    public function show()
    {
        $data = array();
        $data['page'] = 'payment';
        $data['payments'] = DB::select('select * from payment');
        return view('admin/payment/add',$data);
    }


    public function store(Request $request)
    {
        $method = $request->method();

        if ($request->isMethod('post')) {

            $payment = $request->input('name');
            $countdata = DB::table('payment')
                ->where('payment_name', '=', $payment);

            $count = $countdata->count();
            if($count == 0){

                $id = DB::table('payment')->insertGetId(['payment_name' => $payment]);
                if($id != ''){
                    Session::flash('message', 'Payment method added successfully.');
                    return redirect('admin/payment-methods');
                }
            }else{
                    Session::flash('message', 'Payment method already exists.');
                    return redirect('admin/payment-methods/add');
            }
         
        }
        
        $data = array();
        $data['page'] = 'payment';
        return view('admin/payment/add',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function delete($id)
    {
        $query = DB::table('payment')->where('payment_id', '=', $id)->delete();
        Session::flash('message', 'Payment method deleted successfully.');
        return redirect('admin/payment-methods');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
    */

    public function edit($id)
    {
        $data = array();
        
        $data['results'] = DB::select('select * from payment where payment_id = '.$id);
        $data['payments'] = DB::select('select * from payment');
        $data['page'] = 'payment';
        return view('admin/payment/edit',$data);
    }

    public function update(Request $request)
    {
        $method = $request->method();

        if ($request->isMethod('post')) {
            $payment_name = $request->input('name'); 
            $payment_id =  $request->input('id'); 

            $countdata = DB::table('payment')
                ->where('payment_name', '=', $payment_name);

            $count = $countdata->count();
            if($count == 0){

                $query = DB::table('payment')->where('payment_id', $payment_id)->update(['payment_name' => $payment_name]);
                if($payment_id){
                    Session::flash('message', 'Payment method updated successfully.');
                    return redirect('admin/payment-methods');
                }
            }else{
                    Session::flash('message', 'Payment method already exists.');
                    return redirect('admin/payment-methods/edit/'.$payment_id);
            }
         
        }
        
        $data = array();
        $id =  $request->input('id'); 
        $data['page'] = 'payment';
        $data['results'] = DB::select('select * from payment where payment_id = '.$id);
        $data['payments'] = DB::select('select * from payment');
        return view('admin/payment/edit',$data);
    }
}
