let ajax=new XMLHttpRequest;
//urldeki aktif searchi alıyor
var urlParams = new URLSearchParams(window.location.search);
//ürün listele
let itemTitle = document.querySelectorAll(".product__items--content__title");
for (let i = 0; i < itemTitle.length; i++) {
  itemTitle[i].style.height = "60px";
}
function detectMob() {
  const toMatch = [
      /Android/i,
      /webOS/i,
      /iPhone/i,
      /iPad/i,
      /iPod/i,
      /BlackBerry/i,
      /Windows Phone/i
  ];
  
  return toMatch.some((toMatchItem) => {
      return navigator.userAgent.match(toMatchItem);
  });
}
let searchsidebar;
if(!detectMob()){
  searchsidebar=document.querySelector(".shop__sidebar--widget");
}
else{
  searchsidebar=document.querySelector(".offcanvas__filter--sidebar");
}
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
///marka filtre
let brandArray=[];
let brandFilterBtn=searchsidebar.querySelector("#apply-brand-filter");
brandFilterBtn.addEventListener("click",()=>{
  if(brandArray.length>0){
    urlParams.set("brands",brandArray.join(","));
  }
  else{
    urlParams.delete("brands");
  }
  window.location.search=urlParams.toString();  
})
let queryHasBrands=false;
if(urlParams.has("brands")){
  queryHasBrands=true;
  brandArray=urlParams.get("brands").split(",");
}
let brandsButton=searchsidebar.querySelectorAll(".brand-button");
brandsButton.forEach(elem=>{
  elem.addEventListener("click",()=>{
    if(brandArray.includes(elem.dataset.brand)){
      elem.classList.remove("active-link")
      brandArray.splice(brandArray.indexOf(elem.dataset.brand),1);
    }
    else{
      elem.classList.add("active-link");
      brandArray.push(elem.dataset.brand);
    }
  })
  if(queryHasBrands==true){
    if(brandArray.includes(elem.dataset.brand)){
      elem.classList.add("active-link");
    }
  }
})

//fiyat filtre
let pricefilter = searchsidebar.querySelector("#price-filter-btn");
let endusukfiyat = searchsidebar.querySelector(".price_min");
let enyuksekfiyat = searchsidebar.querySelector(".price_max");

// queryde price filter varsa eşitliyor
if (urlParams.has("price_min")) {
  endusukfiyat.value = urlParams.get("price_min");
}
if (urlParams.has("price_max")) {
  enyuksekfiyat.value = urlParams.get("price_max");
}
pricefilter.addEventListener("click", ()=> {""
  if(endusukfiyat.value!="" && endusukfiyat.value.length>0){
    urlParams.set("price_min",endusukfiyat.value);
  }
  else{
    if(urlParams.has("price_min")){
      urlParams.delete("price_min");
    }
  }
  if(enyuksekfiyat.value!="" && enyuksekfiyat.value.length>0){
    urlParams.set("price_max",enyuksekfiyat.value);
  }
  else{
    if(urlParams.has("price_max")){
      urlParams.delete("price_max");
    }
  }
  window.location.search=urlParams.toString();
});
//en yüksek fiyat 0 olamaz
enyuksekfiyat.addEventListener("keyup", function () {
  if (this.value <= "0") {
    this.value = "";
  }
});
endusukfiyat.addEventListener("keyup", function () {
  if (this.value < "0") {
    this.value = "";
  }
});
//price filter temizleme
if (urlParams.has("price_max") || urlParams.has("price_min")) {
  let clearpricefilter = searchsidebar.querySelector(".clearpricefilter");
  clearpricefilter.addEventListener("click", function () {
    urlParams.delete("price_min");
    urlParams.delete("price_max");
    window.location.search = urlParams.toString();
  });
}


// sepete ekle

let addtocart_btn = document.querySelectorAll(".add-to-cart");

addtocart_btn.forEach(elem=>{
  elem.addEventListener("click", function () {
    add(this.dataset.product_id);
  });
})


// kategoriler
let catArray=[];
let queryHasCat=false;
if(urlParams.has("categories")){
  queryHasCat=true;
  catArray=urlParams.get("categories").split(",");
  console.log(catArray);
} 

let catButtons=searchsidebar.querySelectorAll(".widget__categories--menu__list");
catButtons.forEach(elem=>{
  if(!elem.classList.contains("has_subcat")){
    elem.addEventListener("click",()=>{
      if(!catArray.includes(elem.dataset.cat)){
        elem.classList.add("active-list");
        catArray.push(elem.dataset.cat);
      }
      else{
        elem.classList.remove("active-list");
        catArray.splice(catArray.indexOf(elem.dataset.cat),1);
      }
      console.log(catArray);
    });
    if(queryHasCat==true){
      if(catArray.includes(elem.dataset.cat)){
        elem.classList.add("active-list");
      }
    }
  }
  else{
    let subCat=elem.querySelectorAll(".widget__categories--sub__menu--list");
    subCat.forEach(sc=>{
      sc.addEventListener("click",()=>{
        if(!catArray.includes(sc.dataset.cat)){
          sc.classList.add("active-list");
          catArray.push(sc.dataset.cat);
        }
        else{
          sc.classList.remove("active-list");
          catArray.splice(catArray.indexOf(sc.dataset.cat),1);
        }
        console.log(catArray);
      });
      if(queryHasCat==true){
        if(catArray.includes(sc.dataset.cat)){
          sc.classList.add("active-list");
        }
      }
    })
  }
})
let catFilterBtn=searchsidebar.querySelector("#cat-filter-btn");
catFilterBtn.addEventListener("click",()=>{
  if(catArray.length>0){
    urlParams.set("categories",catArray.join(","));
    window.location.search=urlParams.toString();
  }
  else{
    if(urlParams.has("categories")){
      urlParams.delete("categories");
      window.location.search=urlParams.toString();
    }
  }
});

//wishlist ekleme

var wishlistbtn=document.querySelectorAll(".wishlist-add");
wishlistbtn.forEach(elem=>{
  elem.addEventListener("click",function(){
    wishlist(this.dataset.product_id,elem);
});
})


// sıralama
var sorting=document.querySelector(".sorting");
sorting.addEventListener("change",()=>{
  if(sorting.value!="suggested"){
    urlParams.set("sorting",sorting.value);
  }
  else{
    urlParams.delete("sorting");
  }
  window.location.search=urlParams.toString();
})

// ürün arama
let productSearchButton=searchsidebar.querySelector("#product-search-button");
let productSearch=searchsidebar.querySelector("#product-search");
productSearchButton.addEventListener("click",()=>{
  if(productSearch.value!=""){
    if(!urlParams.has("sp")){
      urlParams.set("sp",productSearch.value);
      window.location.search=urlParams.toString();
    }
    else{
      if(productSearch.value!=""){
        urlParams.set("sp",productSearch.value);
        window.location.search=urlParams.toString();
      }
    }
  }
});
if(urlParams.has("sp")){
  let clearsp=document.querySelector("#clear-sp");
  clearsp.addEventListener("click",()=>{
    urlParams.delete("sp");
    window.location.search=urlParams.toString();
  });
}