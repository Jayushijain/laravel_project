<script type="text/javascript">

     jQuery(document).ready(function($) {
            $('.datatable').DataTable();
      });

     function checkName(value)
	{
		if(/^[a-zA-Z0-9]+\s+[a-zA-Z0-9]*$/.test(value) == false && 
			/^[a-zA-Z0-9]*$/.test(value) == false)
		{
			if(!($("#name").parent().parent().hasClass("has-error")))
			{
				$("#name").parent().parent().addClass("has-error");
				$("#name").parent().append('<span class="help-block" id="span-error">This field can only contain text and numbers</span>');
			}			
			return false;
		}
		else
		{
			$("#name").parent().parent().removeClass("has-error help-block");
			$(".help-block").remove();
			return true;
		}

    }
</script>
