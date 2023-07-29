@php
	function menuParent_post($catepost,$parent=0,$str='--',$select=0){
		foreach($catepost as $val){
			$id = $val->id;
			$name = $val->cat_name;
			$slug = $val->cat_slug;
			if($val->parent_id==$parent){
				if($select!=0 && $id == $select){
					echo "<option value='$id' selected>$str $name</option>";
				}else{
					echo "<option value='$id'>$str $name</option>";
				}
				menuParent_post($catepost,$id,$str.'--',$select);
			}
		}
	}
@endphp