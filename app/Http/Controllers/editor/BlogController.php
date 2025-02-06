<?php

namespace App\Http\Controllers\editor;

use Exception;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    // 
    // Menampilkan Halaman Index Blog
    // 
    public function index()
    {
        return view('pages.editor.blog.index');
    }

    // 
    // Mengambil Data Blog (AJAX)
    // 
    public function getData(Request $request): JsonResponse
    {
        $rescode = 200;
        $cari = $request->input('search', '');
        $start = $request->input('start', 0);
        $limit = $request->input('limit', 10);

        try {
            // Query pencarian berdasarkan judul atau kategori
            $query = Blog::where('title', 'LIKE', '%' . $cari . '%')
                ->orWhere('category', 'LIKE', '%' . $cari . '%');

            // Mengambil data berdasarkan pagination
            $blogs = $query->offset($start)
                ->limit($limit)
                ->get();

            // Menghitung total data
            $blogs_total = $query->count();

            // Menyusun response JSON
            $data['draw'] = intval($request->input('draw'));
            $data['recordsTotal'] = $blogs_total;
            $data['recordsFiltered'] = $blogs_total;
            $data['data'] = $blogs;
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
    // Menyimpan Data Blog Baru
    // 
    public function storeData(Request $request): JsonResponse
    {
        date_default_timezone_set('Asia/Jakarta');
        $rescode = 200;
        $user = Auth::user()->id;

        try {
            // Validasi input
            $rules = [
                'title' => 'required|string|max:255',
                'content' => 'required|string',
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
                $validData['slug'] = Str::slug($validData['title']);
                Blog::create($validData);

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
    // Menampilkan Detail Data Blog
    // 
    public function detail(Request $request): JsonResponse
    {
        $rescode = 200;
        $id = $request->input('id', 0);
        $data = Blog::find($id);

        if ($data) {
            $res = ['success' => 1, 'data' => $data];
        } else {
            $res = ['success' => 0, 'messages' => 'Data tidak ditemukan'];
        }

        return response()->json($res, $rescode);
    }

    // 
    // Mengupdate Data Blog
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
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'category' => 'required|string|max:255',
                'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $res = ['success' => 0, 'messages' => implode(',', $validator->errors()->all())];
            } else {
                $validData = $validator->validate();
                $blog = Blog::find($id);

                if ($blog) {
                    // Jika ada file gambar baru, hapus gambar lama dan simpan yang baru
                    if ($validData['file'] != null) {
                        $filePath = $blog->image;
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
                    $validData['slug'] = Str::slug($validData['title']);
                    $blog->update($validData);

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
    // Menghapus Data Blog
    // 
    public function deleteData(Request $request): JsonResponse
    {
        date_default_timezone_set('Asia/Jakarta');
        $rescode = 200;
        $id = $request->input('id');

        try {
            $blog = Blog::find($id);

            if ($blog) {
                $blog->update(['deleted_by' => Auth::id()]);
                $blog->delete();
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
