jQuery(function () {
  const $submit = $("#login");
  $submit.on("click", function (e) {
    e.preventDefault();
    const fieldNisn = $(".field-nisn");
    const fieldPass = $(".field-pass");
    const field = $(".field");
    const nisn = $("#nisn").val().trim();
    const password = $("#password").val();
    const post_id = $("#post_id").val().trim();
    const loader = $(".loader-content");
    const loginContainer = $(".login");

    field.removeClass("error");
    $(".error-text").text("");

    let nisnSuccess = false;
    if (nisn.length === 0) {
      fieldNisn.addClass("error");
      $(".error-text-nisn").text("Nomer NISN tidak boleh kosong");
    } else if (nisn.length < 6) {
      fieldNisn.addClass("error");
      $(".error-text-nisn").text("Nomer yang diinputkan salah");
    } else if (nisn.length > 6) {
      fieldNisn.addClass("error");
      $(".error-text-nisn").text("Nomer yang diinputkan salah");
    } else if (!/^\d+$/.test(nisn)) {
      fieldNisn.addClass("error");
      $(".error-text-nisn").text("NISN hanya boleh berupa angka");
    } else {
      nisnSuccess = true;
    }

    let passSuccess = false;
    if (password.length === 0) {
      fieldPass.addClass("error");
      $(".error-text-pass").text("Password tidak boleh kosong");
    } else {
      passSuccess = true;
    }

    if (nisnSuccess && passSuccess) {
      const templateData = new FormData();
      templateData.append("action", "check_passed");
      templateData.append("nisn", nisn);
      templateData.append("password", password);
      templateData.append("post_id", post_id);

      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: templateData,
        processData: false,
        contentType: false,

        success: function (res) {
          data = JSON.parse(res);
          const loginStatus = data["login"];
          const content = data["content"];
          const error = data["responError"];
          const eNisn = data["nisnError"];
          const ePass = data["passError"];

          if (!loginStatus) {
            if (eNisn) {
              fieldNisn.addClass("error");
              $(".error-text-nisn").text(error);
            }

            if (ePass) {
              fieldPass.addClass("error");
              $(".error-text-pass").text(error);
            }

            loader.removeClass("active");
          } else {
            loginContainer.html("");
            loader.addClass("active");
            setTimeout(function () {
              loginContainer.html(content);
              loader.removeClass("active");
            }, 2000);
          }
        },
      });
    }
  });
});
