let navbar = document.querySelector('.header .flex .navbar');
//Phương thức querySelector() trả về phần tử đầu tiên là phần tử con của phần tử 
//mà nó được gọi ra khớp với nhóm bộ chọn được chỉ định
document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   profile.classList.remove('active');
   navbar.classList.remove('active');
}