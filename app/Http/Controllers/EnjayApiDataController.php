<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\enjay_api_data;

class EnjayApiDataController extends Controller
{
    public function storeData(Request $request){
        // return $request;
        


        //using simple storing each data and save() method
        /*
        $data = new enjay_api_data();
        
        $data->asteriskhost = $request->asteriskhost;
        $data->event = $request->event;
        $data->direction = $request->direction;
        $data->number = $request->number;
        $data->extension = $request->extension;
        $data->start_time = $request->start_time;
        $data->answer_time = $request->answer_time;
        $data->end_time = $request->end_time;
        $data->duration = $request->duration;
        $data->billablesecond = $request->billablesecond;
        $data->disposition = $request->disposition;
        $data->unique_id = $request->unique_id;
        $data->record_link = $request->record_link;
        $data->hangupchannel = $request->hangupchannel;
        $data->redirectchannel = $request->redirectchannel;
        // $data->created_at = time();
        // $data->updated_at = time();

        $result = $data->save();
        if($result){
            return response([
                'status'=>1,
                'msg'=>'success'
            ],200);
        }else{
            return response([
                'status'=>0,
                'msg'=>'error'
            ],200);
        }
        */

        //Using create() method
        /*
        $data = enjay_api_data::create([
            'asteriskhost' => $json_data->asteriskhost,
            'event' => $json_data->event,
            'direction' => $json_data->direction,
            'number' => $json_data->number,
            'extension' => $json_data->extension,
            'start_time' => $json_data->start_time,
            'answer_time' => $json_data->answer_time,
            'end_time' => $json_data->end_time,
            'duration' => $json_data->duration,
            'billablesecond' => $json_data->billablesecond,
            'disposition' => $json_data->disposition,
            'unique_id' => $json_data->unique_id,
            'record_link' => $json_data->record_link,
            'hangupchannel' => $json_data->hangupchannel,
            'redirectchannel' => $json_data->redirectchannel
            // 'created_at' => time(),
            // 'updated_at' => time(),
        ]);
        */

        //When uek like http://127.0.0.1:8000/v1/endpoint/sriramhardware?eventdetails={"asteriskhost":"192.168.1.51"}

        $request=  $request->eventdetails;
        $json_data = json_decode($request,true);
        

        $data = enjay_api_data::create([
            'asteriskhost' => $json_data['asteriskhost'],
            'event' => $json_data['event'],
            'direction' => $json_data['direction'],
            'number' => $json_data['number'],
            'extension' => $json_data['extension'],
            'start_time' => $json_data['start_time'],
            'answer_time' => $json_data['answer_time'],
            'end_time' => $json_data['end_time'],
            'duration' => $json_data['duration'],
            'billablesecond' => $json_data['billablesecond'],
            'disposition' => $json_data['disposition'],
            'unique_id' => $json_data['unique_id'],
            'record_link' => $json_data['record_link']
            // 'hangupchannel' => $json_data['hangupchannel'],
            // 'redirectchannel' => $json_data['redirectchannel']
            // 'created_at' => time(),
            // 'updated_at' => time(),
        ]);

        if($data){
            return response([
                'status'=>1,
                'msg'=>'success'
            ],201);
        }else{
            return response([
                'status'=>0,
                'msg'=>'error'
            ],400);
        }
        
        


        
    }
}
