<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use URL;

class RootController extends Controller
{
    private $request;

    public function __construct (Request $request) {
        $this->request = $request;
    }
    public function index () {
        $page = $this->request->get('page') ? $this->request->get('page') : 1;

        $client = new Client();
        $params = [
            'query' => [
                'page' => $page
            ]
        ];
        try {
            $res = $client->get($this->apiUrl('people/'), $params); 
        } catch (\Exception $e) {
            $res = null;
        }

        if (!$res) {
            $hasNext = '';
            $hasPrevious = '';
            $peoples = [];
        } else {
            $obj = json_decode($res->getBody());
            //dd($obj->results);
            $nextPage     = $page + 1;
            $previousPage = $page - 1;

            $hasNext     = $obj->next ? URL::to("/?page=$nextPage") : "";
            $hasPrevious = $obj->previous ? URL::to("/?page=$previousPage") : "";
            $peoples     = $obj->results;
        }

        //return view('rootView', compact('hasNext', 'hasPrevious', 'peoples', 'page'));
        return view('test.page1',compact('hasNext', 'hasPrevious', 'peoples', 'page'));
    }

    public function page1()
    {
        $page = $this->request->get('page') ? $this->request->get('page') : 1;

        $client = new Client();
        $params = [
            'query' => [
                'page' => $page
            ]
        ];
        try {
            $res = $client->get($this->apiUrl('people/'), $params); 
        } catch (\Exception $e) {
            $res = null;
        }

        if (!$res) {
            $hasNext = '';
            $hasPrevious = '';
            $peoples = [];
        } else {
            $obj = json_decode($res->getBody());
            //dd($obj->results);
            
            $nextPage     = $page + 1;
            $previousPage = $page - 1;

            $hasNext     = $obj->next ? URL::to("/?page=$nextPage") : "";
            $hasPrevious = $obj->previous ? URL::to("/?page=$previousPage") : "";
            $peoples     = $obj->results;
           
        }
        return view('test.page1',compact('hasNext', 'hasPrevious', 'peoples', 'page'));
    }
}
