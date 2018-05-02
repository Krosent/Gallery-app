<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\member;
use App\family;
use App\ancestor;
use Image;
use Illuminate\Support\Facades\Input;

class ManageController extends Controller
{
    public function index($id) {
        $family = family::find($id);
        $father_members = member::where(['ancestor_id' => $family->father_id])->orderBy('number', 'asc')->get();
        $mother_members = member::where(['ancestor_id' => $family->mother_id])->orderBy('number', 'asc')->get();

        return view('manage', compact(['family', 'father_members', 'mother_members']));
    }

    public function addMember(Request $req) {
        member::create(['number' => $req->number, 'family_id' => $req->family_id, 'nick' => $req->nick, 'name' => $req->name, 'image_id' => 1, 
                        'ancestor_id' => $req->parentSelect]);
        return back();
    }

    public function editHeader(Request $req) {
        $family = family::find($req->family_id);
        $father_name = $req->father_name;
        $mother_name = $req->mother_name;
        ancestor::where(['id' => $family->father_id])->update(['family_name' => $father_name]);
        ancestor::where(['id' => $family->mother_id])->update(['family_name' => $mother_name]);
        $family->update(['id' => $req->family_code]);
       
        return redirect('/manage/' . $req->family_code);
        
    }

    public function editMember(Request $req) {
        $number = $req->number;
        $name = $req->name;
        $nick = $req->nick;
        $member_id = $req->member_id;
        member::find($member_id)->update(['number' => $number, 'name' => $name, 'nick' => $nick]);
        return redirect('/manage/' . $req->family_code);

    }

    public function uploadImage(Request $req) {
        // $validate = $req->validate([
        //     'image_url' => 'required|mimes:jpeg,png,bmp,tiff|max:4096',
        // ]);
        //dd($req->image_url);
        //dd(Input::all());
       // dd($req->input('member_id'));
        $fileName = uniqid('profile_img_') . '.jpg';
        Image::make(Input::file('image_url'))->fit(500)->save('images/profile_images/' . $fileName);
        $image = \App\image::create(['url' => '/images/profile_images/' . $fileName]);
        member::find($req->member_id)->update(['image_id' => $image->id]);
        return redirect('/manage/' . $req->family_code);
    }


    public function removeImage(Request $req) {
        member::find($req->member_id)->update(['image_id' => 1]);

        return redirect('/manage/' . $req->family_code);
    }

    public function removeMember(Request $req, $id) {
        member::find($id)->delete();
        return back();
    }
}
