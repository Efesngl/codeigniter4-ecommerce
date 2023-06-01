window.addEventListener("load", function() {
    function createDetailProduct(json) {
        document.querySelector("#detail-order_id").innerText = json.order_id;
        document.querySelector("#detail-payment_id").innerText = json.payment_id;
        document.querySelector("#detail-customer_name").innerText = json.customer_name;
        document.querySelector("#detail-order-address").innerText = json.order_address;
        document.querySelector("#detail-picker_name").innerText = json.picker_name;
        document.querySelector("#detail-total").innerText = json.total + " TL";
        if (json.is_discounted == 1) {
            document.querySelector("#detail-discount_code").innerText = json.used_discount_code;
            document.querySelector("#detail-discount-code-wrapper").style.display = "block";
        }
        for (let i in json.products) {
            let tr = document.createElement("tr");
            tr.innerHTML =
                `
                <th scope="row"><img src="/${json.products[i].product_image}" alt="" class="avatar-sm"></th>
                <td>
                    <div>
                        <h5 class="text-truncate font-size-14">${json.products[i].product_name}</h5>
                        <p class="text-muted mb-0">${json.products[i].product_price }TL x ${json.products[i].product_quantity}</p>
                    </div>
                </td>
            `;
            detail_order.insertBefore(tr, document.querySelector("#detail-total-tr"));
        }
    }

    function events() {
        let showDetail = document.querySelectorAll("#show-detail");
        //order detail ajax
        showDetail.forEach(elem => {
            elem.addEventListener("click", () => {
                ajax.open("post", "/admin/siparisler/detaylar");
                ajax.setRequestHeader("Content-type", "application/json");
                ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                ajax.send(JSON.stringify({
                    order_id: elem.dataset.order_id
                }));
                ajax.onload = function() {
                    let order = JSON.parse(this.responseText);
                    console.log(order)
                    createDetailProduct(order);
                };
            });
        })
        //order delete
        let delete_order = document.querySelectorAll("#delete-order");
        delete_order.forEach(elem => {
            elem.addEventListener("click", () => {
                let json = JSON.stringify({
                    ID: elem.dataset.order_id
                });
                del("Siparişi silmek istediğinize emin misiniz ?", json, "/admin/siparisler/sil");
            })
        })
        //order edit
        let order_edit_btn = document.querySelectorAll("#edit-order");
        order_edit_btn.forEach(elem => {
            elem.addEventListener("click", () => {
                let order_edit_save = document.querySelector("#order-edit-save");
                // let modalSaveButton=new bootstrap.Modal("#order-edit-modal",{});
                let order_status_select = document.querySelector("#order_statuses");
                let order_id = elem.dataset.order_id;
                order_edit_save.addEventListener("click", () => {
                    function returnUrl() {
                        return location.reload();
                    }
                    let json = JSON.stringify({
                        ID: order_id,
                        status: order_status_select.options[order_status_select.selectedIndex].value
                    })
                    update(json, "/admin/siparisler/duzenle", returnUrl)
                });
            });
        })
    }
    //url params
    let urlParams = new URLSearchParams();
    let order_limit = document.querySelector("#order-limit");
    order_limit.addEventListener("change", () => {
        let limit = order_limit.options[order_limit.selectedIndex].text;
        urlParams.append("limit", limit);
        window.location.search = urlParams.toString();
    })

    //orders table
    let detail_order = document.querySelector("#detail-order-tbody");
    let detail_order_innerhtml = document.querySelector("#detail-order-tbody").innerHTML;
    let product_table = document.querySelector("#detail-product-table");

    let detailModal = document.querySelector("#order-detail-modal");

    //order detail close event
    detailModal.addEventListener("hide.bs.modal", () => {
        detail_order.innerHTML = detail_order_innerhtml;
    })
    let ajax = new XMLHttpRequest;


    //order search
    let search = setTimeout(() => {}, 0);
    let orders_table_tbody = document.querySelector("#orders_table_tbody");
    let order_search = document.querySelector("#order_search");
    order_search.addEventListener("keyup", () => {
        clearTimeout(search);
        search = setTimeout(() => {
            let json = JSON.stringify({
                payment_id: order_search.value
            });
            ajax.open("post", "/admin/siparisler/search");
            ajax.setRequestHeader("Content-type", "application/json"),
                ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            ajax.send(json);
            ajax.onload = function() {
                let result = JSON.parse(this.responseText);
                console.log(result);
                orders_table_tbody.innerHTML = "";
                order_search_result(result);
            }
        }, 500);
    });
    let order_search_result = (json) => {
        for (let i in json.orders) {
            let order_status_badge = "";
            switch (json.orders[i].order_status) {
                case "1":
                    order_status_badge = "info"
                    break;
                case "2":
                    order_status_badge = "warning"
                    break;
                case "3":
                    order_status_badge = "primary"
                    break;
                case "4":
                    order_status_badge = "success"
                    break;
                case "5":
                    order_status_badge = "danger"
                    break;
                default:
                    break;
            }
            let tr = document.createElement("tr");
            tr.innerHTML = `
        <td><b>${json.orders[i].payment_id}</b></td>
        <td>${json.orders[i].customer_name} (${json.orders[i].customer_id})</td>
        <td>
            ${json.orders[i].order_date}
        </td>
        <td>
            ${json.orders[i].order_total} TL
        </td>
        <td>
            <span class="badge badge-pill badge-soft-${order_status_badge} font-size-12">${json.orders[i].order_status_txt}</span>
        </td>
        <td>
            <!-- Button trigger modal -->
            <button data-order_id="${json.orders[i].order_id}" id="show-detail" data-bs-toggle="modal" data-bs-target="#order-detail-modal" class="btn btn-primary btn-sm btn-rounded">
                Detayları Görüntüle
            </button>
        </td>
        <td>
            <div class="d-flex gap-3">
                <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                <button data-order_id="${json.orders[i].order_id}" id="edit-order" data-bs-toggle="modal" data-bs-target="#order-edit-modal" style="background: none;border:none;" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                <button data-order_id="${json.orders[i].order_id}" id="delete-order" style="background: none;border:none;" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></button>
            </div>
        </td>`;
            orders_table_tbody.appendChild(tr);
        }
        events();
    }
    //show detail
    events();
});