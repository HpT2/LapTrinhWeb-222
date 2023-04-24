document.getElementById('post-comment').addEventListener('click', function(e){
	let value = this.value;
	let comment = document.getElementById('comment-field').value;
	console.log(value);
	$.ajax({
		url: "/product-detail/comment.php",
		type: 'post',
		data: {
			id : value,
			content: comment
		},
		success: function(res){
			if(res=="update"){
				
			}
		},
	})
})