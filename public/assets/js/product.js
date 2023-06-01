const ajax=new XMLHttpRequest;
let product_name=document.querySelector("#product-name").innerHTML;
let quantity=document.querySelector("#quantity");
let addToChart=document.querySelector("#add-to-cart");
let addToWishlist=document.querySelector("#add-to-wishlist");
let starCb=document.querySelectorAll(".star-cb");
let deleteProductComment=document.querySelector(".delete-product-comment");
if(deleteProductComment!=null){
  deleteProductComment.addEventListener("click",()=>{
    ajax.open("post","/yorumSil");
    ajax.setRequestHeader("X-Requested-With","XMLHttpRequest");
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("product_name="+product_name);
    ajax.onload=function(){
      console.log(this.responseText); 
    };
  });
}
starCb.forEach(elem =>{
  elem.addEventListener("click",(e)=>{
    let id=elem.getAttribute("ID").slice(-1);
    console.log(id);
    if(elem.checked==true){
      for(let i=1;i<=id;i++){
        document.querySelector("#star-cb"+i).checked=true;
      }
    }
    else{
      e.preventDefault();
      for(let i=id;i<=5;++i){
        document.querySelector("#star-cb"+i).checked=false;
      }
    }
  });
})
function add(product_name){
    ajax.open("POST","/market/sepeteEkle");
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"),
    ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    ajax.send("product_name="+product_name+"&quantity="+quantity.value);
    ajax.onload=function(){
      let response=JSON.parse(this.responseText)
      if(response["response"]==1){
        Swal.fire({
          toast: true,
          position:"top-end",
          icon: 'success',
          title: "Sepete Başarıyla Eklendi",
          showConfirmButton:false,
          timer:1000,
          timerProgressBar:true,
          background:"#1abc9c",
          color:"#fff",
          iconColor:"white"
        }).then(()=>{
          document.querySelector(".cart_count").innerText=response["cart_count"]; 
        })
      }
      else{
        Swal.fire({
          toast: true,
          position:"top-end",
          icon: 'error',
          title: "Ürün sepete eklenemedi",
          showConfirmButton:false,
          timer:1000,
          timerProgressBar:true,
          background:"#e74c3c",
          color:"#fff",
          iconColor:"white"
        })
      }
    }
  }
function wishlist(product_name){
  ajax.open("POST","/market/istekListesineEkle");
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"),
  ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  ajax.send("product_name="+product_name);
  ajax.onload=function(){
    let wp=document.querySelector("#wishlist-path");
    let response=JSON.parse(this.responseText)
    if(response["status"]==1){
      wp.setAttribute("style","fill:red;stroke:red")
    }
    else if(response["status"]==2){
      wp.setAttribute("style","fill:none;stroke:currentColor");
    }
    else{
      Swal.fire({
        toast: true,
        position:"top-end",
        icon: 'error',
        title: "İstek listesine eklenemedi",
        showConfirmButton:false,
        timer:1000,
        timerProgressBar:true,
        background:"#e74c3c",
        color:"#fff",
        iconColor:"white"
      })
    }
  }
}
addToChart.addEventListener("click",()=>{
    add(product_name);
})
addToWishlist.addEventListener("click",()=>{
  wishlist(product_name);
});