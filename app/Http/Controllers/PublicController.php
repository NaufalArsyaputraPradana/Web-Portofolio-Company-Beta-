<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\MasterHead;
use App\Models\Portofolio;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view('pages.fe.index');
    }
    public function portofolio()
    {
        return view('pages.fe.portofolio');
    }
    public function blog()
    {
        return view('pages.fe.blog');
    }
    public function contact()
    {
        return view('pages.fe.contact');
    }

    public function getData(): JsonResponse
    {
        $masterHead = MasterHead::select('title', 'subtitle', 'image')->latest()->first();
        $service = Service::select('title', 'description', 'image')->get();
        $portofolio = Portofolio::select('client', 'category', 'image', 'slug')->get();
        $blog = Blog::select('title', 'content', 'category', 'image', 'slug')->get();
        $data = [
            'master_head' => $masterHead,
            'service' => $service,
            'portofolio' => $portofolio,
            'blog' => $blog,
        ];
        return response()->json($data);
    }
}
