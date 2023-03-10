userblock = document.getElementsByName("user_list")[0];
for(let i = 0 ; i < 10; i++) {
    user = document.createElement('li');
    user.className = 'list-group-item';
    user.innerHTML = 'user ' + i;
    userblock.appendChild(user);
}