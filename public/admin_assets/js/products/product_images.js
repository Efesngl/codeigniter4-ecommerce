              // Note that the name "myDropzone" is the camelized
            // id of the form.
            Dropzone.options.imageForm = {
                clickable:true,
                acceptedFiles:"image/*",
                // Configuration options go here
            };
            let image_delete=document.querySelectorAll(".image-delete");
            image_delete.forEach(elem=>{
                json=JSON.stringify({ID:elem.dataset.image_id})
               elem.addEventListener("click",()=>{
                del("Bu resimi silmek istediğinize emin misiniz",json,"/admin/urunler/resimSil")
               });
            })
            let ajax=new XMLHttpRequest();
            let mainSwitch=document.querySelectorAll(".main-switch")
            mainSwitch.forEach(elem=>{
                elem.addEventListener("click",()=>{
                    let json=JSON.stringify({
                        ID:elem.dataset.image_id,
                        checked:elem.checked
                    })
                    ajax.open("post","/admin/urunler/imageswitch")
                    ajax.setRequestHeader("Content-Type","application/json");
                    ajax.setRequestHeader("X-Requested-With","XMLHttpRequest");
                    ajax.send(json);
                })
            })