	<?php if(is_array($banner)):?>
		<div id='header' style='height:461px;'>
		<?php foreach($banner as $row):?>
			<img src="<?=$upload_url.$banner_dir.'/'.$row['image_file']?>" />
		<?php endforeach?>
		</div>
	<?php else:?>
		 <div id='header' style='height:88px;'>
			<img src='<?=$image_url?>header_inner.jpg' />	
		</div>
	<?php endif?>	

