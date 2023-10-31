// document.querySelector(".model").style.display = "none";
const modal = document.querySelector(".model");
const updateForm = document.querySelector(".update-form");
const modalCloseBtn = document.querySelector(".modal-close");

document.querySelectorAll("#modaltoggle").forEach((el) => {
  el.addEventListener("click", () => {
    updateForm.style.display = "block";
  });
});

modalCloseBtn.addEventListener("click", () => {
  updateForm.style.display = "none";
});
