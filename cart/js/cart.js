



document.addEventListener('DOMContentLoaded', function(){

	var decrease_btn = document.querySelectorAll("button[name^='decrease']");
	for (let i = 0; i < decrease_btn.length; i++){
	decrease_btn[i].addEventListener('click', function(e){
			var id = decrease_btn[i].name.split('decrease')[1];
			document.getElementById('amount_of_'+id).value -= 1;
			if (document.getElementById('amount_of_'+id).value < 1)	{
				document.getElementById('amount_of_'+id).value = 1;
				return;
			}	
			document.getElementById('to_money_'+id).innerHTML = document.getElementById('amount_of_'+id).value * document.getElementById('price_of_'+id).innerHTML;

			if(document.getElementsByName('checkbox_'+id)[0].checked){
				updateTotal(-document.getElementById('price_of_'+id).innerHTML);
			}
		})
	}

	var increase_btn = document.querySelectorAll("button[name^='increase']");
	for (let i = 0; i < increase_btn.length; i++){
		increase_btn[i].addEventListener('click', function(e){
			var id = increase_btn[i].name.split('increase')[1];	
			document.getElementById('amount_of_'+id).value = Number(document.getElementById('amount_of_'+id).value) + 1;
			document.getElementById('to_money_'+id).innerHTML = document.getElementById('amount_of_'+id).value * document.getElementById('price_of_'+id).innerHTML;
			if(document.getElementsByName('checkbox_'+id)[0].checked){
				updateTotal(document.getElementById('price_of_'+id).innerHTML);
			}
		})
	}
	
	document.getElementById("buy").addEventListener('submit', function(e){
		var checkedBoxes = document.querySelectorAll('input[name^="checkbox_"]:checked');
		
		if (checkedBoxes.length == 0){
			e.preventDefault();
		}

		for (let i = 0; i < checkedBoxes.length; i++){
			var id = checkedBoxes[i].name.split("checkbox_")[1];
			var amount = document.getElementById("amount_of_"+id).value;
			checkedBoxes[i].value = amount;
		}
		
	})

	document.getElementById("checkall").addEventListener('click', function(e){
		var checkboxes = document.querySelectorAll('input[name^="checkbox_"]');
		if(this.checked){
			checkboxes.forEach(element => {
				if(!element.checked){
					element.checked = true;
					element.dispatchEvent(new Event("click"));
				}	
			});
		}else{
			checkboxes.forEach(element => {
				element.checked = false;
				document.getElementById('total').value = 0;
				updateTotal(0);
			});
		}
	})

	var amount_field = document.querySelectorAll('input[id^="amount_of_"]');
	amount_field.forEach(element => {
		element.addEventListener('change', function(e){
			if(element.value < 1) element.value = 1;
			var id = element.id.split('amount_of_')[1];
			var flag = document.getElementsByName('checkbox_'+id)[0].checked;
			if(flag) updateTotal(-document.getElementById('to_money_'+id).innerHTML);
			document.getElementById('to_money_'+id).innerHTML =  element.value * document.getElementById('price_of_'+id).innerHTML;
			if(flag) updateTotal(document.getElementById('to_money_'+id).innerHTML);
		})
	});

	var checkboxes = document.querySelectorAll('input[name^="checkbox_"]');
	checkboxes.forEach(checkbox => {
		checkbox.addEventListener('click',function(e){
			var id = this.name.split('checkbox_')[1];
			if(this.checked){
				updateTotal(document.getElementById('to_money_'+id).innerHTML);
			}else{
				updateTotal(-Number(document.getElementById('to_money_'+id).innerHTML));
			}
		})
	})

	var rm_btns = document.getElementsByName("rm-btn");
	rm_checked_btn = rm_btns[0]
	rm_checked_btn.addEventListener('click',function(e){
		var checkboxes = document.querySelectorAll('input[name^="checkbox_"]');
		var productIDs = new Array();
		checkboxes.forEach(checkbox => {
			var id;
			if(checkbox.checked){
				id = checkbox.name.split('checkbox_')[1];
				productIDs.push(id);		
			}
		})
		$.ajax({
			url: "handler/remove.php",
			type: "post",
			data: {
				request : "removeChecked",
				products: productIDs,

			},
			success: function(res){
				var scrollable = document.getElementsByClassName('scrollable')[0];
				productIDs.forEach(id => {
					scrollable.removeChild(document.getElementById('product_'+id));
				})
			},
			error: function(xhr, status, error){
				alert(status);
			}
		})
	})

	rm_btns.forEach(rm_btn => {
		rm_btn.addEventListener('click',function(e){
			var id = this.value;
			$.ajax({
				url: "handler/remove.php",
				type: "post",
				data: {
					id : id
				},
				success: function(res){
					document.getElementsByClassName('scrollable')[0].removeChild(document.getElementById('product_'+id));
				},
				error: function(xhr, status, error){
					alert(status);
				}
			})
		})
	})
	
	
})

function updateTotal(money){
	document.getElementById('total').value = Number(document.getElementById('total').value) + Number(money);

	if(Number(document.getElementById('total').value) == 0){
		document.getElementById('ntc').innerHTML = "Please choose products";
	}else{
		document.getElementById('ntc').innerHTML = "";
	}
}
