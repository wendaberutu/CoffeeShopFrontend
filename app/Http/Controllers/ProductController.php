<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class ProductController extends Controller
{
    public function index()
    {
        // Token bisa diambil dari session atau localStorage
        $token = 'your_valid_token_here';
        $client = new Client();
        $response = $client->get('http://127.0.0.1:8000/api/public/products', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept'        => 'application/json',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        if (isset($data['status']) && $data['status'] == 'success') {
            $products = collect($data['data']);

            return view('admin.product', ['products' => $products]);
        }

        return view('admin.product', ['error' => 'Failed to fetch products.']);
    }


    public function edit()
    {
        return view('admin.edit');
    }
    // public function tambah()
    // {
    //     return view('admin.tambah');
    // }

}
