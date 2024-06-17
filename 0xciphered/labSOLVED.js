this.addEventListener("load", () => {
  if (sessionStorage.getItem("ciphered_status") == "solved") {
    var solveSLIDE = document.getElementById("solve-slide");
    solveSLIDE.style.display = "block";
  } else if (sessionStorage.getItem("ciphered_status") == null) {
    sessionStorage.setItem("ciphered_status", "not");
  }
});
