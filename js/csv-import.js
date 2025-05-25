jQuery(function ($) {
  $("#import_csv_button").on("click", function () {
    const file = $("#csv_file_input")[0].files[0];
    const postId = $("#post_ID").val();

    if (!file) {
      alert("Pilih file CSV terlebih dahulu.");
      return;
    }

    const formData = new FormData();
    formData.append("action", "import_csv_data");
    formData.append("nonce", csv_import.nonce);
    formData.append("post_id", postId);
    formData.append("csv", file);

    $.ajax({
      url: csv_import.ajax_url,
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,

      success: function (res) {
        if (res.success) {
          $("#import_status").text("Import berhasil!");
          setTimeout(() => {
            location.reload();
          }, 1500);
        } else {
          $("#import_status").text("Gagal import");
        }
      },

      error: function (xhr, status, error) {
        console.error("AJAX Error:", error, xhr.responseText);
        $("#import_status").text("Gagal import: " + xhr.responseText);
      },
    });
  });
});
