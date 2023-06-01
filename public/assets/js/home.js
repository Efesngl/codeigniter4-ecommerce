const ajax=new XMLHttpRequest;


function add(product_id){
  ajax.open("POST","/market/sepeteEkle");
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"),
  ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  ajax.send("product_id="+product_id);
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
function wishlist(product_id,elem){
ajax.open("POST","/market/istekListesineEkle");
ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"),
ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
ajax.send("product_id="+product_id);
ajax.onload=function(){
  let wp=elem.querySelector("#Vector");
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

//istek listesine ekle
var wishlistbtn=document.querySelectorAll(".wishlist-add");
wishlistbtn.forEach(elem=>{
  elem.addEventListener("click",function(){
    wishlist(elem.dataset.product_id,elem);
});
})

//sepete ekle
let addtocart_btn = document.querySelectorAll(".add-to-cart");
addtocart_btn.forEach(elem=>{
  elem.addEventListener("click", function () {
    add(elem.dataset.product_id);
  });
})  
  