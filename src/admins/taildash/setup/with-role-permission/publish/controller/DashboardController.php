<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThemeSettingUpdateRequest;
use DB;

class DashboardController extends Controller
{
    public function dashView()
    {
        return view('backend.pages.dashboard');
    }

    public function themeSettingUpadate(ThemeSettingUpdateRequest $request)
    {
        $data = $request->validated();
        $updated = DB::table('theme_settings')
            ->where('id', 1)
            ->update($data);
        $title = str(array_key_first($data))->headline();
        // dd($data, $updated);
        if ($updated) {
            return response()->json(['msg' => "$title updated  Successfully"], 200);
        } else {
            return response()->json(['msg' => "$title can't be u[dated ", 'error_hint' => 'DashboardController, line 27'], 200);
        }
    }
}
