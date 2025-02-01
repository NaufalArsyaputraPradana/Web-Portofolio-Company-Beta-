<?php

namespace App\Http\Controllers;

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

    public function getData(): JsonResponse
    {
        $masterHead = MasterHead::select('title', 'subtitle', 'image')->latest()->first();
        $service = Service::select('title','description','image')->get();
        $portofolio = Portofolio::select('client','category','image','slug')->get();
        $data = [
            'master_head' => $masterHead,
            'service' => $service,
            'portofolio' => $portofolio,
            
        ];
        return response()->json($data);
    }
}
