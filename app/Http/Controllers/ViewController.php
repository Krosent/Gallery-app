<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\family;
use App\member;

class ViewController extends Controller
{
    public function index($id) {
        $family = family::find($id);
        $father_members = member::where(['ancestor_id' => $family->father_id])->orderBy('number', 'asc')->get();
        $mother_members = member::where(['ancestor_id' => $family->mother_id])->orderBy('number', 'asc')->get();

        return view('view', compact(['family', 'father_members', 'mother_members']));
    }

    public function incrementNumber(Request $req, $member_id) {
        $member = member::find($req->member_id);
        $member->update(['number' => $req->member_number + 1]);
        return back();
    }
}
