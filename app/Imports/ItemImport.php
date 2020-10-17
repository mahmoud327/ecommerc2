<?php

namespace App\Imports;

use App\Models\Item;
use App\Models\Type;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

HeadingRowFormatter::default('none');


class ItemImport implements ToCollection
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */




    public function collection(Collection $rows)
    {
       
        
            foreach ($rows as $row => $value) 
            {
                
                if($row != 0)
                {   

                   $item_check = Item::Where('type_number', $value[0])->first();

                   $cat_check = Category::where('name',$value[4])->first();
                   
                   $type_check = Type::where('name',$value[3])->first();
                            
                    

                    if(!($item_check) && ($cat_check) && ($type_check) )
                    {
                        Item::create([

                            'type_number'   => $value[0],
                            'name'          => $value[1],
                            'quantity'      => $value[2],
                            'type_id'       => Type::Where('name', $value[3] )->first()->id,
                            'category_id'   => Category::Where('name', $value[4] )->first()->id
                            
                
                            
                        ]);
                    }
                        

                }
            } 
        
        
    }

}
