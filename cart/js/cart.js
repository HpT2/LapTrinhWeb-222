



document.addEventListener('DOMContentLoaded', function(){

	quantity_fields = document.querySelectorAll('input[id^=quantity_]');
	quantity_fields.forEach(quantity_field => {
		let id = quantity_field.id.split('quantity_')[1];
		quantity_field.addEventListener('change', function(e){
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
				}
			})
		})
	})
	
})

function updateTotal(){
		let total = 0;
	subtotal_fields = document.querySelectorAll('td[id^="subtotal_"')
	subtotal_fields.forEach(subtotal => {
		total += Number(subtotal.innerHTML);
	})
	document.getElementById('total').innerHTML = total;

}