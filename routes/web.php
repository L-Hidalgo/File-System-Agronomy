<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('loginwle');



Route::get('/home', 'HomeController@index')->name('home');
Route::post('login', 'LoginController@login')->name('login');
Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', 'MainController@logout');
    Route::get('addcategory','MainController@category')->name('admin.category');
    Route::get('adduserform','MainController@adduserform');
    Route::get('addcategoryform','MainController@addcategory');
    Route::post('categoriasave','MainController@categoriasave');
    Route::get('documentos','MainController@documentos')->name('admin.documento');
    Route::post('add_temp','MainController@addtemp');
    Route::get('deletefindtempfile','MainController@deletefindtempfile');
    Route::get('addfilesdata','MainController@addfilesdata')->name('addfilecom');
    Route::post('savefiles','MainController@savefiles')->name('crear.documento.file');
    Route::get('addfilesdatacam','MainController@addfilesdatacam')->name('addfilesdatacam');
    Route::post('savefilescam','MainController@savefilescam')->name('crear.documento.filecam');
    Route::get('userlist','MainController@userlist')->name('user.list.add');
    Route::post('saveuser','MainController@saveuser');
    ROute::get('viewdataDoc/{id}','MainController@viewdataDoc');
    Route::get('viewarchivo','MainController@viewarchivo')->name('admin.viewarchivo');
    Route::get('viewarchivopng','MainController@viewarchivopng');
    Route::get('backups','MainController@viewbackup')->name('admin.backups');
    Route::get('bandejaentrada','MainController@bandejaentrada')->name('bandeja.entrada');
    Route::get('bandejasalida','MainController@bandejasalida')->name('bandeja.salida');
    Route::get('seguimiento','MainController@seguimiento')->name('documento.seguimiento');
    Route::get('shareddoc/{id}','MainController@shareddoc');
    Route::post('sendcorreo','MainController@senddatos')->name('send.correo.admin');
    Route::get('infodoc/{id}','MainController@infodocu');
    Route::get('addseg/{id}','MainController@addseg');
    Route::post('addseguimiento','MainController@addseguimiento')->name('send.seguimiento.initial');
    Route::get('showseg/{id}','MainController@showseg');
    ROute::get('download/{id}','MainController@dowloadsever')->name('dato.bajar');
    Route::get('rport1','MainController@rport1')->name('admin.rpt.uno');
    Route::get('rport2','MainController@rport2')->name('admin.rpt.dos');
    Route::get('rport3','MainController@rport3')->name('admin.rpt.tres');
    Route::get('editcat/{id}','MainController@editcat');
    Route::get('profile','MainController@profile')->name('admin.profile');
    Route::post('categoriaedit','MainController@categoriaedit');
    Route::get('editusr/{id}','MainController@editusr');
    Route::post('edithdatauser','MainController@edithdatauser');
    Route::post('editrolus','MainController@editrolus');
    Route::get('userrol/{id}','MainController@userrol');
    Route::get('userdestroy/{us}','MainController@destroy')->name('admin.users.destroy');
    Route::post('updateprofile','MainController@updateprofile');
    ///reportes
    Route::get('rpt1pdf/{fi}/{ff}/{tipo}/{us}','MainController@rpt1pdf')->name('rpt.admin.pdf.one');
    Route::get('rpt2pdf/{fi}/{ff}/{rol}','MainController@rpt2pdf');
    Route::get('rpt3pdf/{fi}/{ff}','MainController@rpt3pdf');
    //excel
    Route::get('rpt1excel/{fi}/{ff}/{tipo}/{us}','MainController@rpt1excel')->name('rpt.admin.pdf.one');
    Route::get('rpt2excel/{fi}/{ff}/{rol}','MainController@rpt2excel');
    Route::get('rpt3excel/{fi}/{ff}','MainController@rpt3excel');
    //buscar
    Route::post('searchdatainput','MainController@search',)->name('admin.documento.search');
    Route::post('searchdatainputseg','MainController@searchdatainputseg',)->name('admin.documento.searchseg');
    //asistido
    Route::get('asistido','MainController@asistido');
    Route::get('documentoshow','MainController@documentshow')->name('admin.asis.document');
    Route::get('documentoshowfile','MainController@documentshowfile')->name('admin.asiscam.document');
    Route::get('Apiselectestudent','MainController@Apiselectestudent');
    Route::get('reportedocexclude','MainController@reportedocexclude')->name('admin.rpt.exclude');
    Route::get('reportedocexcludeprivate','MainController@reportedocexcludeprivate')->name('admin.rpt.excludeprivate');
    Route::post('searchdatainputreport','MainController@searchdatainputreport');
});