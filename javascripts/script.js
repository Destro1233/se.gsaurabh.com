/**
 * Created by Saurabh on 6/16/2015.
 */
$(function(){
    $("#program").change(function(){
		$(".release_select").remove();
		$(".version_select").remove();
        if($("#program").val() !== "") {
            $.get("addnewbug1.php", {program_name: $("#program").val()})
                .done(function(data){
                    $("div.release").after(data);
            });
			$.get("addnewbug_version.php", {program_name: $("#program").val()})
                .done(function(data){
                    $("div.version").after(data);
			});
        }
    });
	$("#program_number").change(function(){
		$(".release_select").remove();
		if($("#program_number").val() !== "") {
			var val2 = $("#program_number").val();
			 $.get("addnewbug2.php?program_number="+val2, {program_name: $("#program").val()})
                .done(function(data){
                    $("div.release").after(data);
			});
		}
	});
});
