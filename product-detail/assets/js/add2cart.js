document.getElementById('add2cart').addEventListener('click', function(e){
	let add_id = this.value;
	$.ajax({
		url : "/product-detail/add2cart.php",
		type: "post",
		data: {
			id : add_id,
		},
		success : function (res){
			if(res){
				alert(res);
			}else{
				alert("added");
			}
		}
	})
})