//delete product func
const deleteProduct = () => {
    let delete_product = document.querySelectorAll("#delete-product");
    delete_product.forEach(elem => {
        elem.addEventListener("click", () => {
            json=JSON.stringify({ID:elem.dataset.product_id})
            del("Bu ürünü silmek istediğinize emin misiniz ?",json,"/admin/urunler/sil");
        })
    });
}



const ajax = new XMLHttpRequest();
//product search
let products_body = document.querySelector("#products");
let products_body_inner = document.querySelector("#products").innerHTML;
let product_search = document.querySelector("#product_search");
let timer = setTimeout(() => {}, 0);

product_search.addEventListener("keyup", () => {
    clearTimeout(timer);
    let ps = product_search.value;
    timer = setTimeout(() => {
        if (ps.replace(/\s/g, '').length != 0) {
            ajax.open("POST", "/admin/urunler/search");
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            ajax.send("ps=" + ps);
            ajax.onload = function() {
                products_body.innerHTML = "";
                let result = JSON.parse(this.responseText);
                for (let p in result.products) {
                    let product = result.products[p];
                    let mainDiv = document.createElement("div");
                    mainDiv.setAttribute("class", "col-xl-3 col-4 product");
                    let card = document.createElement("div");
                    card.setAttribute("class", "card");
                    let productImage = document.createElement("img");
                    productImage.setAttribute("src", "/" + product["product_image"]);
                    productImage.setAttribute("class", "card-img-top");
                    productImage.setAttribute("alt", "...");
                    productImage.setAttribute("style", "width:100%;height:100%;");
                    card.appendChild(productImage);
                    let cardBody = document.createElement("div");
                    cardBody.innerHTML = `
                        <div class="card-body text-center">
                            <h5 class="card-title">${product["product_name"]}</h5>
                            <a href="/admin/urunler/duzenle/${product["ID"]}" class="btn btn-primary">Düzenle</a>
                            <button data-product_id="${product["ID"]}" id="delete-product" class="btn btn-danger">Sil</button>
                            <a href="/admin/urunler/resimler/${product["ID"]}" class="btn btn-warning">Resimler</a>
                            <br>    
                            <a href="/admin/urunler/urunYorumlari/${product["ID"]}" class="btn btn-info mt-1">Ürün yorumları</a>
                        </div>`;
                    card.appendChild(cardBody);
                    mainDiv.appendChild(card);
                    products.appendChild(mainDiv);
                }
                deleteProduct();
            }
        } else {
            products_body.innerHTML = products_body_inner;
        }
    }, 500);
})
//product delete
deleteProduct();