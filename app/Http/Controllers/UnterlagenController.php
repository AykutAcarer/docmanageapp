<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Folder;
use App\Models\Unterlage;
use App\Models\Mainfolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UnterlagenController extends Controller
{
    //Index
    public function index()
    {
        return view('unterlagen.index');
    }

    //Show all Unterlagen
    public function home()
    {

        // dd(
        //     'unterlagen.home',
        //     // [
        //     //     // 'main' => Mainfolder::all(),
        //     //     // 'u' => Mainfolder::with('folder')->get()

        //     // ],

        //     [
        //         // 'unterlagen_liste' => $unterlagen
        //         // 'unterlagen' => Unterlage::with('folder')->get()
        //         'unterlagen' => auth()->user()->unterlage()->get(),
        //         'users' => User::all(),



        //     ]
        // );

        return view(
            'unterlagen.home',


            [
                // 'main' => Mainfolder::all(),
                // 'main' => auth()->user()->mainfolders()->get(),
                'folders' => Folder::all(),
                'mainfolders' => Mainfolder::all()

            ],

            [
                // 'unterlagen_liste' => $unterlagen
                // 'unterlagen' => Unterlage::with('folder')->get()
                'unterlagen' => auth()->user()->unterlage()->get(),
                'uploads' => auth()->user()->upload()->get(),
                'users' => User::all()


            ]
        );
    }



    //Show single Unterlage
    public function show(Unterlage $unterlage)
    {
        return view('unterlagen.show', [
            'unterlage' => $unterlage
        ]);
    }

    //Show create form for new Document
    public function create()
    {
        // dd(['mainfolder' => Folder::with('mainfolder')->get()]);
        return view(
            'unterlagen.create',
            ['mainfolder' => Folder::with('mainfolder')]

        );
    }

    //Store new Document
    // public function store(Request $request)
    // {
    //     dd($request->all());
    //     $formFields = $request->validate([
    //         'unterlagen_name' => 'required',
    //         'unterlagen_folders_id_fk' => 'required'

    //     ]);

    //     $formFields['user_id_fk'] = auth()->id();

    //     Unterlage::create($formFields);
    //     return redirect('/home');
    // }

    //Delete Document
    public function destroy(Unterlage $unterlage)
    {
        $unterlage->delete();
        return redirect('/folders/sub-folder/' . $unterlage->unterlagen_folders_id_fk . '');
    }

    //Show page for edit document_name
    public function popup_document_edit(Unterlage $unterlage)
    {
        return view('unterlagen.popup_doc_edit', [
            'unterlage' => $unterlage
        ]);
    }

    //Edit Document
    public function update(Request $request, Unterlage $unterlage)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'unterlagen_name' => 'required',
            'unterlagen_folders_id_fk' => 'required'

        ]);

        $unterlage->update($formFields);

        return redirect('/unterlagen/' . $unterlage->id . '');
    }
}
