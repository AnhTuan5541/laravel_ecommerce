<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Catelogy;
use App\Type;
use App\ProductImage;
class ProductController extends Controller
{

    public function getTypeByCatelogy($idCatelogy){
        $type = Type::where('idCatelogy',$idCatelogy)->get();
        foreach($type as $type){
            echo "<option value='".$type->id."'>".$type->name."</option>";
        }
    }

    public function getProduct(){
        $product = Product::all();
        return view('admin.product.listProduct',['product'=>$product]);
    }

    public function addProduct(Request $req){
        $type = Type::all();
        $catelogy = Catelogy::all();
        if($req->isMethod('post')){
            $this->validate($req,
                [
                    'name'=>'min:1|max:100|',
                ],
                [
                    'name.min'=>'Product name must among 1 to 100 character',
                    'name.max'=>'Product name must among 1 to 100 character',
                ]);
            $product = new Product;
            $product->name = $req->name;
            $product->slug_name = str_slug($req->name, '-');
            $product->description = $req->description;
            $product->status = $req->status;
            $product->price = $req->price;
            $product->quantity = $req->quantity;         
            $product->idType = $req->idType;

            //Up hình ảnh
            if($req->hasFile('image')){
                $image = $req->file('image'); //Lưu Hinh vào biến $file
                $extensionImage = $image->getClientOriginalExtension();
                if($extensionImage != 'jpg' && $extensionImage != 'png' && $extensionImage !='jpeg' && $extensionImage !='JPG' && $extensionImage !='PNG'){
                    return back()->with('error_messenger','Just up file .jpg .png .jpeg .JPG .PNG');
                }
                $name = $image->getClientOriginalName();//Lấy tên hình
                $newName = str_random(4).'_id='.$product->id.'_'.$name; //Đổi tên hình tránh bị lặp tên hình
                //Trường hợp 4 kí tự random trùng nhau đã tồn tại trước thì tiếp tục random lại 4 kí tự khác
                while(file_exists('upload/product/'.$name)){
                    $newName = str_random(4).'_id='.$product->id.'_'.$name;
                }
                $image->move('upload/product',$newName); //Lưu hình lại
                $product->image = $newName;
            }
            else{
                $product->image = '';
            }
            $product->save();
            return redirect()->back()->with('success_messenger','Add new product successfully');
        }
        return view('admin.product.addProduct',['type'=>$type, 'catelogy'=>$catelogy]);
    }

    public function editProduct(Request $req, $id){
        $product = Product::find($id);
        $catelogy = Catelogy::all();
        $type = Type::all();
        if($req->isMethod('post')){
            $this->validate($req,
                [
                    'name'=>'min:1|max:100|',
                ],
                [
                    'name.min'=>'Product name must among 1 to 100 character',
                    'name.max'=>'Product name must among 1 to 100 character',
                ]);
            $product->name = $req->name;
            $product->slug_name = str_slug($req->name, '-');
            $product->description = $req->description;
            $product->status = $req->status;
            $product->price = $req->price;
            $product->quantity = $req->quantity;            
            $product->idType = $req->idType;

            //Up hình ảnh
            if($req->hasFile('image')){
                $image = $req->file('image'); //Lưu Hinh vào biến $image
                $extensionImage = $image->getClientOriginalExtension();
                if($extensionImage != 'jpg' && $extensionImage != 'png' && $extensionImage !='jpeg' && $extensionImage !='JPG' && $extensionImage !='PNG'){
                    return back()->with('error_messenger','Just up file .jpg .png .jpeg .JPG .PNG');
                }
                $name = $image->getClientOriginalName();//Lấy tên hình
                $newName = str_random(4).'_id='.$product->id.'_'.$name; //Đổi tên hình tránh bị lặp tên hình
                //Trường hợp 4 kí tự random trùng nhau đã tồn tại trước thì tiếp tục random lại 4 kí tự khác
                while(file_exists('upload/product/'.$name)){
                    $newName = str_random(4).'_id='.$product->id.'_'.$name;
                }
                $image->move('upload/product',$newName); //Lưu hình lại
                //Xóa hình cũ nếu có hình mới được up
                if(file_exists('upload/product/'.$product->image)){
                    unlink('upload/product/'.$product->image);
                }
            }
            else{
                $newName = $req->current_image;
            }
            $product->image = $newName;
            $product->save();
            return redirect()->back()->with('success_messenger','Edit product successfully');
        }
        
        return view('admin.product.editProduct', ['product'=>$product, 'catelogy'=>$catelogy, 'type'=>$type]);
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success_messenger', 'Delete product successfully');
    }

    public function addProductImage($id, Request $req){
        $product = Product::find($id);
        
        if($req->isMethod('post')){
            if($req->hasFile('image')){
                $files = $req->file('image'); //Lưu Hinh vào biến $file
                foreach($files as $file){
                    $image = new ProductImage;
                    $extensionFile = $file->getClientOriginalExtension();
                    if($extensionFile != 'jpg' && $extensionFile != 'png' && $extensionFile !='jpeg' && $extensionFile !='JPG' && $extensionFile !='PNG'){
                        return back()->with('error_messenger','Just up file .jpg .png .jpeg .JPG .PNG');
                    }
                    $name = $file->getClientOriginalName();//Lấy tên hình
                    $newName = 'id='.$product->id.'_'.str_random(4).'_'.$name; //Đổi tên hình tránh bị lặp tên hình
                    //Trường hợp 4 kí tự random trùng nhau đã tồn tại trước thì tiếp tục random lại 4 kí tự khác
                    while(file_exists('upload/product_images/'.$name)){
                        $newName = 'id='.$product->id.'_'.str_random(4).'_'.$name;
                    }
                    $file->move('upload/product_images',$newName); //Lưu hình lại
                    $image->image = $newName;
                    $image->idProduct = $product->id;
                    $image->save();
                }
            }
            return redirect()->back()->with('success_messenger','Product Image has been added successfully');
        }
        return view('admin.product.addImage',['product'=>$product]);
    }

    public function deleteProductImage($id){
        $image = ProductImage::find($id);
        if(file_exists('upload/product_images/'.$image->image)){
            unlink('upload/product_images/'.$image->image);
        }
        $image->delete();
        return redirect()->back()->with('success_messenger', 'Delete product image successfully');
    }
}
