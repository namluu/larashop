<?php
namespace App\Http\Services;

class UploadService
{
    public function store($request)
    {
        if ($request->hasFile('file_upload')) {
            try {
                $fileUpload = $request->file('file_upload');
                $name = $fileUpload->getClientOriginalName();
                $path = 'uploads/'.date('Y/m/d');
                $fileUpload->storeAs('public/'.$path, $name);
                return '/storage/'.$path.'/'.$name;
            } catch (\Exception $error) {
                return false;
            }
        }
        return false;
    }
}
