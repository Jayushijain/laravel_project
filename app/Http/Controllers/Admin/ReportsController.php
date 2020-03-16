<?php

namespace App\Http\Controllers\Admin;

use App\PackagePurchasedHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_info['timestamp_start'] = strtotime('-29 days', time());
        $page_info['timestamp_end']   = strtotime(date('Y-m-d h:i:s'));
        $page_info['page_title'] = 'Reports';
        $page_info['page_name']  = 'reports';
        $purchase_histories = PackagePurchasedHistory::where([
            ['purchase_date','>=' , date('Y-m-d h:i:s',$page_info['timestamp_start'])],
            ['purchase_date','<=' , date('Y-m-d h:i:s',$page_info['timestamp_end'])]
    ])->get();

        //return $purchase_histories;

         return view('backend.admin.reports.index', compact('page_info', 'purchase_histories'));

    }

    /**
     * Display listing of the reports for the given time range.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter_by_date_range( $range)
    {
        return $range;
        //return $input = explode('-',$request->date_range);
    //     $page_info['timestamp_start'] = strtotime($input[0]);
    //     $page_info['timestamp_end']   = strtotime($input[1]);
    //     $page_info['page_title'] = 'Offline Payment';
    //     $page_info['page_name']  = 'offline_payment';
    //     $purchase_histories = PackagePurchasedHistory::where([
    //         ['purchase_date','>=' , date('Y-m-d h:i:s',$page_info['timestamp_start'])],
    //         ['purchase_date','<=' , date('Y-m-d h:i:s',$page_info['timestamp_end'])]
    // ])->get();

    //     return view('backend.admin.reports.index', compact('page_info', 'purchase_histories'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
