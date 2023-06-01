let addBrand=document.querySelector("#add-brand");
addBrand.addEventListener("click",()=>{
    json=JSON.stringify({
        brand:document.querySelector("#brand").value
    });
    add(json,"/admin/markalar/addBrand","/admin/markalar");
});