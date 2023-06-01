window.addEventListener("load",()=>{
    let dp=document.querySelector(".discount-price-check");
        let dpv=document.querySelector(".discount-price-value");
        if(dp.checked){
            dpv.style.display="block";
        }
        dp.addEventListener("change",()=>{
            if(dp.checked){
                dpv.style.display="block";
            }
            else{
                if(dpv.style.display=="block"){
                    dpv.style.display="none";
                }
            }
        });
});
let addProduct=document.querySelector("#add-product");
addProduct.addEventListener("click",()=>{
    let json={
        product_name:document.querySelector("#product-name").value,
        product_price:document.querySelector("#product-price").value,
        product_brand:document.querySelector("#product-brand").value,
        product_category:document.querySelector("#product-category").value,
        product_color:document.querySelector("#product-color").value,
        product_status:document.querySelector("#stock").checked,
        is_discounted:document.querySelector("#is-discounted").checked,
        is_new:document.querySelector("#is-new").checked,
    }
    if(document.querySelector("#is-discounted").checked){
        json["discounted_price"]=document.querySelector("#discounted-price").value;
    }
    add(JSON.stringify(json),"/admin/urunler/addproduct","/admin/urunler");
});