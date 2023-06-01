let editSocial=document.querySelector("#edit-social");
editSocial.addEventListener("click",()=>{
    let json=JSON.stringify({
        facebook:document.querySelector("#facebook").value,
        instagram:document.querySelector("#instagram").value,
        twitter:document.querySelector("#twitter").value,
        youtube:document.querySelector("#youtube").value,
        tiktok:document.querySelector("#tiktok").value,
    })
    update(json,"/admin/sosyalmedya/guncelle",()=>{location.reload()});
})