<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //Show POPUP Page for upload Document
    public function popup_upload(Folder $folder)
    {
        return view('folders.popup_upload_document', [
            'folder' => $folder
        ]);
    }

    // Store upload document
    public function popup_upload_store(Request $request, Folder $folder)
    {

        // dd($request->all());

        $formFields = $request->validate([
            'file_name' => 'required|mimes:csv,txt,xlx,xls,pdf,ppt',
            'unterlagen_folders_id_fk' => 'required'
        ]);

        $formFields['user_id_fk'] = auth()->id();
        $formFields['file_name'] = $request->file('file_name')->getClientOriginalName();
        //Hash File Name
        $formFields['file_name_hash'] = bcrypt($formFields['file_name']);
        $formFields['file_path'] = $request->file('file_name')->storeAs('uploads', $formFields['file_name'], 'public');
        $formFields['file_typ'] = $request->file('file_name')->getMimeType();
        $formFields['file_size'] = $request->file('file_name')->getSize();

        Upload::create($formFields);
        return redirect('/folders/sub-folder/' . $folder->id . '');
    }

    //Uploaded Document Download
    public function download(Upload $upload)
    {
        $file_path = 'public/' . $upload->file_path . '';

        return Storage::download($file_path);
    }
}
