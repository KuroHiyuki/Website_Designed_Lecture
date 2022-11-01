const nameEle = document.getElementById('name');
const emailEle = document.getElementById('email');
const passEle = document.getElementById('pass');
const phoneELe = document.getElementById('phone');

const submitEle = document.getElementById('submit');

submitEle.addEventListener('click', function () {
    Array.from(submitEle).map((ele) =>
        ele.classList.remove('success', 'error')
    );
    let isValid = checkValidate();

    if (isValid) {
        alert('Gửi đăng ký thành công');
    }
});

function checkValidate(){
    let nameEle = nameEle.value;
    let emailEle = emailEle.value;
    let passEle = passEle.value;
    let phoneELe = phoneELe.value;

    let isCheck = true;

    if (document.myform.name.value =""){
        alert("Please provide your name!");
        focument.myform.name.focus();
        return false;
    }

    // if (nameValue == '') {
    //     setError(nameEle, 'Tên không được để trống');
    //     isCheck = false;
    // } else {
    //     setSuccess(nameEle);
    // }

    if (emailValue == '') {
        setError(emailEle, 'Email không được để trống');
        isCheck = false;
    } else if (!isEmail(emailValue)) {
        setError(emailEle, 'Email không đúng định dạng');
        isCheck = false;
    } else {
        setSuccess(emailEle);
    }

    if (passValue.length < 6) {
        setError(passEle, 'Mật khẩu không được để trống');
        isCheck = false;
    } else if (!isEmail(passValue)) {
        setError(passEle, 'Mật khẩu không đúng định dạng');
        isCheck = false;
    } else {
        setSuccess(passEle);
    }

    if (phoneValue == '') {
        setError(phoneEle, 'Số điện thoại không được để trống');
        isCheck = false;
    } else if (!isPhone(phoneValue)) {
        setError(phoneEle, 'Số điện thoại không đúng định dạng');
        isCheck = false;
    } else {
        setSuccess(phoneEle);
    }

    return isCheck;
}

function setSuccess(ele) {
    ele.parentNode.classList.add('success');
}

function setError(ele, message) {
    let parentEle = ele.parentNode;
    parentEle.classList.add('error');
    parentEle.querySelector('small').innerText = message;
}

function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
        email
    );
}

function ispass(pass){

}

function isPhone(number) {
    return /(84|0[3|5|7|8|9])+([0-9]{8})\b/.test(number);
}