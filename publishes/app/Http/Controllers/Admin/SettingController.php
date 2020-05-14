<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use App\SettingValue;

class SettingController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth']);
	}

	public function index()
	{
		$this->authorize('access', 'settings');
		
    	$breadcrumb = [
    		'Pengaturan' => ''
    	];

    	$settings = Setting::orderBy('position', 'asc')->get();

		return view('admin.settings.index', compact('breadcrumb', 'settings'));
	}

	public function edit(Setting $setting)
	{
		$this->authorize('access', 'settings');

    	$breadcrumb = [
    		'Pengaturan' => route('settings.index'),
    		'Pengaturan ' . $setting->name => ''
    	];

		return view('admin.settings.edit', compact('breadcrumb', 'setting'));
	}

	public function update(Request $request, Setting $setting)
	{
		$this->authorize('access', 'settings');

		$setting_values = $setting->setting_values;
		$validations = [];

		foreach ($setting_values as $setting_value) {
			$extra = json_decode($setting_value->extra, true);

			$validations[$setting_value->form_name] = $extra['validation'];
		}

		$values = $request->validate($validations);

		foreach ($values as $form_name => $value) {
			SettingValue::where('form_name', $form_name)->update(['value' => $value]);
		}

		return redirect()->route('settings.edit', ['setting' => $setting]);
	}
}
