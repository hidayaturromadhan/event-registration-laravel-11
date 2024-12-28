<?php

namespace App\Http\Controllers;
use App\Models\Event;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');
        return view('pages.admin.event.index', compact('events'));
    }

    public function create()
    {
        $events = Event::all();
        return view('pages.admin.event.create', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_event' => 'required|string|max:50',
            'deskripsi' => 'required|string|max:200',
            'tanggal_event' => 'nullable|date_format:Y-m-d',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        // Simpan gambar jika di-upload
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
        } else {
            // Jika gambar tidak di-upload, pakai gambar lama
            $imageName = $events->gambar;
        }

        $events = Event::create([
            'nama_event' => $request->nama_event,
            'deskripsi' => $request->deskripsi,
            'tanggal_event' => $request->tanggal_event,
            'gambar' => $imageName,
        ]);

        if ($events) {
            Alert::success('Berhasil!', 'Event berhasil ditambahkan!');
            return redirect()->route('admin.event.index');
        } else {
            Alert::error('Gagal!', 'Event gagal ditambahkan!');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $events = Event::findOrFail($id);
        return view('pages.admin.event.edit', compact('events'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_event' => 'required|string|max:50',
            'deskripsi' => 'required|string|max:100',
            'tanggal_event' => 'nullable|date_format:Y-m-d',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        $events = Event::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $oldPath = public_path('images/' . $events->gambar);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $gambar = $request->file('gambar');
            $imageName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('images/', $imageName);
        } else {
            $imageName = $events->gambar;
        }

        $events->update([
            'nama_event' => $request->nama_event,
            'deskripsi' => $request->deskripsi,
            'tanggal_event' => $request->tanggal_event,
            'gambar' => $imageName,
        ]);

        if ($events) {
            Alert::success('Berhasil!', 'Event berhasil diperbarui');
            return redirect()->route('admin.event.index');
        } else {
            Alert::error('Gagal!', 'Event gagal diperbarui');
            return redirect()->back();        
        }
    }

    public function delete($id)
    {
        $events = Event::findOrFail($id);
        $events->delete();
        if ($events) {
            Alert::success('Berhasil!', 'Event berhasil dihapus');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Event gagal dihapus');
            return redirect()->back();
        }
    }
}
