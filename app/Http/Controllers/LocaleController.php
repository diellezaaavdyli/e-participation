<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Jenssegers\Date\Date;

/**
 * Class LocaleController.
 */
class LocaleController extends Controller
{
    /**
     * @param $locale
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function change($locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        Date::setLocale($locale);
        return redirect()->back();
    }
}
