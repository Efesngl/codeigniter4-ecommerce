const ajax = new XMLHttpRequest();

//switchery
function makeSwitches(str) {
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(elem) {
        if (elem.hasAttribute("data-switchery")) {
            elem.nextElementSibling.remove();
        }
        var switchery = new Switchery(elem, {
            color: "#556ee6"
        })
        elem.addEventListener("change", () => {
            let json = JSON.stringify({
                ID: elem.dataset.discount_id,
                checked: elem.checked
            })
            ajax.open("post", "/admin/indirimler/is_active");
            ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            ajax.setRequestHeader("Content-type", "application/json")
            ajax.send(json);
        })
    });
}
makeSwitches("body");
//discount delete
function deleteEvent() {
    let discount_delete = document.querySelectorAll("#discount_delete");
    discount_delete.forEach(elem => {
        elem.addEventListener("click", () => {
            let json = JSON.stringify({
                ID: elem.dataset.discount_id
            });
            del("Bu indirim kodunu silmek istiyor musunuz ?", json, "/admin/indirimler/sil");
        })
    })
}
deleteEvent();


//discount search
function createDiscountSearchResult(json) {
    for (let i in json.codes) {
        let tr = document.createElement("tr");
        tr.innerHTML += `                                            
        <td>${json.codes[i]["code"]}</td>
        <td>${json.codes[i]["discount"]} ${(json.codes[i]["discount_type"]=="Yüzdelik")?"%":"TL"}</td>
        <td>${json.codes[i]["min_total"]}</td>
        <td>${json.codes[i]["discount_type"]}</td>
        <td><input type="checkbox" data-discount_id="${json.codes[i]["ID"]}" class="js-switch" ${(json.codes[i]["is_active"] == 1) ? "checked" : ""}></td>
        <td>
            <a href="/admin/indirimler/duzenle/${json.codes[i]["ID"]}" class="btn btn-warning">Düzenle</a>
            <button data-discount_id="${json.codes[i]["ID"]}" class="btn btn-danger" id="discount_delete">Sil</button>
        </td>`;
        discount_table_body.appendChild(tr);
    }
    makeSwitches("searchResult");
    deleteEvent();
}

let discount_table_body = document.querySelector("#discounts_table_body");
// discount_table_body.addEventListener("change", () => {
//     alert();
// })
let discount_table_body_innerHTML = document.querySelector("#discounts_table_body").innerHTML;
let discount_search = document.querySelector("#discount_search");
let timer = setTimeout(() => {}, 0);
discount_search.addEventListener("keyup", () => {
    clearTimeout(timer);
    timer = setTimeout(() => {
        let ds = discount_search.value;
        if (ds.replace(/\s/g, '').length != 0) {
            let json = JSON.stringify({
                code: ds
            });
            discount_table_body.innerHTML = "";
            search(json, "/admin/indirimler/search", createDiscountSearchResult);
        } else {
            discount_table_body.innerHTML = discount_table_body_innerHTML;
            deleteEvent();
            makeSwitches();
        }
    }, 500);

})