<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Verileri_Atma;
use App\Http\Controllers\WebScrapping;


Route::get('/', [WebScrapping::class,'Verileri_Cekme'])->name('Anasayfa');
Route::get('/Özellik', [WebScrapping::class,'Ozellik'])->name('İcerik');

