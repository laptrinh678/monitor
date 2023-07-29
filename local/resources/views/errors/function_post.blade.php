@php
	function menuParent_post($data_post,$parent=0,$str='--',$select=0){
		foreach($data_post as $val){
			$id = $val->id;
			$name = $val->cat_name;
			$slug = $val->cat_slug;
			if($val->parent_id==$parent){
				if($select!=0 && $id == $select){
					echo "<option value='$id $slug' selected>$str $name</option>";
				}else{
					echo "<option value='$id $slug'>$str $name</option>";
				}
				menuParent_post($data_post,$id,$str.'--',$select);
			}
		}
	}
@endphp