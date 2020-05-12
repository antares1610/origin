<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Grafika\Grafika;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth']);
	}

	public function edit(Request $request)
	{
		$breadcrumb = [
			'Profil' 		=> route('profile.my_profile'),
			'Ganti Avatar' 	=> ''
		];

		$user = $request->user();

		return view('user.avatar.edit', compact('breadcrumb', 'user'));
	}

	public function update(Request $request)
	{
		$request->validate([
			'avatar' => ['required', 'file', 'max:5120', 'image']
		]);

		$extension = $request->avatar->extension();

		$path = $request->avatar->storeAs('avatars', $request->user()->id . '.' . $extension, 'public');
		$path = 'storage/' . $path;
		$full_path = asset($path);

		$request->user()->update([
			'avatar' => $full_path
		]);

		$editor = Grafika::createEditor();
		$editor->open($image, $path);
		$editor->resizeFill($image, 256, 256);
		$editor->save($image, $path);

		Storage::disk('public')->delete($path . '.' . $extension);

		return redirect()->back();
	}
}
