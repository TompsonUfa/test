window.addEventListener("click", function (event) {
  if (event.target.classList.contains("btn-add-options")) {
    let btnCreateOptions = event.target;
    let question = btnCreateOptions.parentNode.parentNode;
    let nubmerQuestion = question.dataset.listNumber;

    let numberOptions = question.querySelector(".form-select").value;
    let type;

    if (numberOptions == "2") {
      type = "checkbox";
    } else {
      type = "radio";
    }

    let listOptions = question.querySelector(".list-options");
    listOptions.insertAdjacentHTML(
      "beforeend",
      `<div
        class="list-options__item mb-3 d-flex justify-content-center align-items-center"
        >
        <input
            class="form-check-input mx-2"
            type="${type}"
            name="options-${nubmerQuestion}"
        />
        <input type="text" class="form-control" placeholder="Вариант" />
        </div>`
    );
  }
});
window.onchange = function (event) {
  if (event.target.classList.contains("form-select")) {
    let nubmerOptions = event.target.value;
    let question = event.target.parentNode.parentNode;
    let checkInput = question.querySelectorAll(".form-check-input");
    for (let i = 0; i < checkInput.length; i++) {
      if (nubmerOptions == "2") {
        checkInput[i].type = "checkbox";
      } else {
        checkInput[i].type = "radio";
      }
    }
  }
};
let btnCreateQuestion = document.querySelector(".btn-add-question");
btnCreateQuestion.addEventListener("click", function () {
  var question = document.querySelectorAll(".question");
  var last = question[question.length - 1];
  newQuestion = Number(last.dataset.listNumber) + 1;
  last.insertAdjacentHTML(
    "afterend",
    `<div class="row p-5 mb-3 block-wrapper question" data-list-number="${newQuestion}">
      <h3 class="text-center mb-3">Вопрос ${newQuestion}</h3>
      <div class="col-12 d-flex mb-3">
        <input type="text" class="form-control" placeholder="Вопрос" />
        <select class="form-select w-25">
          <option class="numberOptions" selected value="1">Один ответ</option>
          <option class="numberOptions" value="2">Несколько ответов</option>
        </select>
      </div>
      <div class="col-12 list-options">
        <div
          class="list-options__item mb-3 d-flex justify-content-center align-items-center"
        >
          <input
            class="form-check-input mx-2"
            type="radio"
            name="options-${newQuestion}"
            checked
          />
          <input type="text" class="form-control" placeholder="Вариант" />
        </div>
      </div>
      <div class="col-12">
        <button class="btn w-100 btn-add-options">
          Добавить вариант
        </button>
      </div>
    </div>`
  );
});
