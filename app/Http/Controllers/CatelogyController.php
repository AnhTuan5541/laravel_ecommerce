<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catelogy;

class CatelogyController extends Controller
{

    public function getCatelogy(){
        $catelogy = Catelogy::paginate(10);
        return view('admin.catelogy.listCatelogy',['catelogy'=>$catelogy]);
    }

    public function addCatelogy(Request $req){
        if($req->isMethod('post')){
            $this->validate($req,
                [
                    'name'=>'min:1|max:100|unique:catelogies,name',
                ],
                [
                    'name.min'=>'Catelogy name must among 1 to 100 character',
                    'name.max'=>'Catelogy name must among 1 to 100 character',
                    'name.unique'=>'Catelogy already exists'
                ]);
            $catelogy = new Catelogy;
            $catelogy->name = $req->name;
            $catelogy->slug_name = str_slug($req->name, '-');
            $catelogy->save();
            return redirect()->back()->with('success_messenger','Add new Catelogy successfully');
        }
        else{
            return view('admin.catelogy.addCatelogy');
        }
    }

    public function editCatelogy(Request $req, $id){
        $catelogy = Catelogy::find($id);
        if($req->isMethod('post')){
            $this->validate($req,
                [
                    'name'=>'min:1|max:100|unique:catelogies,name',
                ],
                [
                    'name.min'=>'Catelogy name must among 1 to 100 character',
                    'name.max'=>'Catelogy name must among 1 to 100 character',
                    'name.unique'=>'Catelogy already exists'
                ]);
            $catelogy->name = $req->name;
            $catelogy->slug_name = str_slug($req->name, '-');            
            $catelogy->save();
            return redirect()->back()->with('success_messenger','Edit Catelogy successfully');
        }
        else{
            return view('admin.catelogy.editCatelogy',['catelogy'=>$catelogy]);
        }
    }

    public function deleteCatelogy($id){
        $catelogy = Catelogy::find($id);
        if(count($catelogy->type) != 0){
            return redirect()->back()->with('error_messenger','Cannot delete this catelogy because is contains type');
        }
        $catelogy->delete();
        return redirect()->back()->with('success_messenger','Delete catelogy successfully');
    }
}
