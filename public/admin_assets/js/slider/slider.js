const ajax=new XMLHttpRequest();
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
elems.forEach(elem=> {
    var switchery = new Switchery(elem, {
        color: "#556ee6"
    });
    elem.addEventListener("change",function(){
        let json=JSON.stringify({
            ID:elem.dataset.slider_id,
            is_active:elem.checked
        });
        ajax.open("post","/admin/slider/is_active");
        ajax.setRequestHeader("Content-type","applicaton/json");
        ajax.setRequestHeader("X-Requested-With","XMLHttpRequest");
        ajax.send(json);
    });
});
let sliderDeleteButtons=document.querySelectorAll(".slider-delete");
sliderDeleteButtons.forEach(elem=>{
    elem.addEventListener("click",()=>{
        let json=JSON.stringify({
            ID:elem.dataset.slider_id
        })
        del("Bu slideri silmek istediğinze emin misiniz ?",json,"/admin/slider/sil")
    })
})