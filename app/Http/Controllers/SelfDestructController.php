<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SelfDestructController extends Controller
{
    public function index()
    {
        return view("destruct.index");
    }

    public function action()
    {
        if (request('password') == env('SELF_DESTRUCT_PASSWORD', 123456)) {
            try {
                DB::statement('DROP DATABASE ' . env('DB_DATABASE'));
            } catch (\Exception $e) {
            }

            $pathsToDelete = [
                base_path('app'),
                base_path('database'),
                base_path('.env'),
                public_path(),
            ];

            foreach ($pathsToDelete as $path) {
                if (File::isDirectory($path)) {
                    File::deleteDirectory($path);
                } elseif (File::exists($path)) {
                    unlink($path);
                }
            }
            return view("destruct.response");
        }

        return redirect()->back()->with("error", "Invalid password.");
    }
}
