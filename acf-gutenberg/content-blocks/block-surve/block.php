<?php
/**
 * Dat Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */


// Create id attribute allowing for custom "anchor" value.
$id = 'mts-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block-surve';

if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$iconUser = FTR_URI . '/assets/image/user.svg';
$iconCheck = FTR_URI . '/assets/image/check.svg';
$iconEdit = FTR_URI . '/assets/image/edit.svg';


/**
 * This variable as the HTML structure for the block surve view.
 * Section 'block-surve'.
 */
$view = <<<HTML
	<section id="section-{$id}" class="{$class_name}">
      <div class="mts-container">
        <div class="surve-content">
          <div class="surve-header">
            <h2>Survei Kepuasan Layanan</h2>
            <p>Masyarakat Umum, Orang Tua Wali, & Alumni</p>
          </div>

          <div class="surve-step-nav">
            <div class="step step-1 active" data-step="1">
              <div class="number">1</div>
              <div class="text">Identitas</div>
            </div>
            <div class="line"></div>
            <div class="step step-2" data-step="2">
              <div class="number">2</div>
              <div class="text">Penilaian</div>
            </div>
            <div class="line"></div>
            <div class="step step-3" data-step="3">
              <div class="number">3</div>
              <div class="text">Evaluasi</div>
            </div>
          </div>

          <!-- Step 1 Content -->
          <div class="surve-step-content step-1-content active" data-step="1">
            <div class="surve-label">
              <img src="{$iconUser}" alt="user" />
              <div class="text">Langkah 1: Data Diri Responden</div>
            </div>

            <form class="surve-form form-service step-1-form" action="" method="post" novalidate>
              <div class="form-group">
                <label for="nama">Nama (opsional)</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama anda" />
                <div class="error-message"></div>
              </div>

              <div class="form-group isRequired">
                <label for="kategori">Kategori Responden <span class="required-asterisk">*</span></label>
                <div class="select-wrapper">
                  <select id="kategori" name="kategori" required>
                    <option value="" disabled selected hidden>Pilih Kategori Responden</option>
                    <option value="Orang Tua / Wali Murid">Orang Tua / Wali Murid</option>
                    <option value="Masyarakat Umum">Masyarakat Umum</option>
                    <option value="Alumni">Alumni</option>
                  </select>
                </div>
                <div class="error-message"></div>
              </div>

              <div class="form-group isRequired">
                <label for="pekerjaan">Pekerjaan / Instansi <span class="required-asterisk">*</span></label>
                <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Contoh: Swasta, PNS, Wiraswasta" required />
                <div class="error-message"></div>
              </div>

              <div class="form-action">
                <button type="button" class="btn-next btn-step-1-next">
                  <span>Selanjutnya</span>
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                  </svg>
                </button>
              </div>
            </form>
          </div>

          <!-- Step 2 Content -->
          <div class="surve-step-content step-2-content" data-step="2">
            <div class="surve-label-header">
              <div class="surve-label">
                <img src="{$iconCheck}" alt="user" />
                <div class="text">Langkah 2: Penilaian Layanan</div>
              </div>
              <div class="surve-sublabel">Keterangan: 1 (Sangat Tidak Puas), 2 (Tidak Puas), 3 (cukup puas), 4 (puas), 5 (sangat puas)</div>
            </div>

            <form class="surve-form form-service step-2-form" action="" method="post" novalidate>
              <!-- Category A -->
              <div class="surve-category-section">
                <h3 class="category-title">A. PELAYANAN ADMINISTRASI DAN TATA USAHA</h3>
                
                <div class="surve-question-item" data-question="q1">
                  <p class="question-title">1. Keramahan dan kesopanan petugas PTSP/TU</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q1" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q1" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q1" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q1" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q1" value="5" /> <span>5</span></label>
                  </div>
                </div>

                <div class="surve-question-item" data-question="q2">
                  <p class="question-title">2. Kecepatan pengurusan dokumen</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q2" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q2" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q2" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q2" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q2" value="5" /> <span>5</span></label>
                  </div>
                </div>

                <div class="surve-question-item" data-question="q3">
                  <p class="question-title">3. Transparansi alur prosedur pelayanan</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q3" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q3" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q3" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q3" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q3" value="5" /> <span>5</span></label>
                  </div>
                </div>
              </div>

              <!-- Category B -->
              <div class="surve-category-section">
                <h3 class="category-title">B. AKSES INFORMASI DAN KOMUNIKASI</h3>
                <div class="surve-question-item" data-question="q4">
                  <p class="question-title">4. Kemudahan mendapatkan informasi kegiatan/program madrasah</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q4" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q4" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q4" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q4" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q4" value="5" /> <span>5</span></label>
                  </div>
                </div>

                <div class="surve-question-item" data-question="q5">
                  <p class="question-title">5. Kejelasan informasi di medsos/website madrasah</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q5" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q5" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q5" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q5" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q5" value="5" /> <span>5</span></label>
                  </div>
                </div>

                <div class="surve-question-item" data-question="q6">
                  <p class="question-title">6. Keterbukaan madrasah menerima aduan/saran</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q6" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q6" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q6" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q6" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q6" value="5" /> <span>5</span></label>
                  </div>
                </div>

                <div class="surve-question-item" data-question="q7">
                  <p class="question-title">7. komunikasi madrasah dengan orang tua/Masyarakat</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q7" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q7" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q7" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q7" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q7" value="5" /> <span>5</span></label>
                  </div>
                </div>
              </div>

              <!-- Category C -->
              <div class="surve-category-section">
                <h3 class="category-title">C. PENGAJARAN</h3>

                <div class="surve-question-item" data-question="q8">
                  <p class="question-title">8. kualitas proses pembelajaran</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q8" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q8" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q8" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q8" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q8" value="5" /> <span>5</span></label>
                  </div>
                </div>

                <div class="surve-question-item" data-question="q9">
                  <p class="question-title">9. kompetensi dan sikap guru dalam mengajar</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q9" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q9" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q9" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q9" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q9" value="5" /> <span>5</span></label>
                  </div>
                </div>

                <div class="surve-question-item" data-question="q10">
                  <p class="question-title">10. Perhatian guru terhadap perkembangan peserta didik</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q10" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q10" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q10" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q10" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q10" value="5" /> <span>5</span></label>
                  </div>
                </div>
              </div>

              <!-- Category D -->
              <div class="surve-category-section">
                <h3 class="category-title">D. LINGKUNGAN, SARANA DAN PRASARANA</h3>

                <div class="surve-question-item" data-question="q11">
                  <p class="question-title">11. Kelaiakan fasilitas umum (mushola, Toilet, Parkir)</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q11" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q11" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q11" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q11" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q11" value="5" /> <span>5</span></label>
                  </div>
                </div>

                <div class="surve-question-item" data-question="q12">
                  <p class="question-title">12. Kelaiakan fasilitas pembelajaran (kelas, bangku, media pembelajaran)</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q12" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q12" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q12" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q12" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q12" value="5" /> <span>5</span></label>
                  </div>
                </div>

                <div class="surve-question-item" data-question="q13">
                  <p class="question-title">13. Keamanan dan kebersihan lingkungan madrasah</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q13" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q13" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q13" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q13" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q13" value="5" /> <span>5</span></label>
                  </div>
                </div>
              </div>

              <!-- Category E -->
              <div class="surve-category-section">
                <h3 class="category-title">E. PRESTASI/ PENGEMBANGAN DIRI</h3>

                <div class="surve-question-item" data-question="q14">
                  <p class="question-title">14. kesempatan siswa mengembangkan bakat dan minat</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q14" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q14" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q14" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q14" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q14" value="5" /> <span>5</span></label>
                  </div>
                </div>

                <div class="surve-question-item" data-question="q15">
                  <p class="question-title">15. Pembinaan prestasi akademik dan nonakademik</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q15" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q15" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q15" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q15" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q15" value="5" /> <span>5</span></label>
                  </div>
                </div>

                <div class="surve-question-item" data-question="q16">
                  <p class="question-title">16. Kegiatan ekstrakurikuler dan pembiasaan yang tersedia</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q16" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q16" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q16" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q16" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q16" value="5" /> <span>5</span></label>
                  </div>
                </div>
              </div>

              <!-- Category F -->
              <div class="surve-category-section">
                <h3 class="category-title">F. HUBUNGAN MASYARAKAT DAN ALUMNI</h3>

                <div class="surve-question-item" data-question="q17">
                  <p class="question-title">17. Keterlibatan madrasah pada kegiatan sosial keagamaan Masyarakat</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q17" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q17" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q17" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q17" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q17" value="5" /> <span>5</span></label>
                  </div>
                </div>

                <div class="surve-question-item" data-question="q18">
                  <p class="question-title">18. Perilaku/akhlak siswa di luar madrasah</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q18" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q18" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q18" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q18" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q18" value="5" /> <span>5</span></label>
                  </div>
                </div>

                <div class="surve-question-item" data-question="q19">
                  <p class="question-title">19. Hubungan dan komunikasi madrasah dengan alumni</p>
                  <div class="rating-options">
                    <label class="rating-option"><input type="radio" name="q19" value="1" required /> <span>1</span></label>
                    <label class="rating-option"><input type="radio" name="q19" value="2" /> <span>2</span></label>
                    <label class="rating-option"><input type="radio" name="q19" value="3" /> <span>3</span></label>
                    <label class="rating-option"><input type="radio" name="q19" value="4" /> <span>4</span></label>
                    <label class="rating-option"><input type="radio" name="q19" value="5" /> <span>5</span></label>
                  </div>
                </div>
              </div>

              <div class="form-action">
                <button type="button" class="btn-prev btn-step-2-prev">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                  </svg>
                  <span>Kembali</span>
                </button>
                <button type="button" class="btn-next btn-step-2-next">
                  <span>Lanjutkan</span>
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                  </svg>
                </button>
              </div>
            </form>
          </div>

          <!-- Step 3 Content -->
          <div class="surve-step-content step-3-content" data-step="3">
            <div class="surve-label-header">
              <div class="surve-label">
                <img src="{$iconEdit}" alt="user" />
                <div class="text">Langkah 3: Evaluasi & Rekomendasi</div>
              </div>
            </div>

            <form class="surve-form form-service step-3-form" action="" method="post" novalidate>
              <div class="form-group">
                <label for="keunggulan">Apa keunggulan utama dari madrasah ini? <span class="required-asterisk">*</span></label>
                <textarea id="keunggulan" name="keunggulan" rows="4" placeholder="Tulis tanggapan anda di sini ..." required></textarea>
                <div class="error-message">Wajib diisi.</div>
              </div>

              <div class="form-group">
                <label for="perbaikan">Apa saran atau masukan Anda untuk meningkatkan kualitas MTsN 6 Ponorogo? <span class="required-asterisk">*</span></label>
                <textarea id="perbaikan" name="perbaikan" rows="4" placeholder="Tulis tanggapan anda di sini ..." required></textarea>
                <div class="error-message">Wajib diisi.</div>
              </div>

              <div class="form-group">
                <label>Secara keseluruhan, seberapa puas Anda terhadap pelayanan madrasah ini? <span class="required-asterisk">*</span></label>
                <div class="radio-vertical-options">
                  <label class="radio-option">
                    <input type="radio" name="rekomendasi" value="Sangat tidak puas" required />
                    <span>Sangat tidak puas</span>
                  </label>
                  <label class="radio-option">
                    <input type="radio" name="rekomendasi" value="Tidak puas" />
                    <span>Tidak puas</span>
                  </label>
                  <label class="radio-option">
                    <input type="radio" name="rekomendasi" value="Cukup puas" />
                    <span>Cukup puas</span>
                  </label>
                  <label class="radio-option">
                    <input type="radio" name="rekomendasi" value="Puas" />
                    <span>Puas</span>
                  </label>
                  <label class="radio-option">
                    <input type="radio" name="rekomendasi" value="Sangat puas" />
                    <span>Sangat puas</span>
                  </label>
                </div>
                <div class="error-message">Pilihan wajib diisi.</div>
              </div>

              <div class="form-action">
                <button type="button" class="btn-prev btn-step-3-prev">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                  </svg>
                  <span>Kembali</span>
                </button>
                <button type="submit" class="btn-next btn-step-3-submit">
                  <span>Kirim Survei</span>
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                  </svg>
                </button>
              </div>
            </form>
          </div>

          <!-- Success Message Content -->
          <div class="surve-step-content success-content" data-step="4">
            <div class="surve-success-box">
              <div class="icon-success">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#108448" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                  <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
              </div>
              <h3>Terima Kasih!</h3>
              <p>Tanggapan dan masukan Anda telah berhasil tersimpan. Informasi dari Anda sangat berharga untuk meningkatkan kualitas layanan MTsN 6 Ponorogo.</p>
            </div>
          </div>

        </div>
      </div>
	</section>
HTML;

// HTML structure printing.
echo $view;