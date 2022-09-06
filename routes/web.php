<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\KapitelController;
use App\Http\Controllers\MainfolderController;
use App\Http\Controllers\UnterlagenController;
use App\Http\Controllers\UploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//index
Route::get('/', [UnterlagenController::class, 'index']);

// Home
Route::get('/home', [UnterlagenController::class, 'home'])->middleware('auth');

//Show POPUP page for creating new Thema 
Route::get('/new', [MainfolderController::class, 'popupNewMainThema'])->middleware('auth');

// Store New Main Folder
Route::post('/home', [MainfolderController::class, 'store'])->middleware('auth');

//Show Page folders of every main Folder
Route::get('/folders/{mainfolder}', [MainfolderController::class, 'show'])->middleware('auth');

//Show POPUP Page for rename Thema
Route::get('folders/{mainfolder}/edit', [MainfolderController::class, 'popup_mainThema_edit'])->middleware('auth');

//Update name for sub main thema
Route::put('folders/{mainfolder}/edit', [MainfolderController::class, 'update'])->middleware('auth');

//Delete MainThema
Route::delete('/folders/{mainfolder}', [MainfolderController::class, 'destroy'])->middleware('auth');

//Show POPUP page for creating new Sub-Folder under Main Thema
Route::get('folders/{mainfolder}/new', [FolderController::class, 'popupNewSubFolder'])->middleware('auth');

//Store new Sub-Folder under Main Thema
Route::post('/folders/{mainfolder}', [FolderController::class, 'store'])->middleware('auth');

//Show POPUP page for creating new Sub-Folder
Route::get('folders/sub-folder/{folder}/new/folder', [FolderController::class, 'popupNewFolder'])->middleware('auth');

//Store new Sub-Folder under Subfolders
Route::post('/folders/sub-folder/{folder}/new/folder', [FolderController::class, 'storeSubfolder'])->middleware('auth');

//Show POPUP page for creating new Sub-Folder
Route::get('folders/sub-folder/{folder}/new/document', [FolderController::class, 'popupNewDocument'])->middleware('auth');

// Store new Document under Subfolders 
Route::post('/folders/sub-folder/{folder}', [FolderController::class, 'storeSubDocument'])->middleware('auth');

//Show Page sub-folders of folder under main Folder
Route::get('folders/sub-folder/{folder}', [FolderController::class, 'show'])->middleware('auth');

//Delete Sub-Folders
Route::delete('/folders/sub-folder/{folder}', [FolderController::class, 'destroy'])->middleware('auth');

//Show POPUP Page for rename Folder
Route::get('folders/sub-folder/{folder}/edit', [FolderController::class, 'popup_edit'])->middleware('auth');

//Update name for sub folders
Route::put('folders/sub-folder/{folder}/edit', [FolderController::class, 'update'])->middleware('auth');

//Show POPUP Page for Upload Document
Route::get('folders/sub-folder/{folder}/upload', [UploadController::class, 'popup_upload'])->middleware('auth');

//Store upload Document
Route::post('folders/sub-folder/{folder}/upload', [UploadController::class, 'popup_upload_store'])->middleware('auth');

//Store Download Document
Route::get('get/{upload}/download', [UploadController::class, 'download'])->middleware('auth');

//Show page for creating new Document
Route::get('/unterlagen/create', [UnterlagenController::class, 'create'])->middleware('auth');

// // Store New Document
// Route::post('/unterlagen', [UnterlagenController::class, 'store']);

//Show page for edit document
Route::get('/unterlagen/{unterlage}/edit', [UnterlagenController::class, 'popup_document_edit'])->middleware('auth');

//Edit document name
Route::put('/unterlagen/{unterlage}/edit', [UnterlagenController::class, 'update'])->middleware('auth');

//Delete Document
Route::delete('/unterlagen/{unterlage}', [UnterlagenController::class, 'destroy'])->middleware('auth');

//Show page for Single Kapitel Edit:
Route::get('/unterlagen/kapitels/edit/{kapitel}', [KapitelController::class, 'show'])->middleware('auth');

//Edit Submit to Update
Route::put('/unterlagen/kapitels/{kapitel}', [KapitelController::class, 'update'])->middleware('auth');

//Delete Kapitel
Route::delete('/unterlagen/kapitels/{kapitel}', [KapitelController::class, 'destroy'])->middleware('auth');

//Show page for creating new Kapitel
Route::get('/unterlagen/kapitels/new/{unterlage}', [KapitelController::class, 'create'])->middleware('auth');

// Store New Kapitel
Route::post('/unterlagen/kapitels', [KapitelController::class, 'store'])->middleware('auth');

// All Kapitels of a single Unterlage: 
// Süslü parantez icindeki modelin ismi "unterlage_id" "KapitelController" sinifinda "kapitels" methoduna gidiyor. 
Route::get('/unterlagen/{unterlage}', [KapitelController::class, 'kapitels'])->middleware('auth');

// //Show Registration Page
// Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create new User
Route::post('/users', [UserController::class, 'store']);

//Show Login Page
Route::get('/login', [UserController::class, 'login']);

//Log in User 
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Log user Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
