let discount_type_buttons=document.querySelectorAll(".discount_type");
let discount_amount=document.querySelector("#discount_amount");
discount_type_buttons.forEach(elem=>{
    elem.addEventListener("click",()=>{
        let value=elem.value;
        if(elem.value=="1"){
            discount_amount.innerText="%";
        }
        else{
            discount_amount.innerText="TL";
        }
    });
})
let addDiscount=document.querySelector("#add-discount");
addDiscount.addEventListener("click",()=>{
    let discount_type1=document.querySelector("#discount_type1");
    let json={
        code:document.querySelector("#code").value,
        discount:document.querySelector("#discount").value,
        min_total:document.querySelector("#min-total").value,
        discount_type:discount_type1.value,
        is_active:1
    };
    if(!discount_type1.checked){
        json.discount_type=document.querySelector("#discount_type2").value;
    }
    add(JSON.stringify(json),"/admin/indirimler/add","/admin/indirimler")
});