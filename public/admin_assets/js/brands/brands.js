let ajax=new XMLHttpRequest();
function deleteBrand(){
    let deleteBrandButton=document.querySelectorAll(".delete-brand");
    deleteBrandButton.forEach(elem=>{
        elem.addEventListener("click",()=>{
            let json=JSON.stringify({ID:elem.dataset.brand_id});
            del("Bu markayı silmek istediğinize emin misiniz ?",json,"/admin/markalar/sil");
        })
    })
}
//brand search
function createResult(result){
    brands_table_body.innerHTML = "";
    for (const key in result["brands"]) {
        let tr = document.createElement("tr");
        tr.innerHTML = `<td>${result["brands"][key]["brand"]}</td>
                        <td>
                            <a href="/admin/markalar/markaDuzenle/${result["brands"][key]["ID"]}" class="btn btn-warning">Düzenle</a>
                            <button data-brand_id=" ${result["brands"][key]["ID"]} " class="btn btn-danger delete-brand">Sil</a>
                        </td>`;
        brands_table_body.appendChild(tr);
    }
    deleteBrand();
}
let brands_table_body = document.querySelector("#brands_table_body");
let brands_table_body_innerhtml = document.querySelector("#brands_table_body").innerHTML;
let brand_search = document.querySelector("#brand_search");
let timer=setTimeout(() => {}, 0);
brand_search.addEventListener("keyup", () => {
    clearTimeout(timer);
    timer=setTimeout(() => {
        let bs = brand_search.value;
        if (bs.replace(/\s/g, '').length != 0) {
            let json=JSON.stringify({
                brand:bs
            })
            search(json,"/admin/markalar/search",createResult);
        } else {
            brands_table_body.innerHTML=brands_table_body_innerhtml;
        }
    }, 300);
})
deleteBrand();