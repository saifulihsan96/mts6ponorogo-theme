const search_header = document.querySelector(".search-menu");
const search_form = document.querySelector(".form-search-page");

search_header.addEventListener("click", function () {
  search_form.classList.toggle("active");
});
document.addEventListener("click", function (event) {
  if (
    !search_header.contains(event.target) &&
    !search_form.contains(event.target)
  ) {
    search_form.classList.remove("active");
  }
});

const bar_menu = document.querySelector(".mobile-menu .icon_bar svg");
const overlay_menu = document.querySelector(".mobile-menu .overlay-menu");
const close_menu = document.querySelector(".mobile-menu .close-menu svg");

bar_menu.addEventListener("click", function () {
  const menu_mobile = this.closest(".mobile-menu");
  const setmenu = menu_mobile.querySelector(".setmenu");
  setmenu.classList.add("active_menu");
  overlay_menu.classList.add("active");
});

close_menu.addEventListener("click", function () {
  const menu_mobile = this.closest(".mobile-menu");
  const setmenu = menu_mobile.querySelector(".setmenu");
  setmenu.classList.remove("active_menu");
  overlay_menu.classList.remove("active");
});

var swiper = new Swiper(".footer-post", {
  navigation: {
    nextEl: ".footer-next",
    prevEl: ".footer-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  },
});

function SwicthPostHero(inner) {
  for (let i = 0; i < inner.length; i++) {
    const inner1 = inner[0];
    const inner2 = inner[1];

    const smallimage1 = inner1.querySelector(".small-post img");
    const smalltitle1 = inner1.querySelector(".small-post h3");

    const smallimage2 = inner2.querySelector(".small-post img");
    const smalltitle2 = inner2.querySelector(".small-post h3");

    const bigimage1 = inner1.querySelector(".big-image").src;
    const bigtitle1 = inner1.querySelector("h1").textContent;
    smalltitle2.textContent = bigtitle1;
    smallimage2.src = bigimage1;

    const bigimage2 = inner2.querySelector(".big-image").src;
    const bigtitle2 = inner2.querySelector("h1").textContent;
    smalltitle1.textContent = bigtitle2;
    smallimage1.src = bigimage2;

    const smallpost1 = inner1.querySelector(".small-post");
    const smallpost2 = inner2.querySelector(".small-post");

    smallpost1.addEventListener("click", function () {
      const itemPost = this.closest(".item-hero-post");
      const secondInner = itemPost.querySelector("#inner1");
      secondInner.classList.add("active");
      inner1.classList.remove("active");
    });

    smallpost2.addEventListener("click", function () {
      const itemPost = this.closest(".item-hero-post");
      const firstInner = itemPost.querySelector("#inner0");
      firstInner.classList.add("active");
      inner2.classList.remove("active");
    });
  }

  var currentIndex = 0;
  function toggleActive() {
    inner[currentIndex].classList.remove("active");
    currentIndex = (currentIndex + 1) % inner.length;
    inner[currentIndex].classList.add("active");
  }
  function startAnimation() {
    setInterval(toggleActive, 10000);
  }
  startAnimation();
}

const heroblock = document.querySelector(".block-hero");
if (heroblock) {
  const news = heroblock.querySelector("#news");
  var inner1 = news.querySelectorAll(".inner-post");
  SwicthPostHero(inner1);

  const highlight = heroblock.querySelector("#highlight");
  var inner2 = highlight.querySelectorAll(".inner-post");
  SwicthPostHero(inner2);

  const popular = heroblock.querySelector("#popular");
  var inner3 = popular.querySelectorAll(".inner-post");
  SwicthPostHero(inner3);

  const allitempost = heroblock.querySelectorAll(".item-hero-post");
  const plagination = heroblock.querySelector(".plagination-hero");
  const itemplagination = plagination.querySelectorAll(".item-plagination");
  const lineplagination = plagination.querySelector(".plagination-line span");

  for (let i = 0; i < itemplagination.length; i++) {
    const item = itemplagination[i];

    if (window.innerWidth < 768) {
      const newContent = item.textContent.replace("Artikel", "");
      item.textContent = newContent;
    }

    item.addEventListener("click", function () {
      const datapost = this.dataset.post;
      const itempost = heroblock.querySelector("#" + datapost);

      for (let i = 0; i < allitempost.length; i++) {
        const elementPost = allitempost[i];
        elementPost.classList.remove("active_post");
      }

      itempost.classList.add("active_post");

      if (datapost == "news") {
        lineplagination.style.left = "0";
      }
      if (datapost == "highlight") {
        lineplagination.style.left = "33.3%";
      }
      if (datapost == "popular") {
        lineplagination.style.left = "66.6%";
      }
    });
  }
}

const blockslider = document.querySelectorAll(".block-slider-post");
if (blockslider) {
  for (let i = 0; i < blockslider.length; i++) {
    const sliders = blockslider[i];
    const postslider = sliders.querySelector(".slide-post");

    const id = sliders.getAttribute("id");
    const next = "#" + id + " .slider-next";
    const prev = "#" + id + " .slider-prev";
    const scroll = "#" + id + " .swiper-scrollbar";

    var swiperslider = new Swiper(postslider, {
      navigation: {
        nextEl: next,
        prevEl: prev,
      },
      scrollbar: {
        el: scroll,
        hide: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
      },
    });
  }
}

const block_two = document.querySelector(".block-two-column");
if (block_two) {
  const videothumbnail = block_two.querySelector(".image-thumbnail");
  const videoIframe = block_two.querySelector("iframe");

  videothumbnail.addEventListener("click", function () {
    this.style.display = "none";
    videoIframe.style.display = "block";
  });
}

const block_video = document.querySelector(".block-video");
if (block_video) {
  const video = block_video.querySelector("iframe");
  const image = block_video.querySelector(".image-video");

  image.addEventListener("click", function () {
    this.classList.add("hide_active");
    video.classList.add("show_active");
  });
}

const block_accordion = document.querySelector(".block-accordion");
if (block_accordion) {
  const item = block_accordion.querySelectorAll(".item-accordion");
  for (let i = 0; i < item.length; i++) {
    const itemaccordion = item[i];
    const head = itemaccordion.querySelector(".head");

    head.addEventListener("click", function () {
      const parent = this.closest(".item-accordion");
      parent.classList.toggle("active");
    });
  }
}

const blog_slider = document.querySelector(".slider-blog");
if (blog_slider) {
  var swiperslider = new Swiper(blog_slider, {
    navigation: {
      nextEl: ".blog-next",
      prevEl: ".blog-prev",
    },
    scrollbar: {
      el: ".swiper-scrollbar",
      hide: true,
    },
    breakpoints: {
      640: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
    },
  });
}

const block_surve = document.querySelector(".block-surve");
if (block_surve) {
  const surveyData = {
    step1: {},
    step2: {},
    step3: {},
  };

  const step1NextBtn = block_surve.querySelector(".btn-step-1-next");
  const step2NextBtn = block_surve.querySelector(".btn-step-2-next");
  const step2PrevBtn = block_surve.querySelector(".btn-step-2-prev");
  const categorySelect = block_surve.querySelector("#kategori");

  if (categorySelect) {
    categorySelect.addEventListener("change", function () {
      if (this.value) {
        const group = this.closest(".form-group");
        if (group) group.classList.remove("has-error");
      }
    });
  }

  // Clear radio group error on selection
  const step2Form = block_surve.querySelector(".step-2-form");
  if (step2Form) {
    step2Form.addEventListener("change", function (e) {
      if (e.target && e.target.type === "radio") {
        const item = e.target.closest(".surve-question-item");
        if (item) item.classList.remove("has-error");
      }
    });
  }

  if (step1NextBtn) {
    step1NextBtn.addEventListener("click", function (e) {
      e.preventDefault();
      const step1 = document.querySelector(".step-1-form");
      const fields = step1.querySelectorAll(".form-group");

      let isValid = true;
      const formDataObj = {};

      fields.forEach((group) => {
        const label = group.querySelector("label");
        const input = group.querySelector("input, select, textarea");
        const errorDiv = group.querySelector(".error-message");

        if (!input) return;

        if (errorDiv) errorDiv.textContent = "";
        group.classList.remove("has-error");

        const isRequired =
          input.hasAttribute("required") ||
          group.classList.contains("isRequired");

        const value = input.value.trim();
        const labelName = label
          ? label.textContent.replace("*", "").trim()
          : input.name;

        if (isRequired && (value === "" || value === "0")) {
          isValid = false;
          group.classList.add("has-error");

          if (errorDiv) {
            errorDiv.textContent = `Wajib diisi.`;
          }
        } else {
          const fieldKey = input.name || input.id;
          formDataObj[fieldKey] = value;
        }
      });

      if (isValid) {
        surveyData.step1 = formDataObj;
        window.surveyData = surveyData;
        localStorage.setItem(
          "data_satisfaction_survey",
          JSON.stringify(surveyData),
        );
        console.log("Data Step 1:", surveyData.step1);

        goToStep(2);
      } else {
        console.log("Form valid");
      }
    });
  }

  if (step2NextBtn) {
    step2NextBtn.addEventListener("click", function (e) {
      e.preventDefault();

      let isValid = true;
      const step2DataObj = {};
      let firstErrorItem = null;

      // Validate questions 1 to 19
      for (let i = 1; i <= 19; i++) {
        const qName = "q" + i;
        const qItem = block_surve.querySelector(
          `.surve-question-item[data-question="${qName}"]`,
        );

        const title = qItem
          ? qItem.querySelector(".question-title").textContent
          : null;

        const checkedRadio = block_surve.querySelector(
          `input[name="${qName}"]:checked`,
        );

        const checkLabels = {
          1: "Sangat Tidak Puas",
          2: "Tidak Puas",
          3: "cukup puas",
          4: "puas",
          5: "Sangat Puas",
        };

        const checkedValue = checkLabels[checkedRadio.value];

        if (qItem) {
          qItem.classList.remove("has-error");
        }

        if (!checkedRadio) {
          isValid = false;
          if (qItem) {
            qItem.classList.add("has-error");
            if (!firstErrorItem) {
              firstErrorItem = qItem;
            }
          }
        } else {
          step2DataObj[title] = checkedValue;
        }
      }

      if (!isValid) {
        if (firstErrorItem) {
          firstErrorItem.scrollIntoView({
            behavior: "smooth",
            block: "center",
          });
        }
        console.log("fill in all Step 2.");
        return;
      }

      surveyData.step2 = step2DataObj;
      window.surveyData = surveyData;
      localStorage.setItem(
        "data_satisfaction_survey",
        JSON.stringify(surveyData),
      );
      console.log("Data Step 2:", surveyData.step2);

      goToStep(3);
    });
  }

  if (step2PrevBtn) {
    step2PrevBtn.addEventListener("click", function (e) {
      e.preventDefault();
      goToStep(1);
    });
  }

  const step3Form = block_surve.querySelector(".step-3-form");
  const step3PrevBtn = block_surve.querySelector(".btn-step-3-prev");

  if (step3Form) {
    step3Form.querySelectorAll("textarea, input").forEach((input) => {
      const clearError = () => {
        const group = input.closest(".form-group");
        if (group) group.classList.remove("has-error");
      };
      input.addEventListener("input", clearError);
      input.addEventListener("change", clearError);
    });

    step3Form.addEventListener("submit", function (e) {
      e.preventDefault();

      let isValid = true;
      const keunggulanInput = block_surve.querySelector("#keunggulan");
      const perbaikanInput = block_surve.querySelector("#perbaikan");
      const rekomendasiRadio = block_surve.querySelector(
        'input[name="rekomendasi"]:checked',
      );

      // Validate keunggulan
      const keunggulanGroup = keunggulanInput
        ? keunggulanInput.closest(".form-group")
        : null;
      if (!keunggulanInput || !keunggulanInput.value.trim()) {
        isValid = false;
        if (keunggulanGroup) keunggulanGroup.classList.add("has-error");
      } else {
        if (keunggulanGroup) keunggulanGroup.classList.remove("has-error");
      }

      const perbaikanGroup = perbaikanInput
        ? perbaikanInput.closest(".form-group")
        : null;
      if (!perbaikanInput || !perbaikanInput.value.trim()) {
        isValid = false;
        if (perbaikanGroup) perbaikanGroup.classList.add("has-error");
      } else {
        if (perbaikanGroup) perbaikanGroup.classList.remove("has-error");
      }

      const rekomendasiGroup = block_surve
        .querySelector('input[name="rekomendasi"]')
        ?.closest(".form-group");
      if (!rekomendasiRadio) {
        isValid = false;
        if (rekomendasiGroup) rekomendasiGroup.classList.add("has-error");
      } else {
        if (rekomendasiGroup) rekomendasiGroup.classList.remove("has-error");
      }

      if (!isValid) {
        const firstError = block_surve.querySelector(".step-3-form .has-error");
        if (firstError) {
          firstError.scrollIntoView({ behavior: "smooth", block: "center" });
        }
        console.log("fill in all Step 3.");
        return;
      }

      surveyData.step3 = {
        keunggulan: keunggulanInput.value.trim(),
        perbaikan: perbaikanInput.value.trim(),
        rekomendasi: rekomendasiRadio.value,
        submittedAt: new Date().toISOString(),
      };

      window.surveyData = surveyData;
      localStorage.setItem(
        "data_satisfaction_survey_final",
        JSON.stringify(surveyData),
      );

      console.log(
        "SURVEY FINISH - DATA JSON FINAL:",
        JSON.stringify(surveyData, null, 2),
      );

      const submitBtn = step3Form.querySelector(".btn-step-3-submit");
      if (submitBtn) {
        submitBtn.disabled = true;
        const btnText = submitBtn.querySelector("span");
        if (btnText) btnText.textContent = "Mengirim...";
      }

      const formData = new FormData();
      formData.append("action", "kirim_survei_layanan");

      formData.append("step1", JSON.stringify(surveyData.step1 || {}));
      formData.append("step2", JSON.stringify(surveyData.step2 || {}));
      formData.append("step3", JSON.stringify(surveyData.step3 || {}));

      //  const step1 = surveyData.step1 || {};
      //   const valNama =
      //     step1["nama"] || step1["Nama"] || step1["Nama (opsional)"] || "";
      //   const valKategori =
      //     step1["kategori"] ||
      //     step1["Kategori"] ||
      //     step1["Kategori Responden"] ||
      //     "";
      //   const valPekerjaan =
      //     step1["pekerjaan"] ||
      //     step1["Pekerjaan"] ||
      //     step1["Pekerjaan / Instansi"] ||
      //     "";

      //   formData.append("nama", valNama);
      //   formData.append("kategori", valKategori);
      //   formData.append("pekerjaan", valPekerjaan);

      //   if (surveyData.step2) {
      //     Object.keys(surveyData.step2).forEach((key) => {
      //       formData.append(key, surveyData.step2[key]);
      //     });
      //   }

      //   formData.append("keunggulan", surveyData.step3.keunggulan);
      //   formData.append("perbaikan", surveyData.step3.perbaikan);
      //   formData.append("rekomendasi", surveyData.step3.rekomendasi);

      const ajaxUrl = window.ajaxurl || "/wp-admin/admin-ajax.php";

      fetch(ajaxUrl, {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json())
        .then((result) => {
          if (result.success) {
            console.log("SURVEY DATA:", result.data);
            console.log("SURVEY SENT TO EMAIL SUCCESSFULLY!");
            goToStep(4);
          } else {
            alert(
              "Gagal mengirim survei: " + (result.data || "Terjadi kesalahan."),
            );
            if (submitBtn) submitBtn.disabled = false;
          }
        })
        .catch((error) => {
          console.error("AJAX Error:", error);
          alert("Terjadi kesalahan koneksi saat mengirim survei.");
          if (submitBtn) submitBtn.disabled = false;
        });
    });
  }

  if (step3PrevBtn) {
    step3PrevBtn.addEventListener("click", function (e) {
      e.preventDefault();
      goToStep(2);
    });
  }

  function goToStep(stepNumber) {
    const steps = block_surve.querySelectorAll(".surve-step-nav .step");
    steps.forEach(function (stepEl) {
      const num = parseInt(stepEl.dataset.step, 10);
      if (num < stepNumber || stepNumber === 4) {
        stepEl.classList.remove("active");
        stepEl.classList.add("completed");
      } else if (num === stepNumber) {
        stepEl.classList.add("active");
        stepEl.classList.remove("completed");
      } else {
        stepEl.classList.remove("active", "completed");
      }
    });

    const contents = block_surve.querySelectorAll(".surve-step-content");
    contents.forEach(function (contentEl) {
      const contentStep = parseInt(contentEl.dataset.step, 10);
      if (contentStep === stepNumber) {
        contentEl.classList.add("active");
      } else {
        contentEl.classList.remove("active");
      }
    });

    // Scroll otomatis ke bagian atas form
    block_surve.scrollIntoView({ behavior: "smooth" });
  }
}
