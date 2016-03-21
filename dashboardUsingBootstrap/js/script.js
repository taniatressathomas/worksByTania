$(document).ready(function(){
	

	//for checking all checkbox
	$("#mytable #checkall").click(function(){
		if($("#mytable #checkall").is(":checked")){
			$("#mytable input[type=checkbox]").each(function(){
				$(this).prop("checked",true);
			});
		}else{
			$("#mytable input[type=checkbox]").each(function(){
				$(this).prop("checked",false);
			});
		}
	});
	//for adding new row
	var i =4;
	$("#add_row").click(function(){
		$("#id" + i).html("<td>"+ (i+1) + "</td><td><input name='name' "+i +"></td>")
		$('#id'+i).html("<td><input type='checkbox'/></td><td>"+ (i+1) +"</td><td> Name"+ (i+1) + " </td><td> password"+ (i+1) + "</td><td><p><button data-original-title='Update' rel='tooltip' class='btn btn-primary btn-xs' data-title='Update' data-toggle='modal' data-target='#update'><span class='glyphicon glyphicon-pencil'></span></button></p></td><td><p><button data-original-title='Delete' rel='tooltip' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete'><span class='glyphicon glyphicon-trash'></span></button></p></td>");
		 $('#mytable').append('<tr id="id'+(i+1)+'"></tr>');
		 i++;
	});

	//deleting a row 
	$("#delete_row").click(function(){
		 $(this).closest('tr').html('');
		 

	});


	// for tooltip
	$('[rel="tooltip"]').tooltip();
});