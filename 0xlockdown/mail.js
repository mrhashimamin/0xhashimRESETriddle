document
  .getElementById("mail_Form")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    var usr_form = new FormData(event.target);

    var usr_data_object = {};
    usr_form.forEach((value, key) => {
      usr_data_object[key] = [value];
    });

    var json_data = JSON.stringify(usr_data_object);

    // Send the JSON to the backend
    fetch("send.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: json_data,
    }).then((response) => {
      // Check if the response is OK
      if (!response.ok) {
        throw new Error("Network response was not ok " + response.statusText);
      }
      return response.json();
    });
    var reset = document.getElementById("reset-msg");
    reset.style.display = "flex";
  });
