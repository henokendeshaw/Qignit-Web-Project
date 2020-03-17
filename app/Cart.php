<?php

namespace App;



class Cart 
{
    public $items = null;
    public $number = 0;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items = $oldCart->items;
            $this->number = $oldCart->number;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        $storedItem = ['price' => $item->Price, 'item' => $item];
        if($this->items)
        {
            if(array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id]; 
            }
        }
       
        $this->items[$id] = $storedItem;
        $this->number++;
        $this->totalQty++;
        $this->totalPrice +=$item->Price;

    }
    public function removeItem($id)
    {
        
        $this->totalQty --;
        $this->totalPrice -=$this->items[$id]['price'];
        unset($this->items[$id]);

    }
   
    
}
