let deleteComment=document.querySelectorAll(".delete-comment");
deleteComment.forEach(elem=>{
    elem.addEventListener("click",()=>{
        let json=JSON.stringify({ID:elem.dataset.comment_id})
        del("Yorumu silmek istediğinize emin misiniz ?",json,"/admin/urunler/yorumSil");
    })
})