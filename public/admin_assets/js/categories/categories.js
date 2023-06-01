let ajax = new XMLHttpRequest();
//brand search
function deleteCat() {
  let deleteCategory = document.querySelectorAll("#delete-category");
  deleteCategory.forEach((elem) => {
    elem.addEventListener("click", () => {
      let json = JSON.stringify({
        ID: elem.dataset.category_id,
      });
      del(
        "BU kategoriyi silmek istediğinize emin misiniz ?",
        json,
        "/admin/kategoriler/sil"
      );
    });
  });
}
function createResult(result) {
  categories_table_body.innerHTML = "";
  for (const key in result["categories"]) {
    let tr = document.createElement("tr");
    tr.innerHTML = `<td class="${(result["categories"][key]["parent_id"] != 0) ? " table-primary" : ""}">${
        result["categories"][key]["category"]
      }</td>
          <td class="text-center">
              <a href="/admin/kategoriler/kategoriDuzenle/${
                result["categories"][key]["ID"]
              }" class="btn btn-warning">Düzenle</a>
              <button id="delete-category" data-category_id="${
                result["categories"][key]["ID"]
              }" class="btn btn-danger">Sil</button>
          </td>`;
    categories_table_body.appendChild(tr);
  }
  deleteCat();
}
let categories_table_body = document.querySelector("#categories_table_body");
let categories_table_body_innerHTML = document.querySelector(
  "#categories_table_body"
).innerHTML;
let category_search = document.querySelector("#category_search");
let timer=setTimeout(() => {}, 0);
category_search.addEventListener("keyup", () => {
    clearTimeout(timer);
    timer=setTimeout(() => {
        let cs = category_search.value;
        if (cs.replace(/\s/g, "").length != 0) {
          let json = JSON.stringify({
            cat: cs,
          });
          search(json, "/admin/kategoriler/search", createResult);
      
        } else {
          categories_table_body.innerHTML = categories_table_body_innerHTML;
        }
    }, 300);
});
deleteCat();
