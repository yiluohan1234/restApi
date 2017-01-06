<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
	//测试
	public function test()
	{
		$data = $this->request();
		dd($data);
	}
	public function request()
	{
		$url="http://www.baidu.com";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
		curl_setopt($ch, CURLOPT_TIMEOUT,60);
		curl_setopt($ch, CURLOPT_URL, $url);
		$response = curl_exec($ch);
		curl_close($ch);
		$data = json_decode($response,true);
		return $data;
	}
}
