window.addEventListener("load", () => {
  console.log("doc load");
  let checkoutInfo = document.querySelector("#checkout-info");
  if (checkoutInfo != null) {
    let cc_month = document.querySelector("#card_expire_month");
    let cc_year = document.querySelector("#card_expire_year");
    // cc_month.selectedIndex = -1;
    // cc_year.selectedIndex = -1;
    let cc_year_clone = cc_year.cloneNode(true);
    cc_month.addEventListener("change", () => {
      const d = new Date();
      const y = String(d.getFullYear()).substr(2, 2);
      if (parseInt(cc_month.value) < d.getMonth() + 1) {
        for (let i = 0; i < cc_year.length; i++) {
          if (cc_year.options[0].value <= y) {
            cc_year.options[0].remove();
          }
        }
      } else {
        cc_year.innerHTML = cc_year_clone.innerHTML;
      }
    });
    let discountedData = {};
    let ajax = new XMLHttpRequest();
    let discountInput = document.querySelector("#discount");
    let submitDiscount = document.querySelector("#submit-discount");
    let addresses = document.querySelector("#addresses");
    let submit_cart = document.querySelector(".checkout__now--btn");
    let cc_holder = document.getElementById("card_holder");
    let cc_number = document.getElementById("card_number");
    let cc_expire_month = document.getElementById("card_expire_month");
    let cc_expire_year = document.getElementById("card_expire_year");
    let cvv = document.getElementById("cvv");

    //discount ayarla
    submitDiscount.addEventListener("click", () => {
      if (discountInput.value.replace(/\s/g, "").length != 0) {
        ajax.open("post", "indirimKodu");
        ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        ajax.setRequestHeader(
          "Content-Type",
          "application/x-www-form-urlencoded"
        );
        ajax.send("dc=" + discountInput.value);
        ajax.onload = function () {
          console.log(JSON.parse(this.responseText));
          if (this.responseText != "invalid code") {
            discountedData = JSON.parse(this.responseText);
            document.querySelector("#total").innerHTML = Intl.NumberFormat(
              "tr-TR",
              { currency: "TRY", minimumFractionDigits: "2" }
            ).format(discountedData["cart_sum"]);
            document.querySelector("#subtotal").style.textDecoration =
              "line-through";
            document.querySelector("#subtotal").style.opacity = "0.5";
            let productPrices = document.querySelectorAll(
              ".cart__table--body__items"
            );
            productPrices.forEach((elem) => {
              elem.querySelector(".cart-product-price").innerHTML =
                Intl.NumberFormat("tr-TR", {
                  currency: "TRY",
                  minimumFractionDigits: "2",
                }).format(
                  discountedData["products"][elem.dataset.product_id][
                    "discounted_price"
                  ]
                );
            });
            let removeDiscount = document.querySelector("#remove-discount");
            removeDiscount.style.display = "block";
            removeDiscount.querySelector("#discount-code").innerHTML =
              discountedData["used_discount_code"];
            setTimeout(() => {
              removeDiscount.style.opacity = "1";
            }, 300);
          } else {
            Swal.fire({
              toast: true,
              position: "top-end",
              icon: "error",
              title: "Geçersiz indirim kodu",
              showConfirmButton: false,
              timer: 1000,
              timerProgressBar: true,
              background: "#e74c3c",
              color: "#fff",
              iconColor: "white",
            });
          }
        };
      }
    });
    let removeDiscountButton = document.querySelector(
      "#remove-discount-button"
    );
    removeDiscountButton.addEventListener("click", () => {
      window.location.reload();
    });

    //sepeti onayla
    submit_cart.addEventListener("click", function () {
      let data = {
        card_holder: cc_holder.value,
        card_number: cc_number.value,
        card_month:
          cc_expire_month.options[cc_expire_month.selectedIndex].value,
        card_year: cc_expire_year.options[cc_expire_year.selectedIndex].value,
        cvc: cvv.value,
        address_id: addresses.value,
      };
      if (discountInput.value.replace(/\s/g, "").length != 0) {
        data["discountedData"] = discountedData;
      }
      document.querySelector("#checkout-text").style.display = "none";
      document.querySelector("#checkout-loading").style.display = "block";
      ajax.open("post", "/sepet/odemeYap");
      ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
      ajax.setRequestHeader("Content-Type", "application/json");
      ajax.send(JSON.stringify(data));
      ajax.onload = function () {
        console.log(this.responseText);
        if (this.responseText == "success") {
          location.href = "odemeSonuc/1";
        } else {
          location.href = "odemeSonuc/2";
        }
      };
    });
    //check cc
    let card_number = document.querySelector("#card_number");
    card_number.addEventListener("keyup", function () {
      if (cc_number.value.length == 16) {
        submit_cart.classList.remove("disabled-btn");
      } else {
        if (submit_cart.classList.contains("disabled-btn")) {
        } else {
          submit_cart.classList.add("disabled-btn");
        }
      }
    });
  } else {
    let ajax=new XMLHttpRequest();
    //add address
    let addAddressButton = document.querySelector("#add-new-address");
    let offcanvasClose = document.querySelector("#offcanvas-close");
    let addAddress = document.querySelector("#address-submit");
    let addressIlSelect = document.querySelector("#address-il");
    let offCanvasContainer = document.querySelector(
      "#offcanvas-content-container"
    );
    let offCanvas = document.querySelector("#offcanvas-address");
    let addressInputs = [
      "address_id",
      "picker_firstname",
      "picker_lastname",
      "address_name",
      "full_address",
      "phone_number",
    ];
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
    });
    addAddress.addEventListener("click", () => {
      if (checkInputs()) {
        if (addressIlSelect.value != 0) {
          spinner(false);
          let data = {
            city: addressIlSelect.value,
          };
          for (let i = 0; i < addressInputs.length; i++) {
            data[addressInputs[i]] = document.querySelector(
              "#" + addressInputs[i]
            ).value;
          }
          ajax.open("POST", "/hesap/adresEkle");
          ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
          ajax.setRequestHeader("Content-type", "application/json");
          ajax.send(JSON.stringify(data));
          ajax.onload = function () {
            if (this.responseText == 1) {
              spinner(false);
              setTimeout(() => {
                spinner(true);
                setTimeout(() => {
                  location.reload();
                }, 500);
              }, 300);
            }
          };
        } else {
          alert("Zorunlu alanları doldurunuz !");
        }
      } else {
        alert("Zorunlu alanları doldurunuz !");
      }
    });
    offcanvasClose.addEventListener("click", offCanvasClose);
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
        if (addressInputs[i] == "address_id") {
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
  }
});
