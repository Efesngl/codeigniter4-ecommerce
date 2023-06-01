console.log("admin scripts loaded");
let adminAjax=new XMLHttpRequest();
function del(deleteText,json,url){
    Swal.fire({
        title: 'Bu işlem geri alınamayacktır !',
        text: deleteText,
        icon: 'warning',
        showDenyButton: true,
        confirmButtonText: 'Evet',
        denyButtonText: "Hayır",
    }).then((result) => {
        if (result.isConfirmed) {
            adminAjax.open("post",`${url}`);
            adminAjax.setRequestHeader("Content-type","application/json");
            adminAjax.setRequestHeader("X-Requested-With","XMLHttpRequest");
            adminAjax.send(json);
            adminAjax.onload=function(){
                if (this.responseText == 1) {
                    Swal.fire({
                        title: "Silme işlemi başarılı",
                        icon: "success",
                        confirmButtonText: "Tamam"
                    }).then(() => location.reload())
                } else {
                    Swal.fire({
                        title: "Silme işlemi başarısız",
                        icon: "error",
                        confirmButtonText: "Tamam"
                    })
                }
            }
        }
    })
}
function add(json,url,returnUrl){
    adminAjax.open("post",`${url}`);
    adminAjax.setRequestHeader("Content-type","application/json");
    adminAjax.setRequestHeader("X-Requested-With","XMLHttpRequest");
    adminAjax.send(json);
    adminAjax.onload=function(){
        if (this.responseText == 1) {
            Swal.fire({
                title: "Ekleme işlemi başarılı",
                icon: "success",
                confirmButtonText: "Tamam"
            }).then(() => location.href=returnUrl)
        } else {
            let options={
                title: "Ekleme işlemi başarısız",
                icon: "error",
                confirmButtonText: "Tamam"
            }
            let response=JSON.parse(this.responseText)
            if(response.error_message!=undefined){
                options.title=response.error_message;
            }
            Swal.fire(options)
        }
    }
}
function update(json,url,returnUrl){
    adminAjax.open("post",`${url}`);
    adminAjax.setRequestHeader("Content-type","application/json");
    adminAjax.setRequestHeader("X-Requested-With","XMLHttpRequest");
    adminAjax.send(json);
    adminAjax.onload=function(){
        if (this.responseText == 1) {
            Swal.fire({
                title: "Güncelleme işlemi başarılı",
                icon: "success",
                confirmButtonText: "Tamam"
            }).then(returnUrl)
        } else {
            Swal.fire({
                title: "Güncelleme işlemi başarısız",
                icon: "error",
                confirmButtonText: "Tamam"
            })
        }
    }
}
function search(json,url,searchFunction){
    adminAjax.open("POST", url);
    adminAjax.setRequestHeader("Content-type", "application/json");
    adminAjax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    adminAjax.send(json);
    adminAjax.onload = function() {
        let result=JSON.parse(this.responseText);
        searchFunction(result)
    }
}
