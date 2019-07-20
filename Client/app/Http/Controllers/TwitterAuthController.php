<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as Guzzle;

class TwitterAuthController extends Controller
{
    protected $client;

    public function __construct(Guzzle $client)
    {
        $this->client = $client;
    }
    public function redirect()
    {
        $query = http_build_query([
            'client_id' => '8',
            'redirect_url' => 'http://127.0.0.1:8001/auth/twitter/callback',
            'response_type' => 'code',
            'scope' => '*'
        ]);

        return redirect('http://127.0.0.1:8000/oauth/authorize?' . $query);
    }

    public function callback(Request $request)
    {
        $response = $this->client->post('http://127.0.0.1:8000/oauth/token', [
          'form_params' => [
              'grant_type'  =>  'authorization_code',
              'client_id'   =>  '8',
              'client_secret' =>   '76kF8kO6F2hrlpMXPJjDe2NIVdcmwNWRICddaf4U',
              'redirect_uri'   =>   'http://127.0.0.1:8001/auth/twitter/callback',
              'code'    =>  $request->code,
          ]
        ]);

        $response = json_decode($response->getBody());

        $request->user()->token()->delete();

        $request->user()->token()->create([
            'access_token'  => $response->access_token
        ]);

        return redirect('/home');
    }
}
