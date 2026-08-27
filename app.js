const buttons = document.querySelectorAll("[data-panel]");
const panels = document.querySelectorAll(".view");

function show(id) {
  panels.forEach((panel) => panel.classList.toggle("hidden", panel.id !== id));
  buttons.forEach((button) => button.classList.toggle("active", button.dataset.panel === id));
  document.body.classList.remove("flash");
  void document.body.offsetWidth;
  document.body.classList.add("flash");
}

buttons.forEach((button) => {
  button.addEventListener("click", () => show(button.dataset.panel));
});

document.addEventListener("keydown", (event) => {
  const keys = ["1", "2", "3", "4", "5", "6"];
  const index = keys.indexOf(event.key);
  if (index >= 0 && buttons[index]) {
    buttons[index].click();
  }
});

show("status");
