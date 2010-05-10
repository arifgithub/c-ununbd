/*  Jquery status menu, version 1.0.0
 *  (c) 2010-2007 Reza Ahmed
 *
 *  Prototype is freely distributable under the terms of an MIT-style license.
 *
/*--------------------------------------------------------------------------*/

(function($){
	$.fn.extend({ 
		//plugin name - statusmenu
		statusMenu: function(options) {
			//Settings list and the default values
			var defaults = {
				delay: 500,
				items: [{value:'#',title:'Active'},{value:'#',title:'Pending'},{value:'#',title:'Inactive'}],
				offset:[6,1],
				cycle:['#FFFFFF','#ffffff']
			};
			var options = $.extend(defaults, options || {});
			var list=''; 
			$.each(options.items,function(i,el){
							if(typeof el['icon'] === "undefined")
							list +='<li><a href="#">'+el['title']+'</a></li>';
							else
							list +='<li><a href="#"><img src="'+el['icon']+'" />'+el['title']+'</a></li>';
							
					   });
			var container=$('<div class="statusmenu"><ul>'+list+'</ul></div>');
			$('body').append(container);
    		return this.bind('click',function(e) {
				var o =options;
				//Assign current element to variable,
				var obj = $(this),menu = $(container); 				
       	    	var offset = $(this).offset(),url=obj.attr('href')+'/';
       	    	$('div.statusmenu').hide();
				menu.css({'top':(offset.top+o.offset[0])+'px','left':(offset.left+o.offset[1])+'px'});
				//Get all LI in the UL
				//var items = $("li", obj);
				//Change the color according to odd and even rows
				$("li:even", menu).css('background-color', o.cycle[0]);				
			 	$("li:odd", menu).css('background-color', o.cycle[1]);
			 	var i=0;
			 	$('li a', menu).each(function(){
			 		var reg = /^(javascript:)/i,val=o.items[i++]['value'];
			 		//if there is any javascript function in value;
			 		if(val.match(reg))
					{
			 			 $(this).attr('href',val);
					}
			 		else
			 		{	
			 		  $(this).attr('href',url+val);
			 		}  
			 	});
			 	e.stopPropagation();
			 	$(document).click(function(){
			 		menu.hide();
			 	});
			 	menu.show();
			 	return false;
			 })
				
    	} // Function to close
	
	});	
})(jQuery);


