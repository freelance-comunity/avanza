<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Image;
use App\Models\Client;
use App\Models\Clientdocuments;

class PhotoController extends Controller
{
	public function update(Request $request)
	{ 
		$id = $request->input('client_id');
		$client = Client::find($id);
		if ($request->hasFile('avatar')) {
			$avatar = $request->file('avatar');
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
			$client->avatar = $filename;
			$client->save();
		}
		return view('clients.show')
		->with('client', $client);
	}

	public function ine(Request $request)
	{ 
		$id = $request->input('document_id');
		$document = Clientdocuments::find($id);
		if ($request->hasFile('ine')) {
			$ine = $request->file('ine');
			$filename = time() . '.' . $ine->getClientOriginalExtension();
			Image::make($ine)->resize(300, 300)->save(public_path('/uploads/documents/' . $filename));
			$document->ine = $filename;
			$document->save();
		}
		return view('clientdocuments.ine')
		->with('document', $document);
	}

	public function curps(Request $request)
	{ 
		$id = $request->input('document_id');
		$document = Clientdocuments::find($id);
		if ($request->hasFile('curp')) {
			$curp = $request->file('curp');
			$filename = time() . '.' . $curp->getClientOriginalExtension();
			Image::make($curp)->resize(300, 300)->save(public_path('/uploads/documents/' . $filename));
			$document->curp = $filename;
			$document->save();
		}
		return view('clientdocuments.curps')
		->with('document', $document);
	}

	public function cfe(Request $request)
	{ 
		$id = $request->input('document_id');
		$document = Clientdocuments::find($id);
		if ($request->hasFile('proof_of_addres')) {
			$proof_of_addres = $request->file('proof_of_addres');
			$filename = time() . '.' . $proof_of_addres->getClientOriginalExtension();
			Image::make($proof_of_addres)->resize(300, 300)->save(public_path('/uploads/documents/' . $filename));
			$document->proof_of_addres = $filename;
			$document->save();
		}
		return view('clientdocuments.uploads')
		->with('document', $document);
	}
}
