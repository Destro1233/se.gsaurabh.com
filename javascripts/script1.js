$(function(){
	$("#program_number").change(function(){
		$(".version_select").remove();
		if($("#program_number").val() !== "") {
			var val2 = $("#program_number").val();
			 $.get("addnewbug2.php?program_number="+val2, {program_name: $("#program").val()})
                .done(function(data){
                    $("div.release").after(data);
			});
		}
	});
});

