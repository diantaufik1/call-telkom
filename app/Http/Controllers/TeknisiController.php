<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teknisi;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class TeknisiController extends Controller
{
    //
    public function allteknisi()
    {
        $teknisies = DB::table('teknisis')->latest()->paginate(20);
        return view('teknisi.index', compact('teknisies'));
    }
    public function addTeknisi(Request $request)
    {
        $validatedData = $request->validate(
            [
                'id_telegram' => 'required',
                'name_teknisi' => 'required'
            ],
            [
                'id_telegram.required' => 'Please Input ID Telegram',
                'name_teknisi.required' => 'Please Input Name Teknisi',
            ]
        );
        teknisi::insert([
            'id_telegram' => $request->id_telegram,
            'name_teknisi' => $request->name_teknisi
        ]);
        return Redirect()->back()->with('Success', 'Data inserted successfully');
    }
    public function editTeknisi($id)
    {
        $teknisis = teknisi::find($id);
        return view('teknisi.edit', compact('teknisis'));

        // $row = DB::table('teknisis')
        //     ->where('id', $id)
        //     ->first();
        // $data = [
        //     'info' => $row,
        //     'Title' => 'Edit',
        // ];
        // return view('teknisi.edit', $data);
    }

    public function updateTeknisi(Request $request, $id)
    {
        $update = teknisi::find($id)->update([
            'id_telegram' => $request->id_telegram,
            'name_teknisi' => $request->name_teknisi,
        ]);
        return Redirect()->route('all.teknisi')->with('Success', 'Data updated successfully');
    }

    public function delete($id)
    {
        $delete = DB::table('teknisis')
            ->where('id', $id)
            ->delete();

        return redirect('teknisi/all')->with('Success', 'Delete Data Successfull');
        // return redirect('dashboard');
    }
}
