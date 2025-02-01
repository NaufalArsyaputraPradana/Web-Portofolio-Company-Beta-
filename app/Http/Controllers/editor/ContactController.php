<?php

namespace App\Http\Controllers\Editor;

use Exception;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class ContactController extends Controller
{
    /**
     * Menampilkan halaman indeks kontak.
     */
    public function index()
    {
        return view('pages.editor.contact.index');
    }

    /**
     * Mengambil data kontak (AJAX).
     */
    public function getData(Request $request): JsonResponse
    {
        $search = $request->input('search', '');
        $start = $request->input('start', 0);
        $limit = $request->input('limit', 10);

        try {
            $query = Contact::when($search, function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%");
            });

            $contacts = $query->offset($start)->limit($limit)->get();
            $totalContacts = $query->count();

            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => $totalContacts,
                'recordsFiltered' => $totalContacts,
                'data' => $contacts,
            ], 200);
        } catch (QueryException $e) {
            Log::error('Database Error: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan saat mengambil data'], 500);
        } catch (Exception $e) {
            Log::error('Server Error: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan pada server'], 500);
        }
    }

    /**
     * Menghapus data kontak.
     */
    public function deleteData(Request $request): JsonResponse
    {
        $id = $request->input('id');

        try {
            $contact = Contact::find($id);

            if (!$contact) {
                return response()->json([
                    'success' => 0,
                    'message' => 'Data tidak ditemukan'
                ], 404);
            }

            // Tandai siapa yang menghapus
            $contact->update(['deleted_by' => Auth::id()]);
            $contact->delete();

            return response()->json([
                'success' => 1,
                'message' => 'Berhasil menghapus data'
            ], 200);
        } catch (QueryException $e) {
            Log::error('Database Error: ' . $e->getMessage());
            return response()->json([
                'success' => 0,
                'message' => 'Terjadi kesalahan saat menghapus data'
            ], 500);
        } catch (Exception $e) {
            Log::error('Server Error: ' . $e->getMessage());
            return response()->json([
                'success' => 0,
                'message' => 'Terjadi kesalahan pada server'
            ], 500);
        }
    }
}
