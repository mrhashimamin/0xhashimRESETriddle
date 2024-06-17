this.addEventListener("load", () => {
  if (sessionStorage.getItem("cryptic_status") == "solved") {
    var solveSLIDE = document.getElementById("solve-slide");
    solveSLIDE.style.display = "block";
  } else if (sessionStorage.getItem("cryptic_status") == null) {
    sessionStorage.setItem("cryptic_status", "not");
  }
});
