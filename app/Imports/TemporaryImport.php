<?php

namespace App\Imports;

use App\Models\Type;
use App\Models\Offer;
use App\Models\Category;
use App\Models\Product;
use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TemporaryImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $id;

    function __construct($id) 
    {
            $this->id = $id;
    }


    public function collection(Collection $rows)
    {
            foreach ($rows as $row => $value) 
            {
                
                if($row != 0)
                {   

                    $product = Product::where('part_number', $value[0])->where('offer_id', $this->id)->first();
                    $cat_check = Category::where('name',$value[5])->first();
                    
                    $type_check = Type::where('name',$value[4])->first();
                            

                    if( (!$product) && ($cat_check) && ($type_check)  && (count($cat_check->children) != 0) )
                    {
                        Product::create([

                            'part_number'   => $value[0],
                            'name'          => $value[1],
                            'quantity'      => $value[2],
                            'price'         => $value[3],
                            'type_id'       => Type::Where('name', $value[4] )->first()->id,
                            'category_id'   => Category::Where('name', $value[5] )->first()->id,
                            'max_qun'       => $value[6],
                            'min_qun'       => 1,
                            'offer_id'      => $this->id
                            
                        ]);
                    }



                    $product = Item::where('type_number', $value[0])->first();

                    if(!$product)
                    {
                        Item::create([

                            'type_number'   => $value[0],
                            'name'          => $value[1],
                            'quantity'      => $value[2],
                            'type_id'       => Type::Where('name', $value[4] )->first()->id,
                            'category_id'   => Category::Where('name', $value[5] )->first()->id
                            
                        ]);
                    }
                        

                }
            } 
        
        
    }
}
