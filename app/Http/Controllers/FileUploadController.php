<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
        $request->validate([
            'namaBaruFile' => 'required',
            'berkas' => 'required|file|image|max:5000',]);
            //$path = $request->berkas->store('uploads');
            $extfile = $request->berkas->getClientOriginalExtension();
            $namaFile = $request->namaBaruFile.".".$extfile;

            $path = $request->berkas->storeAs('uploads', $namaFile);

            echo "Gambar Berhasil Diupload <a href='storage/$path'>$namaFile</a>";
            echo "<br><br>";
            echo "<img src='storage/$path' width='750px'>";
        //echo $request->berkas->getClientOriginalName()."Lolos Validasi";
        // dump($request->berkas);
        // //return "Pemrosesan File Upload Disini";
        // if($request->hasFile('berkas')){
        //     echo "path(): ".$request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): ".$request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): ".$request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType(): ".$request->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName(): ".$request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): ".$request->berkas->getSize();
        // } else {
        //     echo "Tidak Ada Berkas yang Diupload";
        // }
    }
}
