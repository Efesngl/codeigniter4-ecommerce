let ajax = new XMLHttpRequest();
//sweet alert
function deleteEvent() {
    let delete_user = document.querySelectorAll("#delete-user");
    delete_user.forEach(elem => {
        elem.addEventListener("click", () => {
            let json = JSON.stringify({
                ID: elem.dataset.user_id
            })
            del("Bu müşteriyi silmek istediğinize emin misiniz ?", json, "/admin/musteriler/sil");
        })
    });
}
deleteEvent();

//customer search
let customer_table_body = document.querySelector("#customers_table_body");
let customer_table_body_orj = document.querySelector("#customers_table_body").innerHTML;
let customer_search = document.querySelector("#customer_search");
let timer = setTimeout(() => {}, 0);

function createCustomerSearchResult(json) {
    for (let i in json.customers) {
        let tr = document.createElement("tr");
        tr.innerHTML += `                                            
            <td>` + json.customers[i]["ID"] + `</td>
            <td>` + json.customers[i]["full_name"] + `</td>
            <td>` + json.customers[i]["email"] + `</td>
            <td>
                <a href="/admin/musteriler/duzenle/${json.customers[i]["ID"]}" class="btn btn-warning">Düzenle</a>
                <button data-user_id="${json.customers[i]["ID"]}" class="btn btn-danger" id="delete-user">Sil</button>
            </td>`;
        customer_table_body.appendChild(tr);
    }
    deleteEvent();
}
customer_search.addEventListener("keyup", () => {
    clearTimeout(timer);
    timer = setTimeout(() => {
        let cs = customer_search.value;
        if (cs.replace(/\s/g, '').length != 0) {
            let json = JSON.stringify({
                customer_search: cs
            });
            customer_table_body.innerHTML = "";            
            search(json,"/admin/musteriler/search",createCustomerSearchResult)
        } else {
            customer_table_body.innerHTML = customer_table_body_orj;
        }
    }, 500);

})