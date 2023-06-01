let ajax = new XMLHttpRequest();
let firstName = document.querySelector("#register-first-name");
let lastName = document.querySelector("#register-last-name");
let nameInputs = document.querySelectorAll(".register-name-input");
let passwordInputs = document.querySelectorAll(".password-input");
let passwordFirst = document.querySelector("#password-first");
let passwordSecond = document.querySelector("#password-check");
let emailInput = document.querySelector("#register-email");
let registerForm = document.querySelector("#register-form");
let checkbox = document.querySelector("#check2");
let submitButton = document.querySelector("#register-submit");
let checkedInputs = {
    "first_name": false,
    "last_name": false,
    "email": false,
    "password": false,
    "checkbox": false
}
let emailRegEx = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

function setInputs(input, status) {
    if (status == true || status == false) {
        checkedInputs[input] = status;
        if (checkInputs()) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }
}

function checkInputs() {
    let checkStatus = true;
    for (let x in checkedInputs) {
        if (checkedInputs[x] == false) {
            checkStatus = false;
            break;
        }
    }
    if (checkStatus == true) {
        return true;
    } else {
        return false;
    }
}
passwordInputs.forEach(elem => {
    elem.addEventListener("keyup", () => {
        if (passwordSecond.value != "" || passwordFirst.value != "") {
            if (passwordSecond.value != passwordFirst.value) {
                passwordSecond.classList.remove("correct-input");
                passwordFirst.classList.remove("correct-input");
                passwordSecond.classList.add("wrong-input");
                passwordFirst.classList.add("wrong-input");
                setInputs("password", false);
            } else {
                passwordSecond.classList.remove("wrong-input");
                passwordFirst.classList.remove("wrong-input");
                passwordSecond.classList.add("correct-input");
                passwordFirst.classList.add("correct-input");
                setInputs("password", true);
            }
        } else {
            passwordSecond.classList.remove("wrong-input");
            passwordFirst.classList.remove("wrong-input");
            passwordSecond.classList.remove("correct-input");
            passwordFirst.classList.remove("correct-input");
            setInputs("password", false);
        }
    });
})

emailInput.addEventListener("keyup", () => {
    if (emailInput.value != "") {
        if (emailRegEx.test(emailInput.value)) {
            emailInput.classList.remove("wrong-input");
            emailInput.classList.add("correct-input");
            setInputs("email", true);
        } else {
            emailInput.classList.remove("correct-input");
            emailInput.classList.add("wrong-input");
            setInputs("email", false);
        }
    } else {
        emailInput.classList.remove("wrong-input");
        emailInput.classList.remove("correct-input");
        setInputs("email", false);
    }
})
nameInputs.forEach(elem => {
    elem.addEventListener("keyup", () => {
        if (elem.value != "") {
            elem.classList.add("correct-input");
            setInputs(elem.getAttribute("name"), true);
        } else {
            elem.classList.remove("correct-input");
            setInputs(elem.getAttribute("name"), false);
        }
    });
})
checkbox.addEventListener("change", () => {
    setInputs("checkbox", checkbox.checked);
});
submitButton.addEventListener("click", () => {
    data = {
        "first_name": firstName.value,
        "last_name": lastName.value,
        "email": emailInput.value,
        "password": passwordFirst.value,
    }
    ajax.open("POST", "/register");
    ajax.setRequestHeader("Content-type", "application/json"),
        ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    ajax.send(JSON.stringify(data));
    ajax.onload = function() {
        if (this.responseText != "1062") {
            if (this.responseText == 1) {
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: 'success',
                    title: "Başarıyla kayıt olundu! Yönlendiriliyorsunuz...",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    background: "#1abc9c",
                    color: "#fff",
                    iconColor: "white"
                })
                .then(() => {
                    window.location.href = "/hesap";
                })
            }
        } else {
            emailInput.classList.remove("correct-input")
            emailInput.classList.add("wrong-input");
            Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: 'error',
                    title: "Bu eposta ile kayıtlı bir kullanıcı var lütfen farklı bir eposta deneyiniz !",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    background: "#e74c3c",
                    color: "#fff",
                    iconColor: "white"
                })
        }
    }
});