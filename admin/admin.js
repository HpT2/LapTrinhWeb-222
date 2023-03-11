//get list of user from database
userblock = document.getElementsByName("user_list")[0];
for(let i = 0 ; i < 100; i++) {

    li = document.createElement('li');
    li.className = 'list-group-item';

    row = document.createElement('div');
    row.className = 'd-flex';
    li.appendChild(row);

    col1 = document.createElement('div');
    col1.className = 'li-col1';
    col1.innerHTML = 'user ' + i;
    row.appendChild(col1);

    col2 = document.createElement('div');
    col2.className = 'li-col2';
    row.appendChild(col2);

    btn1 = document.createElement('button');
    btn1.className = 'btn btn-primary';
    btn1.innerHTML = 'View';
    col2.appendChild(btn1);

    btn2 = document.createElement('button');
    btn2.className = 'btn btn-danger';
    btn2.innerHTML = 'Delete';
    col2.appendChild(btn2);

    userblock.appendChild(li);
}

ss = JSON.parse(ss);
document.write(ss['username']);