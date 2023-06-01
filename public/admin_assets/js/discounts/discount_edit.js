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