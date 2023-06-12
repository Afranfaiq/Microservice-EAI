<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;


class UIController extends Controller
{

    public function regis()
    {
        return view('register');
    }
    public function log()
    {
        return view('login');
    }
    
    public function register(Request $request)
    {
        $response = Http::post('http://localhost:8001/api/AuthRegister', [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        if ($response->successful()) {
            return view("login");
        } else {
            // Jika request gagal
            return response()->json(['error' => 'Registration failed'], $response->status());
        }
    }

    public function login(Request $request)
    {
        $response = Http::post('http://localhost:8001/api/AuthLogin', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($response->successful()) {
            // Jika login berhasil
            return view('/welcome');
        } else {
            // Jika login gagal
            return redirect()->back()->withErrors('Invalid email or password.');;
        }
    }

    public function logout(Request $request)
    {
        $response = Http::post('http://localhost:8001/api/AuthLogout', [
        ]);
    
        // Cek status respons
        if ($response->successful()) {
            // Logout berhasil, 
            return redirect('/login')->with('success', 'Logout success');
        } else {
            // Logout gagal, 
            return redirect('/')->with('error', 'Logout failed');
        }
    }

    public function product()
    {
        $client = new Client();

        $response = $client->get('http://localhost:8002/api/Product');

        if ($response->getStatusCode() == 200) {
            $products = json_decode($response->getBody(), true);

            return view('product')->with('products', $products);
        } else {
            return redirect('product')->with('error', 'Failed to fetch products');
        }
    }

    public function searchProduct(Request $request)
    {
        $search = $request->input('search');
    
        $client = new Client();
    
        $response = $client->get('http://localhost:8002/api/Product');
    
        if ($response->getStatusCode() == 200) {
            $products = json_decode($response->getBody(), true);
    
            $filteredProducts = array_filter($products, function ($product) use ($search) {
                return strpos(strtolower($product['nama']), strtolower($search)) !== false;
            });
    
            return view('product')->with('products', $filteredProducts);
        } else {
            return redirect('product')->with('error', 'Failed to fetch products');
        }
    }
    
    
}
