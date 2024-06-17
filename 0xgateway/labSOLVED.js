this.addEventListener("load", () => {
  if (sessionStorage.getItem("gateway_status") == "solved") {
    var solveSLIDE = document.getElementById("solve-slide");
    solveSLIDE.style.display = "block";
  } else if (sessionStorage.getItem("gateway_status") == null) {
    sessionStorage.setItem("gateway_status", "not");
  }
});
