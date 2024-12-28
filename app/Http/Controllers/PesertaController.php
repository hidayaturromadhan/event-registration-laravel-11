<?php

namespace App\Http\Controllers;
use App\Models\Peserta;
use App\Models\Event;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pesertas = DB::table('pesertas')
            ->join('events', 'pesertas.event_id', '=', 'events.id')
            ->select('pesertas.*', 'events.nama_event')
            ->when($search, function ($query, $search) {
                return $query->where('pesertas.nama_peserta', 'like', "%{$search}%");
            })
            ->get();
        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');
        return view('pages.admin.peserta.index', compact('pesertas', 'search'));
    }
    

    public function create()
    {
        $events = Event::all();
        return view('pages.admin.peserta.create', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'nama_peserta' => 'required|string|max:50',
            'email' => 'required|string|max:50',
        ]);
        

        $pesertas = Peserta::create([
            'event_id' => $request->event_id,
            'nama_peserta' => $request->nama_peserta,
            'email' => $request->email,
        ]);

        if ($pesertas) {
            Alert::success('Berhasil!', 'Peserta berhasil ditambahkan!');
            return redirect()->route('admin.peserta.index');
        } else {
            Alert::error('Gagal!', 'Peserta gagal ditambahkan!');
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $pesertas = Peserta::findOrFail($id);
        $events = Event::all();
        return view('pages.admin.peserta.edit', compact('pesertas', 'events'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'event_id' => 'required|exists:events,id',
            'nama_peserta' => 'required|string|max:50',
            'email' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        $pesertas = Peserta::findOrFail($id);

        $pesertas->update([
            'event_id' => $request->event_id,
            'nama_peserta' => $request->nama_peserta,
            'email' => $request->email,
        ]);

        if ($pesertas) {
            Alert::success('Berhasil!', 'peserta berhasil diperbarui');
            return redirect()->route('admin.peserta.index');
        } else {
            Alert::error('Gagal!', 'peserta gagal diperbarui');
            return redirect()->back();        
        }
    }

    public function delete($id)
    {
        $pesertas = Peserta::findOrFail($id);
        $pesertas->delete();
        if ($pesertas) {
            Alert::success('Berhasil!', 'Peserta berhasil dihapus');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Peserta gagal dihapus');
            return redirect()->back();
        }
    }
}
