let broner = document.getElementById('broner');
broner.addEventListener("submit", checkForm);

function checkForm(event) {
    event.preventDefault();
    let element = document.getElementById("broner");

    let name = element.name.value;
    let phone = element.tel.value;
    let dataTime = element.datatime.value;

    let error = "";

    if (name == "") {
        error = "Введіть ім'я";
    } else if (name.length < 4) {
        error = "Коротке ім'я";
    } else if (name.length > 10) {
        error = "Надто довге ім'я";
    } else if (/[\d\s!@#$%^&*()_+]/.test(name)) {
        error = "Некоректно введене ім'я";
    } else if (phone == "") {
        error = "Введіть номер телефону";
    } else if (/[^0-9]/.test(phone)) {
        error = "Номер телефону введено не коректно";
    } else if (phone.length !== 10) {
        error = "Номер телефону повинен складатись з 10 цифр";
    } else if (dataTime == "") {
        error = "Введіть дату та час";
    }

    if (error != "") {
        let alarm = document.getElementById('alarm');
        alarm.innerHTML = error;
    } else {
       alert('good');
    }
}
