<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    public function switch(Request $request, string $locale): RedirectResponse
    {
        $supported = array_keys(config('app.supported_locales', []));

        if (!in_array($locale, $supported, true)) {
            abort(404);
        }

        $request->session()->put('locale', $locale);

        $cookie = Cookie::make('site_locale', $locale, 60 * 24 * 365, '/', null, false, false);

        return redirect()->back()->withCookie($cookie);
    }
}
