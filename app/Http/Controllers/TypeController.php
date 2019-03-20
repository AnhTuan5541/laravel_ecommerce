<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catelogy;
use App\Type;

class TypeController extends Controller
{
    public function getType(){
        $type = Type::all();
        return view('admin.type.listType', ['type'=>$type]);
    }

    public function addType(Request $req){
        $catelogy = Catelogy::all();
        if($req->isMethod('post')){
            $this->validate($req,
                [
                    'name'=>'min:1|max:100|unique:types',
                ],
                [
                    'name.min'=>'Type name must among 1 to 100 character',
                    'name.max'=>'Type name must among 1 to 100 character',
                    'name.unique'=>'Type name already exists'
                ]);
            $type = new Type;
            $type->name = $req->name;
            $type->slug_name = str_slug($req->name, '-');
            $type->idCatelogy = $req->idCatelogy;
            $type->save();
            return redirect()->back()->with('success_messenger','Add new type successfully');
        }
        else{
            return view('admin.type.addType',['catelogy'=>$catelogy]);
        }
    }

    public function editType(Request $req, $id){
        $type = Type::find($id);
        $catelogy = Catelogy::all();
        if($req->isMethod('post')){
            $this->validate($req,
                [
                    'name'=>'min:1|max:100|unique:types',
                ],
                [
                    'name.min'=>'Type name must among 1 to 100 character',
                    'name.max'=>'Type name must among 1 to 100 character',
                    'name.unique'=>'Type name already exists'
                ]);
            $type->name = $req->name;
            $type->slug_name = str_slug($req->name, '-');
            $type->idCatelogy = $req->idCatelogy;
            $type->save();
            return redirect()->back()->with('success_messenger','Edit Type successfully');
        }
        else{
            return view('admin.type.editType',['type'=>$type, 'catelogy'=>$catelogy]);
        }
    }

    public function deleteType($id){
        $type = Type::find($id);
        if(count($type->product) != 0){
            return redirect()->back()->with('error_messenger','Cannot delete this type because it contains product');
        }
        $type->delete();
        return redirect()->back()->with('success_messenger','Delete type successfully');
    }
}
