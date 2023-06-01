document.body.onload = () => {
    let submit = document.querySelector("#submit");
    submit.addEventListener("click", (e) => {
        tinymce.activeEditor.uploadImages().then(() => {
            document.forms[0].submit();
        });
    })
    let dp = document.querySelector(".discount-price-check");
    let dpv = document.querySelector(".discount-price-value");
    if (dp.checked) {
        dpv.style.display = "block";
    }
    dp.addEventListener("change", () => {
        if (dp.checked) {
            dpv.style.display = "block";
        } else {
            if (dpv.style.display == "block") {
                dpv.style.display = "none";
            }
        }
    });
}
tinymce.init({
    selector: "#product-desc",
    images_upload_url: "/admin/urunler/productDescImage",
    language:"tr",
    plugins: 'visualblocks',
});