<?php

namespace App\Http\Controllers;

use App\Models\webhook_store_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebhookController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {

            $requestBody = file_get_contents('php://input');
            $json = json_decode($requestBody);
             
            $parameters = (array)$json->queryResult->parameters;
            $intent = (array)$json->queryResult->intent;
            
            switch ($intent['displayName']){
                case 'meal-eat-out - yes - entry address':
                    $webhookData = array(
                        'intent' => $intent, 'parameters' => $parameters
                    );
                    
                    if (mb_strlen($parameters[array_key_first($parameters)]) > 20){
                        $saved = $this->store($webhookData);
                    
                        if ($saved){
                            return response()->json([
                                "fulfillmentText"=> "Đã ghi nhận dữ liệu thành công" 
                            ], 200);
                        }
                    }
                    else{
                        return response()->json([
                            "fulfillmentText"=> "Dự liệu này ngắn quá" 
                        ], 200);
                    }
                break;
            }
            
            return response()->json([
                "fulfillmentText"=> "Ghi nhận dữ liệu thất bại ... Vui  lòng thử  lại sau "
            ], 200);
        }
        else if ($request->isMethod('get')) {

            var_dump("okie get: " . csrf_token());

        }
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
    public function store($webhookData)
    {
        return webhook_store_data::create($webhookData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\webhook_store_data  $webhook_store_data
     * @return \Illuminate\Http\Response
     */
    public function show(webhook_store_data $webhook_store_data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\webhook_store_data  $webhook_store_data
     * @return \Illuminate\Http\Response
     */
    public function edit(webhook_store_data $webhook_store_data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\webhook_store_data  $webhook_store_data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, webhook_store_data $webhook_store_data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\webhook_store_data  $webhook_store_data
     * @return \Illuminate\Http\Response
     */
    public function destroy(webhook_store_data $webhook_store_data)
    {
        //
    }
}
