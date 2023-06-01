window.addEventListener("load", () => {
  
  let ajax = new XMLHttpRequest();
  //total order charts
  var options = {
    chart: {
      height: 380,
      type: "bar",
      stacked: true,
      toolbar: {
        show: true,
      },
      zoom: {
        enabled: true,
      },
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "15%",
        endingShape: "rounded",
      },
    },
    dataLabels: {
      enabled: false,
    },
    series: [
      {
        name: "Satış",
        data: [],
      },
    ],
    yaxis: {
        tickAmount: 1,
        labels: {
          formatter: function(val) {
            return val.toFixed(0)
          }
        },
      },
    xaxis: {
      categories: [
        "Ocak",
        "Şubat",
        "Mart",
        "Nisan",
        "Mayıs",
        "Haziran",
        "Temmuz",
        "Agustos",
        "Eylül",
        "Ekim",
        "Kasım",
        "Aralık",
      ],
    },
    colors: ["#556ee6", "#f1b44c", "#34c38f"],
    legend: {
      position: "bottom",
    },
    fill: {
      opacity: 1,
    },
    noData: {
      text: "Yükleniyor...",
      align: "center",
      verticalAlign: "middle",
      offsetX: 0,
      offsetY: 0,
    },
  };
  chart = new ApexCharts(
    document.querySelector("#stacked-column-chart"),
    options
  );
  chart.render();

  function monthlySale() {
    ajax.open("post", "");
    ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.onload = function () {
      tableData = JSON.parse(this.responseText);
      let values = [];
      for (const key in tableData) {
        values.push(tableData[key]);
      }
      chart.updateOptions(
        {
          xaxis: {
            categories: [
              "Ocak",
              "Şubat",
              "Mart",
              "Nisan",
              "Mayıs",
              "Haziran",
              "Temmuz",
              "Agustos",
              "Eylül",
              "Ekim",
              "Kasım",
              "Aralık",
            ],
          },
        },
        true
      );
      chart.updateSeries([
        {
          data: values,
        },
      ]);
    };
    ajax.send("get_table=1");
  }

  function yearlySale() {
    ajax.open("post", "");
    ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.onload = function () {
      tableData = JSON.parse(this.responseText);
      let years = [];
      let values = [];
      for (const key in tableData) {
        years.push(key);
        values.push(tableData[key]);
      }
      chart.updateOptions({
        xaxis: {
          categories: years,
        },
      });
      chart.updateSeries([
        {
          data: values,
        },
      ]);
    };
    ajax.send("get_table=2");
  }
  monthlySale();
  let tableData;
  let tableMonthly = document.querySelector("#monthly-sales");
  let tableYearly = document.querySelector("#yearly-sales");
  tableMonthly.addEventListener("click", () => {
    if (!tableMonthly.classList.contains("active")) {
      tableMonthly.classList.add("active");
      tableYearly.classList.remove("active");
      monthlySale();
    }
  });
  tableYearly.addEventListener("click", () => {
    if (!tableYearly.classList.contains("active")) {
      tableYearly.classList.add("active");
      tableMonthly.classList.remove("active");
      yearlySale();
    }
  });


  //recent orders   
  let detail_order = document.querySelector("#detail-order-tbody");
  let detail_order_innerhtml = document.querySelector("#detail-order-tbody").innerHTML;
  let product_table = document.querySelector("#detail-product-table");

  let detailModal = document.querySelector("#order-detail-modal");
  detailModal.addEventListener("hide.bs.modal",()=>{
    detail_order.innerHTML=detail_order_innerhtml;
  })
  function createDetailProduct(json) {
    document.querySelector("#detail-order_id").innerText = json.order_id;
    document.querySelector("#detail-payment_id").innerText = json.payment_id;
    document.querySelector("#detail-customer_name").innerText =
      json.customer_name;
    document.querySelector("#detail-total").innerText = json.total + " TL";
    if (json.is_discounted == 1) {
      document.querySelector("#detail-discount_code").innerText =
        json.used_discount_code;
      document.querySelector("#detail-discount-code-wrapper").style.display =
        "block";
    }
    for (let i in json.products) {
      let tr = document.createElement("tr");
      tr.innerHTML = `
            <th scope="row"><img src="/${json.products[i].product_image}" alt="" class="avatar-sm"></th>
            <td>
                <div>
                    <h5 class="text-truncate font-size-14">${json.products[i].product_name}</h5>
                    <p class="text-muted mb-0">${json.products[i].product_price}TL x ${json.products[i].product_quantity}</p>
                </div>
            </td>
        `;
      detail_order.insertBefore(tr, document.querySelector("#detail-total-tr"));
    }
  }
  let showDetail = document.querySelectorAll("#show-detail");
  //order detail ajax
  showDetail.forEach((elem) => {
    elem.addEventListener("click", () => {
      ajax.open("post", "/admin/siparisler/detaylar");
      ajax.setRequestHeader("Content-type", "application/json");
      ajax.setRequestHeader("X-Requested-With", "XMLHttpRequest");
      ajax.send(
        JSON.stringify({
          order_id: elem.dataset.order_id,
        })
      );
      ajax.onload = function () {
        let order = JSON.parse(this.responseText);
        console.log(order);
        createDetailProduct(order);
      };
    });
  });
          //order delete
          let delete_order = document.querySelectorAll("#delete-order");
          delete_order.forEach(elem => {
              elem.addEventListener("click", () => {
                  let json = JSON.stringify({
                      ID: elem.dataset.order_id
                  });
                  del("Siparişi silmek istediğinize emin misiniz ?", json, "/admin/siparisler/sil");
              })
          })
          //order edit
          let order_edit_btn = document.querySelectorAll("#edit-order");
          order_edit_btn.forEach(elem => {
              elem.addEventListener("click", () => {
                  let order_edit_save = document.querySelector("#order-edit-save");
                  // let modalSaveButton=new bootstrap.Modal("#order-edit-modal",{});
                  let order_status_select = document.querySelector("#order_statuses");
                  let order_id = elem.dataset.order_id;
                  order_edit_save.addEventListener("click", () => {
                      let json = JSON.stringify({
                          ID: order_id,
                          status: order_status_select.options[order_status_select.selectedIndex].value
                      })
                      update(json, "/admin/siparisler/duzenle", ()=>{location.reload()})
                  });
              });
          })



        // document load end  
});
