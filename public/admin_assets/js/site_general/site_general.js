let ajax = new XMLHttpRequest();
let editSiteGeneral = document.querySelector("#edit-site-general");
editSiteGeneral.addEventListener("click", (event) => {
    event.preventDefault();
    let formdata = new FormData(document.forms.namedItem("site-general-form"));
    console.log(formdata);
    ajax.open("post", "siteayarlari/guncelle");
    ajax.setRequestHeader("X-Requested_With", "XMLHttpRequest");
    ajax.send(formdata);
    ajax.onload = function() {
        if (this.responseText == 1) {
            Swal.fire({
                title: "Güncelleme işlemi başarılı",
                icon: "success",
                confirmButtonText: "Tamam"
            }).then(() => location.reload())
        } else {
            let options = {
                title: "Güncelleme işlemi başarısız",
                icon: "error",
                confirmButtonText: "Tamam"
            }
            let response = JSON.parse(this.responseText)
            if (response.error_message != undefined) {
                options.title = response.error_message;
            }
            Swal.fire(options)
        }
    }
});