jQuery(function () {
  const $submit = $("#login");
  $submit.on("click", function (e) {
    e.preventDefault();
    const field = $(".field");
    const nisn = $("#nisn").val().trim();
    const loader = $(".loader-content");
    const loginContainer = $(".login");

    field.removeClass("error");
    $(".error-text").text("");

    let success = false;
    if (nisn.length === 0) {
      field.addClass("error");
      $(".error-text").text("Nomer NISN tidak boleh kosong");
    } else if (nisn.length < 6) {
      field.addClass("error");
      $(".error-text").text("Nomer yang diinputkan salah");
    } else if (nisn.length > 6) {
      field.addClass("error");
      $(".error-text").text("Nomer yang diinputkan salah");
    } else if (!/^\d+$/.test(nisn)) {
      field.addClass("error");
      $(".error-text").text("NISN hanya boleh berupa angka");
    } else {
      success = true;
    }

    if (success) {
      const templateData = new FormData();
      templateData.append("action", "check_passed");
      templateData.append("nisn", nisn);
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
          const nama = data["nama"];
          const nisn = data["nisn"];
          const status = data["status"];
          const content = data["content"];

          if (!loginStatus) {
            field.addClass("error");
            $(".error-text").text("Nomer NISN tidak terdaftar");
          } else {
            loginContainer.html("");
            setTimeout(function () {
              loginContainer.html(content);
            }, 2000);
          }
        },

        beforeSend: function () {
          loader.addClass("active");
          setTimeout(function () {
            loader.removeClass("active");
          }, 2000);
        },
      });
    }
  });
});
