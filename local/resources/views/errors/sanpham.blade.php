@php
	function showCategories_sp($categories, $parent_id = 63, $char = '')
{
    
    $cate_child = array();
    foreach ($categories as $key => $item)
    {
       
        if ($item['parent_id'] == $parent_id)
        {
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }
     
  
    if ($cate_child)
    {
        echo '<ul>';
        foreach ($cate_child as $key => $item)
        {
         
            echo '<li>
                      <a href="'.route("dssp",['id' => $item['id']]).'">'.$item['cat_name'].
                        '<i class="fa fa-caret-right" aria-hidden="true">'.'</i>'.


                      '</a>';
             
            
            showCategories_sp($categories, $item['id'], $char.'|---');
            echo '</li>';
        }
        echo '</ul>';
    }
}
@endphp