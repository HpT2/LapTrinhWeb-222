



document.addEventListener('DOMContentLoaded', function(){

	quantity_fields = document.querySelectorAll('input[id^=quantity_]');
	quantity_fields.forEach(quantity_field => {
		let id = quantity_field.id.split('quantity_')[1];
		quantity_field.addEventListener('change', function(e){
			if (quantity_field.value < 1){
				quantity_field.value = 1;
				return;
			}
			$.ajax({
				url : "handler/update_quantity.php",
				type: 'post',
				data: {
					upd_id : id,
					amount: quantity_field.value
				},
				success: function(res){	
					document.getElementById('subtotal_'+id).innerHTML = res;
					updateTotal();
				}
			})
		})
	})

	close_btn = document.querySelectorAll('div[id^="close_"]');
	close_btn.forEach(btn => {
		let id = btn.id.split('close_')[1];
		btn.addEventListener('click', function(e) {
			$.ajax({
				url : "handler/remove.php",
				type: 'post',
				data: {
					rm_id : id
				},
				success: function(res){	
					document.getElementById('product_'+id).innerHTML = '';
					updateTotal();
				}
			})
		})
	})
	
	document.getElementById('checkout').addEventListener('click', function(e){
		if(document.getElementsByClassName('items')[0].children.length == 0){
			console.log(document.getElementsByClassName('items')[0].children.length);
			e.preventDefault();
		}	
	})
})

function updateTotal(){
	let subtotalAll = 0;
	subtotal_fields = document.querySelectorAll('span[id^="subtotal_"')
	subtotal_fields.forEach(subtotal => {
		subtotalAll += Number(subtotal.innerHTML);
	})
	document.getElementById('subtotalAll').innerHTML = '$' +subtotalAll;
	let total = subtotalAll + subtotalAll*0.1;
	document.getElementById('total').innerHTML ='$'+ parseFloat(total).toPrecision(5);
	
}