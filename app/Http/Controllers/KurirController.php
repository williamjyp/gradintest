<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courier;use Illuminate\View\View;

class KurirController extends Controller
{
    public function index(): View{
        $showget = null;
        $editget = null;
        $courier = Courier::orderBy('nama_kurir')->paginate(10);
        return view('welcome', ['kurirs'=>$courier, 'showget' => $showget, 'editget' => $editget]);   
    }

    public function show($id) {
        $showget = Courier::where('id',$id)->first();
        $editget = null;
        $courier = Courier::orderBy('nama_kurir')->paginate(10);
        return view('welcome', ['kurirs'=>$courier, 'showget'=>$showget, 'editget' => $editget]);
    }

    public function editshow($id) {
        $showget = null;
        $editget = Courier::where('id',$id)->first();
        $courier = Courier::orderBy('nama_kurir')->paginate(10);
        return view('welcome', ['kurirs'=>$courier, 'showget'=>$showget, 'editget'=>$editget]);
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
    public function destroy($id){
        Courier::where('id',$id)->delete();

        return redirect()
            ->route('index')
            ->with('success', 'Kurir berhasil dihapus.');
    }

    public function uruttanggal(): View {
        $showget = null;
        $editget = null;
        $courier = Courier::orderBy('created_at')->paginate(10);
        return view('welcome', ['kurirs'=>$courier, 'showget' => $showget, 'editget' => $editget]);   
    }

    public function search(Request $request){
        $showget = null;
        $editget = null;
        $courier = Courier::where('nama_kurir', 'like', "%".$request->nama_kurir."%")->paginate(10);
        return view('welcome', ['kurirs'=>$courier, 'showget' => $showget, 'editget' => $editget]); 
    }
    public function filter(){
        $showget = null;
        $editget = null;
        $courier = Courier::where('level_kurir', 3)->orWhere('level_kurir',2)->paginate(10);
        return view('welcome', ['kurirs'=>$courier, 'showget' => $showget, 'editget' => $editget]); 
    }
}
