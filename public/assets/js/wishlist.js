let wishlistRemove=document.querySelectorAll("#wishlist-remove");
let wishlistAddToChart=document.querySelectorAll("#wishlist-add-to-chart");
let ajax=new XMLHttpRequest();

wishlistRemove.forEach(elem=>{
  elem.addEventListener("click",()=>{
    ajax.open("post","istekListesi/istekListesindenKaldir");
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"),
    ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    ajax.send("product_id="+elem.dataset.product_id);
    ajax.onload=function(){
      if(this.responseText=1){
        Swal.fire({
          toast: true,
          position:"top-end",
          icon: 'success',
          title: "Ürün başarıyla kaldırıldı",
          showConfirmButton:false,
          timer:1000,
          timerProgressBar:true,
          background:"#1abc9c",
          color:"#fff",
          iconColor:"white"
        })
        elem.parentElement.parentElement.parentElement.remove();
      }
      else{
        Swal.fire({
          toast: true,
          position:"top-end",
          icon: 'error',
          title: "Ürün kaldırma başarısız !",
          showConfirmButton:false,
          timer:1000,
          timerProgressBar:true,
          background:"#e74c3c",
          color:"#fff",
          iconColor:"white"
        })
      }
    };
  });
})

wishlistAddToChart.forEach(elem=>{
  elem.addEventListener("click",(event)=>{
    event.preventDefault();
    ajax.open("post","istekListesi/sepeteEkle");
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"),
    ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    ajax.send("product_id="+elem.dataset.product_id);
    ajax.onload=function(){
      let response=JSON.parse(this.responseText);
      if(response["response"]==1){
        Swal.fire({
          toast: true,
          position:"top-end",
          icon: 'success',
          title: "Ürün başarıyla sepete eklendi",
          showConfirmButton:false,
          timer:2000,
          timerProgressBar:true,
          background:"#1abc9c",
          color:"#fff",
          iconColor:"white"
        })
        document.querySelector(".cart_count").innerText=response["cart_count"];
      }
      else{
        Swal.fire({
          toast: true,
          position:"top-end",
          icon: 'error',
          title: "Ürün sepete eklenemedi !",
          showConfirmButton:false,
          timer:2000,
          timerProgressBar:true,
          background:"#e74c3c",
          color:"#fff",
          iconColor:"white"
        })
      }
    }
  })
})