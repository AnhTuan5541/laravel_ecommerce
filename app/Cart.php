<?php

namespace App;

class Cart{

    public $items = null;//Lưu từng nhóm sản phẩm với nhau
    public $totalQty = 0;
    public $totalPrice = 0;

    //Hàm khởi tạo
    public function __construct($oldCart){
        //Nếu đã có sản phẩm này trong giỏ hàng
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id){
        $storedItem = ['qty'=>0, 'price'=>$item->price, 'totalPriceItem'=>$item->price, 'item'=>$item];//'item'->$item là khi muốn group lại 1 product. Ví dụ nếu add to cart 3 lần chó ngao 15kg thì chỉ có 1 item đại diện, chỉ có quantity tăng lên. $storedItem nghĩa là product này đã có trong cart
        if($this->items){ //check items đã có trong Cart chưa? $this->items là từng group items
            if(array_key_exists($id, $this->items)){ //Check đã tồn tại group items với id = $id chưa
                $storedItem = $this->items[$id];     //Nếu đã tồn tại thì overwrite $storedItem
            }
        }
        $storedItem['qty']++; //Quantity increse 1
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem; //Thoát vòng lặp if nếu chưa có item này thì tạo mới item[id] này = $storedItem
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }
    //xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItems($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
