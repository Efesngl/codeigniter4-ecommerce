let show_pswd = document.querySelector("#show-password");
let passwd = document.querySelector("#password");
show_pswd.addEventListener("click", () => {
    if (passwd.getAttribute("type") == "password") {
        show_pswd.innerHTML = "<i class='fa-solid fa-eye-slash'></i>";
        passwd.setAttribute("type", "text");
    } else {
        show_pswd.innerHTML = "<i class='fa-solid fa-eye'></i>";
        passwd.setAttribute("type", "password");
    }
});
let editCustomer=document.querySelector("#edit-customer");
editCustomer.addEventListener("click",()=>{
    let json=JSON.stringify({
        ID:editCustomer.dataset.customer_id,
        customer:{
            first_name:document.querySelector("#first-name").value,
            last_name:document.querySelector("#last-name").value,
            email:document.querySelector("#email").value,
            password:document.querySelector("#password").value,
        }
    })
    update(json,"/admin/musteriler/edit",()=>{location.href="/admin/musteriler"});
})
let editAddress=document.querySelector("#edit-address");
editAddress.addEventListener("click",()=>{
    let i=editAddress.dataset.i;
    let addressForm=document.querySelector(`#collapse${i}`)
    let json=JSON.stringify({
        ID:editAddress.dataset.address_id,
        address:{
            address_name:addressForm.querySelector("#address-name").value,
            city:addressForm.querySelector("#city").value,
            phone_number:addressForm.querySelector("#phone-number").value,
            picker_first_name:addressForm.querySelector("#picker_first_name").value,
            picker_last_name:addressForm.querySelector("#picker_last_name").value,
            full_address:addressForm.querySelector("#full-address").value,
        }
    })
    update(json,"/admin/musteriler/address",()=>{location.href="/admin/musteriler"})
})