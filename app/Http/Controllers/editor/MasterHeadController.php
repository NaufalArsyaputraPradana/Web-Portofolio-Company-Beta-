<?php

// ====================================================
// Namespace dan Import
// ====================================================
namespace App\Http\Controllers\editor;

use Exception;
use App\Models\MasterHead;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MasterHeadController extends Controller
{
    // ====================================================
    // Menampilkan Halaman Index MasterHead
    // ====================================================
    public function index()
    {
        return view('pages.editor.masterhead.index');
    }

    // ====================================================
    // Mengambil Data MasterHead (AJAX)
    // ====================================================
    public function getData(Request $request): JsonResponse
    {
        $rescode = 200;
        $cari = $request->input('search', '');
        $start = $request->input('start', 0);
        $limit = $request->input('limit', 10);

        try {
            $query = MasterHead::where('title', 'LIKE', '%' . $cari . '%');
            $masterhead = $query->offset($start)->limit($limit)->get();
            $masterhead_total = $query->count();

            $data = [
                'draw' => intval($request->input('draw')),
                'recordsTotal' => $masterhead_total,
                'recordsFiltered' => $masterhead_total,
                'data' => $masterhead
            ];
        } catch (QueryException $e) {
            $data['error'] = 'Ops terjadi kesalahan saat mengambil data';
            Log::error('QueryException: ' . $e);
        } catch (Exception $e) {
            $data['error'] = 'Ops terjadi kesalahan pada server';
            Log::error('Exception: ' . $e);
        }

        return response()->json($data, $rescode);
    }

    // ====================================================
    // Menyimpan Data MasterHead Baru
    // ====================================================
    public function storeData(Request $request): JsonResponse
    {
        date_default_timezone_set('Asia/Jakarta');
        $rescode = 200;
        $user = Auth::user()->id;

        try {
            // Validasi Input
            $rules = [
                'title' => 'required|string|max:255|unique:master_head,title',
                'subtitle' => 'required|string|max:255',
                'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];

            $messages = [
                'title.unique' => 'Title sudah digunakan',
                'required' => ':attribute wajib diisi',
                'string' => ':attribute harus bertipe string',
                'max' => ':attribute tidak boleh lebih dari 2MB',
                'file.image' => ':attribute harus berupa gambar',
                'file.mimes' => ':attribute harus berformat jpeg, png, jpg',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'success' => 0,
                    'messages' => implode(', ', $validator->errors()->all())
                ], $rescode);
            }

            // Simpan Data
            $validData = $validator->validated();
            $img = $validData['file'];
            $file_name = Str::uuid() . '.' . $img->getClientOriginalExtension();
            $path = $img->storeAs('img', $file_name, 'public');

            $validData['created_by'] = $user;
            $validData['image'] = $path;

            MasterHead::create($validData);

            return response()->json(['success' => 1, 'messages' => 'Success Tambah Data'], $rescode);
        } catch (QueryException $e) {
            Log::error('QueryException: ' . $e);
            return response()->json(['success' => 0, 'messages' => 'Ops terjadi kesalahan saat Proses data'], $rescode);
        } catch (Exception $e) {
            Log::error('Exception: ' . $e);
            return response()->json(['success' => 0, 'messages' => 'Ops terjadi kesalahan pada server'], $rescode);
        }
    }

    // ====================================================
    // Menampilkan Detail Data MasterHead
    // ====================================================
    public function detail(Request $request): JsonResponse
    {
        $rescode = 200;
        $id = $request->input('id', 0);
        $data = MasterHead::find($id);

        return response()->json([
            'success' => $data ? 1 : 0,
            'data' => $data ?? 'Data tidak ditemukan'
        ], $rescode);
    }

    // ====================================================
    // Mengupdate Data MasterHead
    // ====================================================
    public function updateData(Request $request): JsonResponse
    {
        date_default_timezone_set('Asia/Jakarta');
        $rescode = 200;
        $user = Auth::user()->id;
        $id = $request->input('id', 0);

        try {
            $rules = [
                'title' => 'required|string|max:255',
                'subtitle' => 'required|string|max:255',
                'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ];

            $messages = [
                'required' => ':attribute wajib diisi',
                'string' => ':attribute harus bertipe string',
                'max' => ':attribute tidak boleh lebih dari 2MB',
                'file.image' => ':attribute harus berupa gambar',
                'file.mimes' => ':attribute harus berformat jpeg, png, jpg',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'success' => 0,
                    'messages' => implode(', ', $validator->errors()->all())
                ], $rescode);
            }

            $validData = $validator->validated();
            $masterhead = MasterHead::find($id);

            if (!$masterhead) {
                return response()->json(['success' => 0, 'messages' => 'Data tidak ditemukan'], $rescode);
            }

            if ($validData['file'] ?? false) {
                Storage::disk('public')->delete($masterhead->image);

                $img = $validData['file'];
                $file_name = Str::uuid() . '.' . $img->getClientOriginalExtension();
                $validData['image'] = $img->storeAs('img', $file_name, 'public');
            }

            $validData['updated_by'] = $user;
            $masterhead->update($validData);

            return response()->json(['success' => 1, 'messages' => 'Success Update Data'], $rescode);
        } catch (QueryException $e) {
            Log::error('QueryException: ' . $e);
            return response()->json(['success' => 0, 'messages' => 'Ops terjadi kesalahan saat update data'], $rescode);
        } catch (Exception $e) {
            Log::error('Exception: ' . $e);
            return response()->json(['success' => 0, 'messages' => 'Ops terjadi kesalahan pada server'], $rescode);
        }
    }

    // ====================================================
    // Menghapus Data MasterHead
    // ====================================================
    public function deleteData(Request $request): JsonResponse
    {
        $rescode = 200;
        $id = $request->input('id');

        try {
            $masterhead = MasterHead::find($id);

            if (!$masterhead) {
                return response()->json(['success' => 0, 'messages' => 'Data tidak ditemukan'], $rescode);
            }

            $masterhead->update(['deleted_by' => Auth::id()]);
            $masterhead->delete();

            return response()->json(['success' => 1, 'messages' => 'Success Delete Data'], $rescode);
        } catch (Exception $e) {
            Log::error('Exception: ' . $e);
            return response()->json(['success' => 0, 'messages' => 'Ops terjadi kesalahan pada server'], $rescode);
        }
    }
}
