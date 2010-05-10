
	$(function() {
		$("#create_date").datepicker();
	});
	
function NewsFormValid()
{
 if(document.form.title.value="")
 {
 	alert(1);
  	document.form.title.focus();
 }
  else if (document.form.short_description.value="")
  {
  	 	document.form.short_description.focus();
 }
  else
  {
  	document.form.submit();
  }
}
