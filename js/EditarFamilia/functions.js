$("#searchBar").keyup(function(){
	var keyword = $("#searchBar").val();
	$.ajax({
		url: "searchFamilia.php",
		data: {keyword: keyword},
		beforeSend : function (){
			$("#results").html("Cargando <img scr='../../img/Ajax-Loader.gif' alt='loading'>");
		},
		success : function (returnData) {
			$("#results").html(returnData);
		},
	});
});