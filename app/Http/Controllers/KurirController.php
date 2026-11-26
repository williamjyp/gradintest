<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courier;use Illuminate\View\View;

class KurirController extends Controller
{
    public function index(): View{
        $showget = null;
        $courier = Courier::get();
        return view('welcome', ['kurirs'=>$courier, 'showget' => $showget]);   
    }

    public function show(Request $request) {
        $showget = Courier::where('id',$request->id)->first();
        $courier = Courier::get();
        return view('welcome', ['kurirs'=>$courier, 'showget'=>$showget]);
        
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama_kurir' => ['required', 'string'],
            'level_kurir' => ['required', 'integer'],
            'alamat_kurir' => ['required', 'string'],
            'email_kurir' => ['required', 'string'],
            'no_telp_kurir' => ['required', 'string'],
        ]);

        Courier::create([
            'nama_kurir' =>  $validated['nama_kurir'],
            'level_kurir' => (int) $validated['level_kurir'],
            'alamat_kurir' => $validated['alamat_kurir'],
            'email_kurir' => $validated['email_kurir'],
            'no_telp_kurir' => $validated['no_telp_kurir']
        ]);

         return redirect()
            ->route('index')
            ->with('success', 'Kurir berhasil ditambahkan.');
    }
    public function update(Request $request){
        $validated = $request->validate([
            'nama_kurir' => ['required', 'string'],
            'level_kurir' => ['required', 'integer'],
            'alamat_kurir' => ['required', 'string'],
            'email_kurir' => ['required', 'string'],
            'no_telp_kurir' => ['required', 'string'],
        ]);

        Courier::where('id',$request->id)->update([
            'nama_kurir' =>  $validated['nama_kurir'],
            'level_kurir' => (int) $validated['level_kurir'],
            'alamat_kurir' => $validated['alamat_kurir'],
            'email_kurir' => $validated['email_kurir'],
            'no_telp_kurir' => $validated['no_telp_kurir']
        ]);

         return redirect()
            ->route('index')
            ->with('success', 'Kurir berhasil diedit.');
    }
    public function destroy(Courier $kurir){
        $kurir->delete();
    }
}
