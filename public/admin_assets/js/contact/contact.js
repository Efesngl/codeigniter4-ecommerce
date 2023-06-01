let editContactInfo=document.querySelector("#edit-contact");
editContactInfo.addEventListener("click",()=>{
    let json=JSON.stringify({
        phone_number:document.querySelector("#phone-number-1").value,
        phone_number2:document.querySelector("#phone-number-2").value,
        email:document.querySelector("#email").value,
        google_maps:document.querySelector("#google-maps").value,
        address:document.querySelector("#address").value,
    })
    update(json,"/admin/iletisimbilgileri/guncelle",()=>{location.reload()});
})