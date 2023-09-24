<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreateRequest;
use App\Http\Requests\StoreUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class StoreController extends Controller
{
  /**
   * Display the user's profile form.
   */
  public function index(Request $request): View {
    return view('stores.index', [
      'user' => $request->user(),
		]);
  }
	
	public function edit(Request $request): View {
		return view('stores.edit', [
			'user' => $request->user(),
			'store' => $request->user()->stores()->where('id',$request->id)->first(),
		]);
	}

	public function update(StoreUpdateRequest $request): RedirectResponse {
		$store = $request->user()->store($request->id);
		$store->fill($request->validated());
		$store->save();
		return Redirect::route('stores.edit', $request->id)->with('status', 'store-updated');
	}

	public function add(Request $request): View {
		return view('stores.add', [
      'user' => $request->user(),
		]);
	}

	public function create(StoreCreateRequest $request): RedirectResponse {
		$store = new Store([
			'user_id' => Auth::user()->id,
			...$request->validated()
		]);

		$store->save();
		return Redirect::route('stores')->with('status', 'store-created');
	}
}
