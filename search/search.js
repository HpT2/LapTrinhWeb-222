function More(){
    table = document.getElementsByName('product_table')[0];

    for (let i = 0 ; i < 3 ; i++){
        row_length = table.rows.length;
        const row = document.createElement('tr');
        table.appendChild(row);

        const num = row_length ;
        const col1 = document.createElement('td');
        row.appendChild(col1);
        col1.innerHTML = num;

        const col2 = document.createElement('td');
        row.appendChild(col2);
        const img = document.createElement('img');
        img.src = 'iphone.jpeg';
        img.style = 'height:100px;'
        btn = document.createElement('button');
        btn.style = 'border:0px';
        btn.appendChild(img);
        col2.appendChild(btn);

        const col3 = document.createElement('td');
        row.appendChild(col3);
        a = document.createElement('a')
        a.href = "#";
        a.innerHTML = 'Iphone';
        col3.appendChild(a);

        const col4 = document.createElement('td');
        row.appendChild(col4);
        col4.innerHTML = '10000';

        const col5 = document.createElement('td');
        row.appendChild(col5);
        col5.innerHTML = '1/1/1999';

    }
}