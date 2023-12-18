let broner = document.getElementById('broner');
broner.addEventListener("submit", checkForm);

function checkForm(event) {
    let element = document.getElementById("broner");

    let name = element.name.value;
    let phone = element.phone.value;
    let dataTimeValue = new Date(element.date.value);
    let today = new Date();
    
    let error = "";

    if (name === "") {
        error = "Введіть ім'я";
    } else if (name.length <= 1) {
        error = "Коротке ім'я";
    } else if (name.length > 10) {
        error = "Надто довге ім'я";
    } else if (!/^[A-Za-zА-Яа-яЁёҐґІіЇїЄє]+$/.test(name)) {
        error = "Некоректно введене ім'я";
    } else if (phone === "") {
        error = "Введіть номер телефону";
    } else if (/[^0-9]/.test(phone)) {
        error = "Номер телефону введено не коректно";
    } else if (phone.length !== 10) {
        error = "Номер телефону повинен складатись з 10 цифр";
    } else if (!element.date.value) {
        error = "Введіть дату та час";
    } else if (dataTimeValue <= today) {
        error = "Бронювати можна тільки на майбутні дати";
    } else {
        today.setHours(today.getHours() + 1);

        if (dataTimeValue <= today) {
            error = "Бронювати можна тільки через годину від поточного часу";
        }
    }

    if (error !== "") {
        let alarm = document.getElementById('alarm');
        alarm.innerHTML = error;
        event.preventDefault();
    } else {
        element.submit();
    }
}
