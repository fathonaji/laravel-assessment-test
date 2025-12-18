<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private string $filePath = 'products.json';

    public function index()
    {
        $products = [];

        if (Storage::exists($this->filePath)) {
            $products = json_decode(Storage::get($this->filePath), true);
            usort($products, function ($a, $b) {
                return strtotime($b['submitted_at']) <=> strtotime($a['submitted_at']);
            });
        }

        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $item = [
            'product_name' => $data['product_name'],
            'quantity' => $data['quantity'],
            'price' => $data['price'],
            'total' => $data['quantity'] * $data['price'],
            'submitted_at' => now()->toDateTimeString(),
        ];

        $products = [];

        if (Storage::exists($this->filePath)) {
            $products = json_decode(Storage::get($this->filePath), true);
        }

        array_unshift($products, $item);

        Storage::put(
            $this->filePath,
            json_encode($products, JSON_PRETTY_PRINT)
        );

        return response()->json([
            'success' => true,
            'html' => view('products._table', [
                'products' => $products
            ])->render()
        ]);
    }
}
