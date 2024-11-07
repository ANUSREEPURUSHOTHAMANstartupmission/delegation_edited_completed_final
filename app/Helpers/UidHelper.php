<?php

namespace App\Helpers;


use Illuminate\Support\Facades\Http;

class UidHelper{

    public static function login(){
        $query = http_build_query([
          'client_id' => config('uid.key'),
          'redirect_uri' => route(config('uid.callback')),
          'response_type' => 'code',
          'state' => uniqid(),
        ]);
    
        return redirect(config('uid.server').'/oauth/authorize?'.$query);
    }

    public static function callback(){

        $response = Http::asForm()->post(config('uid.server').'/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => config('uid.key'),
            'client_secret' => config('uid.secret'),
            'redirect_uri' => route(config('uid.callback')),
            'code' => request()->code,
        ]);

        if($response->successful()){

            $data = $response->json();
    
            if(array_key_exists('access_token', $data)){
        
                $response = Http::withToken($data['access_token'])->get(config('uid.server').'/api/user');
        
                if($response->successful()){

                    $data = $response->json();
                
                    return $data['data'] ?? false;  

                }
        
            }
        }
    
        return false;
    
    }


    public static function checkEmail($email){

        //check if email id is in uid database
       $req = Http::withHeaders([
         'x-auth-key' => config('uid.key'),
         'x-auth-secret' => config('uid.secret')
       ])->asForm()->post(config('uid.server').'/api/v1/email/verify', [
           'email' => $email
       ]);
   
       if($req->successful()){
         $data = $req->json();
   
         return $data['unique_id'] ?? false;
       }
   
       return false;
    }
   
    public static function getUidDetails($uid){
   
       $req = Http::withHeaders([
         'x-auth-key' => config('uid.key'),
         'x-auth-secret' => config('uid.secret')
       ])->post(config('uid.server').'/api/v1/startup/data', [
           'unique_id' => $uid
       ]);
   
       if($req->successful()){
         $data = $req->json();
   
         return $data['data'] ?? false;      
       }
   
       return false;
   
    }

}