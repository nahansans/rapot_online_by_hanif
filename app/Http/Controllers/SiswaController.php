<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('level','SISWA')->get();
        return view('backend.siswa.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tgl = \Carbon\Carbon::parse($request->tanggal_lahir)->format('dmY');        
        
        $messages = [
            'required'    => ':attribute harus diisi.',
            'min'    => ':attribute harus lebih dari :min.',
            'size' => 'panjang :attribute harus :size.'
        ];
        $this->validate($request, [
            'name' => 'required|min:3',
            'nis' => 'required|unique:users|size:8',
            'tanggal_lahir' => 'required|min:3',
            'kompetisi_keahlian' => 'required|min:3',
            'rayon' => 'required|min:3',
            'rombel' => 'required|min:3',
            'file_rapot' => 'required|min:3'
        ], $messages);

        $file = $request->file('file_rapot');
        $new_file = $request->nis.'.'.$file->getClientOriginalExtension();
        User::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kompetisi_keahlian' => $request->kompetisi_keahlian,
            'rayon' => $request->rayon,
            'rombel' => $request->rombel,
            'password' => bcrypt($tgl),
            'file_rapot' => 'file/rapot/'.$new_file,
            'level' => 'SISWA'
        ]);
        $file->move('file/rapot', $new_file);
        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('backend.siswa.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $messages = [
            'required'    => ':attribute harus diisi.',
            'min'    => ':attribute harus lebih dari :min.',
            'size' => 'panjang :attribute harus :size.'
        ];

        if ($user->nis === $request->nis) {
            $this->validate($request, [
            'name' => 'required|min:3',
            'tanggal_lahir' => 'required|min:3',
            'kompetisi_keahlian' => 'required|min:3',
            'rayon' => 'required|min:3',
            'rombel' => 'required|min:3'
            ], $messages);
        } else {
            $this->validate($request, [
                'name' => 'required|min:3',
                'nis' => 'required|unique:users|size:8',
                'tanggal_lahir' => 'required|min:3',
                'kompetisi_keahlian' => 'required|min:3',
                'rayon' => 'required|min:3',
                'rombel' => 'required|min:3'
            ], $messages);
        }

        $tgl = \Carbon\Carbon::parse($request->tanggal_lahir)->format('dmY');

        if ($request->file('file_rapot')) {
            File::delete($user->file_rapot);
            $file = $request->file('file_rapot');
            $new_file = $request->nis.'.'.$file->getClientOriginalExtension();
            $file->move('file/rapot', $new_file);
            $user->update([
                'file_rapot' => 'file/rapot/'.$new_file,
            ]);
        }
        $user->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kompetisi_keahlian' => $request->kompetisi_keahlian,
            'rayon' => $request->rayon,
            'rombel' => $request->rombel,
            'password' => bcrypt($tgl),
            'level' => 'SISWA'
        ]);
        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        File::delete($user->file_rapot);
        $user->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
