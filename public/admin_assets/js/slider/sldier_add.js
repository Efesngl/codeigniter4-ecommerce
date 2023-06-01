tinymce.init({
    selector: 'textarea',
    plugins: 'advlist autolink lists link image charmap preview anchor pagebreak save',
    toolbar_mode: 'floating save',
    language: "tr",
    hidden_input: false
});
const ajax = new XMLHttpRequest();
let sliderForm = document.forms.namedItem("add-slider-form");
sliderForm.addEventListener("submit", (event) => {
    tinymce.triggerSave();
    event.preventDefault();
    console.log("form submitted");
    let formdata = new FormData(sliderForm);
    ajax.open("post", "/admin/slider/add");
    ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    ajax.send(formdata);
    ajax.onload = function() {
        console.log(this.responseText);
        if (this.responseText == 1) {
            Swal.fire({
                title: "Ekleme işlemi başarılı",
                icon: "success",
                confirmButtonText: "Tamam"
            }).then(() => location.href = "/admin/slider")
        } else {
            let options = {
                title: "Ekleme işlemi başarısız",
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

})