//get list of user from database
userblock = document.getElementsByName("user_list")[0];
for(let i = 0 ; i < 100; i++) {

    li = document.createElement('li');
    li.className = 'list-group-item';

    row = document.createElement('div');
    row.className = 'row';
    li.appendChild(row);

    col1 = document.createElement('div');
    col1.className = 'col-10';
    col1.innerHTML = 'user ' + i;
    row.appendChild(col1);

    col2 = document.createElement('div');
    col2.className = 'col-2 text-center';
    row.appendChild(col2);

    btn1 = document.createElement('button');
    btn1.className = 'btn btn-primary';
    btn1.innerHTML = 'X';
    col2.appendChild(btn1);


    btn2 = document.createElement('button');
    btn2.className = 'btn btn-primary';
    btn2.innerHTML = 'X';
    col2.appendChild(btn2);

    btn3 = document.createElement('button');
    btn3.className = 'btn btn-primary';
    btn3.innerHTML = 'X';
    col2.appendChild(btn3);

    userblock.appendChild(li);
}

ss = JSON.parse(ss);
document.write(ss['username']);