document.addEventListener("DOMContentLoaded",function(){
	$.ajax({
		url: 'a.php',
		type: 'post',
		dataType: 'json',
		success: function(res){
			res.forEach(product => {
				createRow(product.id, product.name, product.price, product.description, product.image);
			});
		},
		error: function(xhr, status, error){
			var err = eval("(" + xhr.responseText + ")");
			alert(err);
		}
	})

	document.getElementById('add').addEventListener('click', function(e){
		clearInput();
		document.getElementById('form').style.display = "block";
		document.getElementById('submit-btn').value = "Add";
		document.getElementById('form-header').innerHTML = "Add new product";

	})

	document.getElementsByName('close').forEach(btn => {
		btn.addEventListener('click', function(e){
			document.getElementById('form').style.display = "none";
			clearInput();
		})
	})

	document.getElementById('submit-btn').addEventListener("click", function(e){
		let request = this.value;
		let name = document.getElementsByName('name')[0].value;
		let description = document.getElementsByName('description')[0].value;
		let price = document.getElementsByName('price')[0].value;
		let image = document.getElementsByName('image')[0].value;
		let id = document.getElementsByName('pid')[0].value;
		if (!request || !name || !description || !price || !image) {
			alert("invalid input");
			return;
		}

		if(name.length <5 || name.length > 40){
			alert("name must be between 5 and 40 characters");
			return;
		}

		if(description.length > 5000){
			alert("description cannot be over 5000 characters");
			return;
		}

		if (!(Number(price))){
			alert("price must be float type");
			return;
		}

		if(image.length > 255){
			alert("image url cannot be over 255 characters");
			return;
		}
		
		let des = "";
		if (request == "Add") des = 'b.php';
		else if (request == "Change") des = 'c.php'; 

		$.ajax({
			url : des,
			type : 'post',
			data : {
				product_id : id,
				product_name : name,
				product_description : description,
				product_price : price,
				product_image : image
			},
			success : function(res){
				if(request=="Change"){
					document.getElementById("product_"+id).innerHTML = name;
					document.getElementById("des_"+id).innerHTML = description;
					document.getElementById("price_"+id).innerHTML = '$' + price;
					document.getElementById("image_"+id).src = image;
				}else{
					console.log(res);
					createRow(res,name, price, description, image);
				}
				document.getElementById('form').style.display = "none";
			},
			error: function(xhr, status, error){
				alert("An error happened, check your input");
			}
		});
	})
})


function clearInput(){
			document.getElementsByName('name')[0].value = "";
			document.getElementsByName('description')[0].value = "";
			document.getElementsByName('price')[0].value = "";
			document.getElementsByName('image')[0].value = "";
}

function Delete(value){
	send_id = value;
	$.ajax({
		url : 'd.php',
		type: 'post',
		data: {
			id : send_id
		},
		success : function(res){
			document.getElementById('content').removeChild(document.getElementById("row_"+send_id));	
		},
		error : function(xhr, status, error){
			alert("product not exist, please reload page");
		}
	});
}

function makeForm(value){
	document.getElementById('form').style.display = "block";
	document.getElementById('submit-btn').value = "Change";
	document.getElementById('form-header').innerHTML = "Change product info";
	document.getElementsByName('name')[0].value = document.getElementById('product_'+value).innerHTML;
	document.getElementsByName('description')[0].value = document.getElementById('des_'+value).innerHTML;
	document.getElementsByName('price')[0].value = document.getElementById('price_'+value).innerHTML.split('$')[1];
	document.getElementsByName('image')[0].value = document.getElementById('image_'+value).src;
	document.getElementsByName('pid')[0].value = value;
}

function createRow(id,name,price,description,image){
					let div1 = document.createElement('div');
					div1.className = "row justify-content-center";
					div1.id = "row_"+id;

					let div2 = document.createElement('div');
					div2.className = "col-md-12 col-xl-10";
					div1.appendChild(div2);

					let div3 = document.createElement('div');
					div3.className = "card shadow-0 border rounded-3";
					div2.appendChild(div3);

					let div4 = document.createElement('div');
					div4.className = "card-body";
					div3.appendChild(div4);

					let div5 = document.createElement('div');
					div5.className = "row";
					div4.appendChild(div5);

					//column 1: image
					let col1 = document.createElement('div');
					col1.className = "col-2";

					let div = document.createElement('div');
					div.className = "bg-image hover-zoom ripple rounded ripple-surface";
					col1.appendChild(div);

					let img = document.createElement('img');
					img.src = image;
					img.className = "w-100";
					img.id = "image_"+id;
					div.appendChild(img);

					div5.appendChild(col1);

					//column 2: name + des
					let col2 = document.createElement('div');
					col2.className = "col-6";

					let pname = document.createElement('h5');
					pname.innerHTML = name;
					col2.appendChild(pname);
					pname.id = "product_"+id;

					let des = document.createElement('p');
					des.className = 'mb-4 mb-md-0';
					des.innerHTML = description;
					des.id = "des_"+id;
					col2.appendChild(des);

					div5.appendChild(col2);
					
					//column 3: price
					let col3 = document.createElement('div');
					col3.className = "col-2 d-flex align-self-center justify-content-center";

					let pprice = document.createElement('h4');
					pprice.className = "mb-1 me-1";
					pprice.innerHTML = '$' + price;
					pprice.id = "price_"+id;

					col3.appendChild(pprice);
					div5.appendChild(col3);

					//column 4: button
					let col4 = document.createElement('div');
					col4.className = "col-2 d-flex align-self-center justify-content-center";

					let btn1 = document.createElement('button');
					btn1.className = "btn btn-primary";
					btn1.style = "margin-right: 5px;";
					btn1.innerHTML = "Change";
					btn1.name = "change";
					btn1.value = id;
					btn1.addEventListener('click', function(e){
						makeForm(id);
					});
					col4.appendChild(btn1);

					let btn2 = document.createElement('button');
					btn2.className = "btn btn-danger";
					btn2.innerHTML = "Delete";
					btn2.name = "delete";
					btn2.value = id;
					btn2.addEventListener('click', function(e){
						Delete(id);
					});
					col4.appendChild(btn2);

					div5.appendChild(col4);

					document.getElementById('content').appendChild(div1);
}