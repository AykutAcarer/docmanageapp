<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Unterlage;
use App\Models\Mainfolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FolderController extends Controller
{
    //Ana Themanin altinda ilk alt klasörleri olusturmak icin
    public function store(Request $request, Mainfolder $mainfolder)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'folder_name' => 'required',
            'main_folder_id_fk' => 'required'
            // 'folder_vater_id_fk' => 'required'
        ]);

        Folder::create($formFields);
        return redirect('/folders/' . $mainfolder->id . '');
    }


    // Ilk Alt klsörlerin altinda birbiri icerisinde alt klasörler olusturmak icin 
    public function storeSubfolder(Request $request, Folder $folder)
    {

        // dd($request->all());
        $formFields = $request->validate([
            'folder_name' => 'required',
            'main_folder_id_fk' => 'required',
            'folder_vater_id_fk' => 'required'
        ]);

        Folder::create($formFields);
        return redirect('/folders/sub-folder/' . $folder->id . '');
    }

    // Ilk Alt klsörlerin altinda document olusturmak icin 
    public function storeSubDocument(Request $request, Folder $folder)
    {

        // dd($request->all());

        $formFields = $request->validate([
            'unterlagen_name' => 'required',
            'unterlagen_folders_id_fk' => 'required',
        ]);
        $formFields['user_id_fk'] = auth()->id();
        Unterlage::create($formFields);
        return redirect('/folders/sub-folder/' . $folder->id . '');
    }

    public function show(Folder $folder)
    {
        $id = $folder['id'];

        $subfolders = DB::table('folders')
            ->where('folder_vater_id_fk', '=', $id);

        // dd('folders.showFolders', [
        //     'folder' => $folder,
        //     'unterlagen' => $folder->unterlagen()->get(),
        //     'subfolders' => $subfolders->get()

        // ]);

        return view('folders.showFolders', [
            'folder' => $folder,
            'unterlagen' => $folder->unterlagen()->get(),
            'uploads' => $folder->upload()->get(),
            'subfolders' => $subfolders->get(),
            'main' => auth()->user()->mainfolders()->get()
        ]);
    }

    //Delete Sub-Folders
    public function destroy(Folder $folder)
    {
        // dd($folder);
        $folder->delete();
        if ($folder->folder_vater_id_fk > 10000) {
            return redirect('/folders/sub-folder/' . $folder->folder_vater_id_fk . '');
        } else {
            return redirect('/folders/' . $folder->main_folder_id_fk . '');
        }
    }


    //Show Pop up for rename folder
    public function popup_edit(Folder $folder)
    {
        // dd('folders.popup_edit', [
        //     'folder' => $folder
        // ]);

        return view('folders.popup_edit_update', [
            'folder' => $folder
        ]);
    }

    //Update folder
    public function update(Request $request, Folder $folder)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'folder_name' => 'required',
            'id' => 'required'
        ]);

        $folder->update($formFields);

        return redirect('/folders/sub-folder/' . $folder->id . '');
    }

    //Show Pop up for new folder
    public function popupNewFolder(Folder $folder)
    {
        // dd('folders.popup_new_folder', [
        //     'folder' => $folder
        // ]);

        return view('folders.popup_new_folder', [
            'folder' => $folder
        ]);
    }


    //Show Pop up for new Document
    public function popupNewDocument(Folder $folder)
    {
        // dd('folders.popup_new_document', [
        //     'folder' => $folder
        // ]);

        return view('folders.popup_new_document', [
            'folder' => $folder
        ]);
    }

    //Show Pop up for new Sub-folder
    public function popupNewSubFolder(Mainfolder $mainfolder)
    {
        // dd('folders.popup_new_subfolder', [
        //     'mainfolder' => $mainfolder
        // ]);

        return view('folders.popup_new_subfolder', [
            'mainfolder' => $mainfolder
        ]);
    }
}
