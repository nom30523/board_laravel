<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class PostImageSave
{

  public static function fileSave($request) {

    $requestFile = $request->file('img_file')->getClientOriginalName();
    $fileName = date('YmdHis') . Auth::id() . substr($requestFile, strpos($requestFile, '.'));
    $request->img_file->storeAs('public/images', $fileName);
    $img_path  = '/storage/images/' . $fileName;

    return $img_path;
  }

}