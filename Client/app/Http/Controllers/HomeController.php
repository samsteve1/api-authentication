<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as Guzzle;

class HomeController extends Controller
{
    public $client;

   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Guzzle $client)
    {
        $this->middleware('auth');
        $this->client = new $client;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $tweets = collect();

        
        
        if($request->user()->token) {
            $headers = [
                'Authorization' => 'Bearer ' . $request->user()->token->access_token,
                'Accept' => 'application/json',
            ];
            
            $response = $this->client->request('GET', 'http://127.0.0.1:8000/api/tweets', [
                
                'headers'   => $headers
                //'Content-Type' => 'application/json',
            ]);
            
            $tweets = collect(json_decode($response->getBody()));
            
            }

        return view('home', compact('tweets'));
        }   
}