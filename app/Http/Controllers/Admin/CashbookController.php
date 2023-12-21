<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use PDF;

class CashbookController extends Controller
{

	public function shgCashbook()
	{
		$shgdetails= DB::select(DB::raw("select * from `selfhelpgroups`"));
		$transactionTypes= DB::select(DB::raw("select * from `transaction_type`"));
		return view('admin.cashbook.shg_cashbook', compact('shgdetails', 'transactionTypes'));
	}

	public function shgCashbookTable(Request $request)
	{
		$shgcashbooks= DB::select(DB::raw("select * from `shg_cashbook` where `shg_id` = $request->id"));
		return view('admin.cashbook.shg_cashbook_table', compact('shgcashbooks'));
	}

	public function shgCashbookStore(Request $request)
	{
		try {
            $rules=[
            'shg_id' => 'required',  
            'transaction_type' => 'required',  
        ];
        
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
        }
        $ondate=date('Y-m-d',strtotime($request->ondate));

        $rs_save=DB::select(DB::raw("insert into `shg_cashbook` (`shg_id`, `transaction_type`, `debit`, `credit`, `ondate`) values ($request->shg_id, $request->transaction_type, '$request->debit', '$request->credit', '$ondate');"));

        $response=['status'=>1,'msg'=>'Submit Successfully'];
        return response()->json($response); 
        } catch (Exception $e) {
            
        }
	}


}
