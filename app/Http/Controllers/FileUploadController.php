<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        $breadcrumb = (object)[
            'title' => 'File Upload',
            'list' => ['Home', 'File Upload']
        ];

        $page = (object) [
            'title' => 'Gunakan Untuk Mengupload File Gambar'
        ];

        $activeMenu = 'fileUpload';


        return view('file-upload', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
        ]);
    }

    public function prosesFileUpload(Request $request)
    {

        $request->validate([
            'namaBaruFile' => 'required',
            'berkas' => 'required|file|image|max:5000',
        ]);

            $extfile = $request->berkas->getClientOriginalExtension();
            $namaFile = $request->namaBaruFile.".".$extfile;
            $path = $request->berkas->storeAs('uploads', $namaFile);

            $breadcrumb = (object)[
                'title' => 'File Gambar Preview',
                'list' => ['Home', 'File Preview']
            ];
    
            $page = (object) [
                'title' => 'Preview dari Gambar yang Telah Diupload'
            ];
    
            $activeMenu = 'fileUpload';

            return view('file-preview', [
                'namaFile' => $namaFile,
                'path' => $path,
                'breadcrumb' => $breadcrumb,
                'page' => $page,
                'activeMenu' => $activeMenu,
            ]);
    }
}
