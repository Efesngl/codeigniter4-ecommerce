<!doctype html>
<html lang="en">


<?php echo view("includes/head"); ?>

<body>

    <!-- Start header area -->
    <?php echo view("includes/header"); ?>
    <!-- End header area -->

    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content">
                            <h1 class="breadcrumb__content--title text-white mb-10">Hesabım</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Ana Sayfa</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Heasbım</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- my account section start -->
        <section class="my__account--section section--padding" id="address">
            <div class="container" id="address">
                <div class="my__account--section__inner border-radius-10 d-flex" id="address">
                    <div class="account__left--sidebar">
                        <h3 class="account__content--title mb-20">Hesabım</h3>
                        <ul class="account__menu">
                            <li class="account__menu--list"><a href="<?php echo base_url("hesap"); ?>">Siparişler</a></li>
                            <li class="account__menu--list active"><a href="<?php echo base_url("adresler"); ?>">Adresler</a></li>
                            <li class="account__menu--list"><a href="<?php echo base_url("istekListesi"); ?>">İstek Listesi</a></li>
                            <li class="account__menu--list"><a href="login.html">Çıkış</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="account__content--title mb-20">Adreslerim</h3>
                        <button class="new__address--btn primary__btn mb-25" id="add-new-address" type="button">Yeni adres ekle</button>
                        <div class="" id="address-container">
                            <?php
                            for ($i = 0; $i < count($address_name); $i++) :
                            ?>
                                <div class="account__wrapper" style="margin-right: 1.5rem;">
                                    <div class="account__content">
                                        <div class="account__details two">
                                            <p class="account__details--desc">
                                            <h3><?php echo $address_name[$i]; ?></h3><br>
                                            <span id="picker-firstname"><?php echo $picker_firstname[$i]; ?></span> <span id="picker-lastname"><?php echo $picker_lastname[$i]; ?></span><br>
                                            <span id="full-address"><?php echo $full_address[$i]; ?></span><br>
                                            <span id="city"><?php echo $city[$i]; ?></span>
                                            <br></p>
                                        </div>
                                        <div class="account__details--footer d-flex">
                                            <button class="account__details--footer__btn" data-address_id="<?php echo $ID[$i]; ?>" id="address-edit" type="button">Düzenle</button>
                                            <button class="account__details--footer__btn" data-address_id="<?php echo $ID[$i]; ?>" id="address-delete" type="button">Sil</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- my account section end -->

    </main>
    <div id="offcanvas-address">
        <div id="offcanvas-content-container">
            <div id="offcanvas-address-close-button">
                <i id="offcanvas-close" class="fa-solid fa-xmark fa-2xl"></i>
            </div>
            <div id="offcanvas-address-main-content">
                <h3>Adres Bilgileri</h3>
                <label>
                    <input class="account__login--input" name="address_id" id="address_id" type="hidden">
                </label>
                <label>
                    <input class="account__login--input" name="picker_firstname" id="picker_firstname" placeholder="Teslim alacak kişinin adı" type="text">
                </label>
                <label>
                    <input class="account__login--input" name="picker_lastname" id="picker_lastname" placeholder="Teslim alacak kişinin soyadı" type="text">
                </label>
                <label>
                    <input class="account__login--input" name="address_name" id="address_name" placeholder="Adres Adı" type="text">
                </label>
                <label>
                    <!-- <input class="account__login--input" name="address-il" id="address-il" placeholder="İl" type="text"> -->
                    <select class="account__login--input " name="address-il" id="address-il">
                        <option value="0">İl seçiniz</option>
                        <option value="1">Adana</option>
                        <option value="2">Adıyaman</option>
                        <option value="3">Afyonkarahisar</option>
                        <option value="4">Ağrı</option>
                        <option value="5">Amasya</option>
                        <option value="6">Ankara</option>
                        <option value="7">Antalya</option>
                        <option value="8">Artvin</option>
                        <option value="9">Aydın</option>
                        <option value="10">Balıkesir</option>
                        <option value="11">Bilecik</option>
                        <option value="12">Bingöl</option>
                        <option value="13">Bitlis</option>
                        <option value="14">Bolu</option>
                        <option value="15">Burdur</option>
                        <option value="16">Bursa</option>
                        <option value="17">Çanakkale</option>
                        <option value="18">Çankırı</option>
                        <option value="19">Çorum</option>
                        <option value="20">Denizli</option>
                        <option value="21">Diyarbakır</option>
                        <option value="22">Edirne</option>
                        <option value="23">Elazığ</option>
                        <option value="24">Erzincan</option>
                        <option value="25">Erzurum</option>
                        <option value="26">Eskişehir</option>
                        <option value="27">Gaziantep</option>
                        <option value="28">Giresun</option>
                        <option value="29">Gümüşhane</option>
                        <option value="30">Hakkâri</option>
                        <option value="31">Hatay</option>
                        <option value="32">Isparta</option>
                        <option value="33">Mersin</option>
                        <option value="34">İstanbul</option>
                        <option value="35">İzmir</option>
                        <option value="36">Kars</option>
                        <option value="37">Kastamonu</option>
                        <option value="38">Kayseri</option>
                        <option value="39">Kırklareli</option>
                        <option value="40">Kırşehir</option>
                        <option value="41">Kocaeli</option>
                        <option value="42">Konya</option>
                        <option value="43">Kütahya</option>
                        <option value="44">Malatya</option>
                        <option value="45">Manisa</option>
                        <option value="46">Kahramanmaraş</option>
                        <option value="47">Mardin</option>
                        <option value="48">Muğla</option>
                        <option value="49">Muş</option>
                        <option value="50">Nevşehir</option>
                        <option value="51">Niğde</option>
                        <option value="52">Ordu</option>
                        <option value="53">Rize</option>
                        <option value="54">Sakarya</option>
                        <option value="55">Samsun</option>
                        <option value="56">Siirt</option>
                        <option value="57">Sinop</option>
                        <option value="58">Sivas</option>
                        <option value="59">Tekirdağ</option>
                        <option value="60">Tokat</option>
                        <option value="61">Trabzon</option>
                        <option value="62">Tunceli</option>
                        <option value="63">Şanlıurfa</option>
                        <option value="64">Uşak</option>
                        <option value="65">Van</option>
                        <option value="66">Yozgat</option>
                        <option value="67">Zonguldak</option>
                        <option value="68">Aksaray</option>
                        <option value="69">Bayburt</option>
                        <option value="70">Karaman</option>
                        <option value="71">Kırıkkale</option>
                        <option value="72">Batman</option>
                        <option value="73">Şırnak</option>
                        <option value="74">Bartın</option>
                        <option value="75">Ardahan</option>
                        <option value="76">Iğdır</option>
                        <option value="77">Yalova</option>
                        <option value="78">Karabük</option>
                        <option value="79">Kilis</option>
                        <option value="80">Osmaniye</option>
                        <option value="81">Düzce</option>
                    </select>
                </label>
                <label>
                    <input class="account__login--input" id="full_address" name="full_address" placeholder="Adres" type="text">
                </label>
                <label>
                    <input class="account__login--input" id="phone_number" name="phone_number" placeholder="Telefon Numarası" type="text">
                </label>
                <label>
                    <button class="account__login--btn primary__btn mb-10" id="address-submit" type="submit"><span id="add-address-text" style="transition:200ms;">Kaydet</span>
                        <span class="add-address-icon" id="add-address-spinner"><i class="fa-solid fa-spin fa-spinner"></i></span>
                        <span class="add-address-icon" id="add-address-success"><i class="fa-regular fa-circle-check"></i></span>
                    </button>
                </label>
            </div>
        </div>
    </div>

    <!-- Start footer section -->
    <?php echo view("includes/footer"); ?>
    <!-- End footer section -->

    <?php echo view("includes/scripts"); ?>
    <script>
        let accountWrapper = document.querySelectorAll(".account__content");
        let addressContainer = document.querySelector("#address.my__account--section");
        accountWrapperRow = accountWrapper.length / 4;
        addressContainer.style.height = "calc(285px * " + accountWrapperRow + ") + 300px";
        let ajax = new XMLHttpRequest();
        let addressInputs = [
            "address_id",
            "picker_firstname",
            "picker_lastname",
            "address_name",
            "full_address",
            "phone_number"
        ];
        let addressIlSelect = document.querySelector("#address-il");
        let offCanvasContainer = document.querySelector("#offcanvas-content-container");
        let offCanvas = document.querySelector("#offcanvas-address");
        let addAddressButton = document.querySelector("#add-new-address");
        let offcanvasClose = document.querySelector("#offcanvas-close");

        let addAddress = document.querySelector("#address-submit");
        let addressDelete = document.querySelectorAll("#address-delete");
        let addressEdit = document.querySelectorAll("#address-edit");

        const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
        addAddressButton.addEventListener("click", () => {
            if (isMobile) {
                document.body.classList.add("oc-open");
                offCanvas.style.display = "block";
                setTimeout(() => {
                    offCanvasContainer.style.width = "100%";
                }, 100);
            } else {
                document.body.classList.add("oc-open");
                offCanvas.style.display = "block";
                setTimeout(() => {
                    offCanvasContainer.style.width = "30%";
                }, 100);

            }
        })


        offcanvasClose.addEventListener("click", offCanvasClose);
        //add address
        addAddress.addEventListener("click", () => {
            if (checkInputs()) {
                if (addressIlSelect.value != 0) {
                    spinner(false);
                    let data = {
                        city: addressIlSelect.value
                    };
                    for (let i = 0; i < addressInputs.length; i++) {
                        data[addressInputs[i]] = document.querySelector("#" + addressInputs[i]).value;
                    }
                    ajax.open("POST", "adresEkle");
                    ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                    ajax.setRequestHeader("Content-type", "application/json");
                    ajax.send(JSON.stringify(data))
                    ajax.onload = function() {
                        if (this.responseText == 1) {
                            spinner(false);
                            setTimeout(() => {
                                spinner(true);
                                setTimeout(() => {
                                    location.reload();
                                }, 500);
                            }, 300);
                        }
                    }

                } else {
                    alert("Zorunlu alanları doldurunuz !")
                }
            } else {
                alert("Zorunlu alanları doldurunuz !")
            }
        })

        //delete address
        addressDelete.forEach(elem => {
            elem.addEventListener("click", () => {
                Swal.fire({
                    title: "Dikkat !",
                    text: "Adresi Silmek istediğinize emin misiniz ?",
                    icon: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Hayır",
                    confirmButtonText: "Evet"
                }).then((result) => {
                    if (result.isConfirmed) {
                        ajax.open("POST", "adresSil");
                        ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        ajax.send("address=" + elem.dataset.address_id);
                        ajax.onload = function() {
                            if (this.responseText == 1) {
                                elem.parentElement.parentElement.parentElement.style.display = "none";
                                Swal.fire({
                                    icon: "success",
                                    title: "Başarılı ! ",
                                    text: "Adres başarıyla silindi.",
                                    confirmButtonText: "Tamam"
                                })
                            }
                        }
                    }
                })
            })
        })
        //edit address
        addressEdit.forEach(elem => {
            elem.addEventListener("click", () => {
                if (isMobile) {
                    /* your code here */
                    document.body.classList.add("oc-open");
                    offCanvas.style.display = "block";
                    setTimeout(() => {
                        offCanvasContainer.style.width = "100%";
                    }, 100);

                } else {
                    document.body.classList.add("oc-open");
                    offCanvas.style.display = "block";
                    setTimeout(() => {
                        offCanvasContainer.style.width = "30%";
                    }, 100);
                }
                console.log(elem.dataset.address_id)
                ajax.open("post", "adresbilgisi");
                ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                ajax.send("ID=" + elem.dataset.address_id);
                ajax.onload = function() {
                    let addressInfo = JSON.parse(this.responseText);
                    addressIlSelect.value = addressInfo["city"];
                    for (let i = 0; i < addressInputs.length; i++) {
                        if(addressInputs[i]=="address_id"){
                            document.querySelector("#"+addressInputs[i]).value=elem.dataset.address_id;
                            continue;
                        }
                        document.querySelector("#" + addressInputs[i]).value = addressInfo[addressInputs[i]];
                    }
                }
            });
        })

        function spinner(status) {
            let Text = document.querySelector("#add-address-text");
            let Spinner = document.querySelector("#add-address-spinner");
            let Success = document.querySelector("#add-address-success");
            if (status == false) {
                if (getComputedStyle(Text)["display"] == "inline-block") {
                    Text.style.opacity = "0";
                    setTimeout(() => {
                        Text.style.display = "none";
                        Spinner.style.opacity = "1";
                        Spinner.style.display = "inline-block";
                    }, 200);
                } else {
                    Spinner.style.opacity = "0";
                    setTimeout(() => {
                        Text.style.display = "inline-block";
                        Text.style.opacity = "1";
                        Spinner.style.display = "none";
                    }, 200);
                }
            } else {
                Spinner.style.opacity = "0";
                setTimeout(() => {
                    Spinner.style.display = "none";
                    Success.style.opacity = "1";
                    Success.style.display = "inline-block";
                    setTimeout(() => {
                        offCanvasClose();
                    }, 200);
                }, 200);
            }
        }

        function checkInputs() {
            for (let i = 0; i < addressInputs.length; i++) {
                if(addressInputs[i]=="address_id"){
                    continue;
                }
                if (document.querySelector("#" + addressInputs[i]).value == "") {
                    return false;
                }
            }
            return true;
        }

        function offCanvasClose() {
            document.body.classList.remove("oc-open");
            offCanvasContainer.style.width = "0%";
            setTimeout(() => {
                offCanvas.style.display = "none";
            }, 150);
        }
    </script>
</body>

</html>