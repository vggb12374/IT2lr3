const ajax = new XMLHttpRequest();
document.getElementById("table1").style.opacity = "0";
document.getElementById("table2").style.opacity = "0";
document.getElementById("table3").style.opacity = "0";

function get1() {
    const dateStart = document.getElementById("Date_start").value;
    ajax.open("GET", "get1.php?Date_start=" + dateStart);
    ajax.onreadystatechange = getData1;
    ajax.send();
}

function getData1() {
    if (ajax.readyState === 4 && ajax.status === 200) {
        document.getElementById("table1").style.opacity = "1";
        document.getElementById("thead1").innerText = "Дохід";
        document.getElementById("tbody1").innerHTML = ajax.response;
    }
}

function get2() {
    const vendorsName = document.getElementById("vendorsName").value;
    ajax.open("GET", "get2.php?vendorsName=" + vendorsName);
    ajax.onreadystatechange = getData2;
    ajax.send();
}

function getData2() {
    if (ajax.readyState === 4 && ajax.status === 200) {
        const rows = ajax.responseXML.firstChild.children;
        let tbody2 = "";
        for (let i = 0; i < rows.length; i++) {
            tbody2 += "<tr>";
            tbody2 += "<td>" + rows[i].children[0].textContent + "</td>";
            tbody2 += "</tr>";
        }
        document.getElementById("table2").style.opacity = "1";
        document.getElementById("thead2").innerText = "Автомобіль";
        document.getElementById("tbody2").innerHTML = tbody2;
    }
}

function get3() {
    const date = document.getElementById("date").value;
    ajax.open("GET", "get3.php?date=" + date);
    ajax.onreadystatechange = getData3;
    ajax.send();
}

function getData3() {
    if (ajax.readyState === 4 && ajax.status === 200) {
        const res = JSON.parse(ajax.response);
        let tbody3 = "";
        for (let i = 0; i < res.length; i++) {
            tbody3 += "<tr>";
            tbody3 += "<td>" + res[i].Name + "</td><td>" + res[i].Release_date + "</td><td>" + res[i].Race + "</td><td>" + res[i].State + "</td><td>" + res[i].Price + "</td>";
            tbody3 += "</tr>";
        }
        document.getElementById("table3").style.opacity = "1";
        document.getElementById("thead3").innerHTML = "<tr><th>Назва</th><th>Рік випуску</th><th>Пробіг</th><th>Стан</th><th>Ціна</th></tr>";
        document.getElementById("tbody3").innerHTML = tbody3;
    }
}