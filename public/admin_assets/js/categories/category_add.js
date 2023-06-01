let addCat=document.querySelector("#add-cat");
addCat.addEventListener("click",()=>{
    let json=JSON.stringify({
        category:document.querySelector("#cat-name").value,
        parent_id:document.querySelector("#subcat").value
    });
    add(json,"/admin/kategoriler/categoryAdd","/admin/kategoriler")
});