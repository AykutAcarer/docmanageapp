<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Unterlage;
use App\Models\Mainfolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainfolderController extends Controller
{
    //Show Page of every main Folder
    public function show(Mainfolder $mainfolder)
    {


        // dd(
        //     'folders.show',
        //     [
        //         'mainfolder' => $mainfolder,
        //         'folders' => $mainfolder->folder()->get(),
        //         'unterlagen' => Unterlage::with('folder')->get()

        //     ]
        // );

        return view(
            'folders.show',
            [
                'mainfolder' => $mainfolder,
                'folders' => $mainfolder->folder()->get(),
                'unterlagen' => Unterlage::with('folder')->get(),
                'main' => auth()->user()->mainfolders()->get()
            ]
        );
    }


    //Store new main Folder
    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'main_folder_name' => 'required'
        ]);

        $formFields['user_id_fk'] = auth()->id();

        Mainfolder::create($formFields);
        return redirect('/home');
    }

    //Show Pop up for rename thema
    public function popup_mainThema_edit(Mainfolder $mainfolder)
    {
        // dd('folders.popup_mainthema_edit', [
        //     'mainfolder' => $mainfolder
        // ]);

        return view('folders.popup_mainthema_edit', [
            'mainfolder' => $mainfolder
        ]);
    }

    //Update rename thema
    public function update(Request $request, Mainfolder $mainfolder)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'main_folder_name' => 'required',
            'id' => 'required'
        ]);

        $mainfolder->update($formFields);

        return redirect('/folders/' . $mainfolder->id . '');
    }

    //Delete Main Thema
    public function destroy(Mainfolder $mainfolder)
    {
        // dd($mainfolder);
        $mainfolder->delete();

        return redirect('/home');
    }


    // Show Pop up for new thema
    public function popupNewMainThema(Mainfolder $mainfolder)
    {
        // dd('folders.popup_new_thema', [
        //     'mainfolder' => $mainfolder
        // ]);

        return view('folders.popup_new_thema', [
            'mainfolder' => $mainfolder
        ]);
    }
}
