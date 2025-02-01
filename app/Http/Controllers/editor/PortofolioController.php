<?php

namespace App\Http\Controllers\editor;

use Exception;
use App\Models\Portofolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PortofolioController extends Controller
{
    // 
    // Menampilkan Halaman Index Portofolio
    // 
    public function index()
    {
        return view('pages.editor.portofolio.index');
    }

    // 
    // Mengambil Data Portofolio (AJAX)
    // 
    public function getData(Request $request): JsonResponse
    {
        $rescode = 200;
        $cari = $request->input('search', '');
        $start = $request->input('start', 0);
        $limit = $request->input('limit', 10);

        try {
            // Query pencarian berdasarkan client atau kategori
            $query = Portofolio::where('client', 'LIKE', '%' . $cari . '%')
                ->orWhere('category', 'LIKE', '%' . $cari . '%');

            // Mengambil data berdasarkan pagination
            $portofolio = $query->offset($start)
                ->limit($limit)
                ->get();
            
            // Menghitung total data
            $portofolio_total = $query->count();

            // Menyusun response JSON
            $data['draw'] = intval($request->input('draw'));
            $data['recordsTotal'] = $portofolio_total;
            $data['recordsFiltered'] = $portofolio_total;
            $data['data'] = $portofolio;
        } catch (QueryException $e) {
            $data['error'] = 'Ops terjadi kesalahan saat mengambil data';
            Log::error('QueryException: ' . $e);
        } catch (Exception $e) {
            $data['error'] = 'Ops terjadi kesalahan pada server';
            Log::error('Exception: ' . $e);
        }

        return response()->json($data, $rescode);
    }

    // 
    // Menyimpan Data Portofolio Baru
    // 
    public function storeData(Request $request): JsonResponse
    {
        date_default_timezone_set('Asia/Jakarta');
        $rescode = 200;
        $user = Auth::user()->id;

        try {
            // Validasi input
            $rules = [
                'client' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];

            $messages = [
                'required' => ':attribute wajib diisi',
                'string' => ':attribute harus bertipe string',
                'max' => ':attribute tidak boleh lebih dari :max karakter',
                'file.image' => ':attribute harus berupa gambar',
                'file.mimes' => ':attribute hanya boleh bertipe jpeg, png, jpg',
            ];

            $data = $request->all();
            $validator = Validator::make($data, $rules, $messages);

            // Jika validasi gagal, kirim pesan error
            if ($validator->fails()) {
                $v_error = $validator->errors()->all();
                $res = ['success' => 0, 'messages' => implode(',', $v_error)];
            } else {
                $validData = $validator->validate();

                // Menyimpan gambar ke storage
                $img = $validData['file'];
                $file_name = Str::uuid() . '.' . $img->getClientOriginalExtension();
                $path = $img->storeAs('img', $file_name, 'public');

                // Menyimpan data ke database
                $validData['created_by'] = $user;
                $validData['image'] = $path;
                $validData['slug'] = Str::slug($validData['client'] . '-' . $validData['category']);
                Portofolio::create($validData);

                $res = ['success' => 1, 'messages' => 'Success Tambah Data'];
            }
        } catch (QueryException $e) {
            $res = ['success' => 0, 'messages' => 'Ops terjadi kesalahan saat Proses data'];
            Log::error('QueryException: ' . $e);
        } catch (Exception $e) {
            $res = ['success' => 0, 'messages' => 'Ops terjadi kesalahan pada server'];
            Log::error('Exception: ' . $e);
        }

        return response()->json($res, $rescode);
    }

    // 
    // Menampilkan Detail Data Portofolio
    // 
    public function detail(Request $request): JsonResponse
    {
        $rescode = 200;
        $id = $request->input('id', 0);
        $data = Portofolio::find($id);

        if ($data) {
            $res = ['success' => 1, 'data' => $data];
        } else {
            $res = ['success' => 0, 'messages' => 'Data tidak ditemukan'];
        }

        return response()->json($res, $rescode);
    }

    // 
    // Mengupdate Data Portofolio
    // 
    public function updateData(Request $request): JsonResponse
    {
        date_default_timezone_set('Asia/Jakarta');
        $rescode = 200;
        $user = Auth::user()->id;
        $id = $request->input('id', 0);

        try {
            // Cek apakah file gambar dikirim atau tidak
            if (!$request->filled('file')) {
                $request->merge(['file' => null]);
            }

            // Validasi input
            $rules = [
                'client' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $res = ['success' => 0, 'messages' => implode(',', $validator->errors()->all())];
            } else {
                $validData = $validator->validate();
                $portofolio = Portofolio::find($id);

                if ($portofolio) {
                    // Jika ada file gambar baru, hapus gambar lama dan simpan yang baru
                    if ($validData['file'] != null) {
                        $filePath = $portofolio->image;
                        if (Storage::disk('public')->exists($filePath)) {
                            Storage::disk('public')->delete($filePath);
                        }
                        $img = $validData['file'];
                        $file_name = Str::uuid() . '.' . $img->getClientOriginalExtension();
                        $path = $img->storeAs('img', $file_name, 'public');
                        $validData['image'] = $path;
                    }

                    // Update data
                    $validData['updated_by'] = $user;
                    $validData['slug'] = Str::slug($validData['client'] . '-' . $validData['category']);
                    $portofolio->update($validData);

                    $res = ['success' => 1, 'messages' => 'Success Update Data'];
                } else {
                    $res = ['success' => 0, 'messages' => 'Data tidak ditemukan'];
                }
            }
        } catch (QueryException $e) {
            $res = ['success' => 0, 'messages' => 'Ops terjadi kesalahan saat update data'];
            Log::error('QueryException: ' . $e);
        } catch (Exception $e) {
            $res = ['success' => 0, 'messages' => 'Ops terjadi kesalahan pada server'];
            Log::error('Exception: ' . $e);
        }

        return response()->json($res, $rescode);
    }

    // 
    // Menghapus Data Portofolio
    // 
    public function deleteData(Request $request): JsonResponse
    {
        date_default_timezone_set('Asia/Jakarta');
        $rescode = 200;
        $id = $request->input('id');

        try {
            $portofolio = Portofolio::find($id);

            if ($portofolio) {
                $portofolio->update(['deleted_by' => Auth::id()]);
                $portofolio->delete();
                $res = ['success' => 1, 'messages' => 'Success Delete Data'];
            } else {
                $res = ['success' => 0, 'messages' => 'Data tidak ditemukan'];
            }
        } catch (QueryException $e) {
            Log::error('QueryException: ' . $e);
        }

        return response()->json($res, $rescode);
    }
}
