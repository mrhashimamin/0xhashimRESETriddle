this.addEventListener("load", () => {
  if (sessionStorage.getItem("lockdown_status") == "solved") {
    var solveSLIDE = document.getElementById("solve-slide");
    solveSLIDE.style.display = "block";
  } else if (sessionStorage.getItem("lockdown_status") == null) {
    sessionStorage.setItem("lockdown_status", "not");
  }
});
