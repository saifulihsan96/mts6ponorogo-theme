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
$class_name = 'block-buku-tamu';

if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$dataUser = FTR_URI . '/assets/image/data-user.svg';
$dateTime = FTR_URI . '/assets/image/date-time.svg';
$user = FTR_URI . '/assets/image/user.svg';
$document = FTR_URI . '/assets/image/document.svg';

$terms = get_terms( array(
    'taxonomy'   => 'guru--staf', 
    'hide_empty' => false,
) );

$stafOptions = '';
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
  foreach ( $terms as $term ) {
    $stafOptions .= '<option value="' . esc_attr( $term->name ) . '">' . esc_html( $term->name ) . '</option>';
  }
}

/**
 * This variable as the HTML structure for the block buku tamu view.
 * Section 'block-buku-tamu'.
 */
$view = <<<HTML
	<section id="section-{$id}" class="{$class_name}">
		<div class="mts-container">
      <div class="block-book-container">
        <div class="block-book-text">
          <h2>Buku Tamu Digital Madrasah</h2>
          <p>Form pencatatan kunjungan tamu untuk membantu madrasah menyambut dan mengarahkan tamu ke tujuan yang tepat.</p>
          <div class="items-text">
            <img src="{$dataUser}" alt="date" />
            <p>Waktu kunjungan tercatat otomatis saat formulir dikirim.</p>
          </div>
          <div class="line"></div>
          <div class="items-text">
            <img src="{$dateTime}" alt="time" />
            <p>Data dipakai untuk kebutuhan administrasi kunjungan dan hanya dilihat petugas berwenang.</p>
          </div>
        </div>

        <div class="block-book-form">
          <form class="books-form form-service" action="" method="post" novalidate>
            <div class="label-column">
              <img src="{$user}" alt="user" />
              <p>Identitas Tamu</p>
            </div>

            <div class="form-row">
              <div class="form-group isRequired">
                <label for="nama">Nama Lengkap <span class="required-asterisk">*</span></label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama" />
                <div class="error-message"></div>
              </div>
              <div class="form-group isRequired">
                <label for="whatsapp">Nomer Whatsapp <span class="required-asterisk">*</span></label>
                <input type="text" id="whatsapp" name="whatsapp" placeholder="Masukkan nomer whatsapp" />
                <div class="error-message"></div>
              </div>
            </div>
            <div class="form-group isRequired">
              <label for="asal">Asal Instansi / Perusahaan <span class="required-asterisk">*</span></label>
              <input type="text" id="asal" name="asal" placeholder="Masukkan Asal Instansi / Perusahaan" />
              <div class="error-message"></div>
            </div>
            <div class="form-group isRequired">
              <label for="kategori">Kategori Kunjungan <span class="required-asterisk">*</span></label>
              <div class="select-wrapper">
                <select id="kategori" name="kategori" required>
                  <option value="" disabled selected hidden>Pilih Kategori Kunjungan</option>
                  <option value="Orang Tua / Wali Murid">Orang Tua / Wali Murid</option>
                  <option value="Dinas / Kedinasan">Dinas / Kedinasan</option>
                  <option value="Masyarakat Umum / Alumni">Masyarakat Umum / Alumni</option>
                  <option value="Mitra Bisnis / Vendor">Mitra Bisnis / Vendor</option>
                  <option value="Akademik / Peneliti">Akademik / Peneliti</option>
                </select>
              </div>
              <div class="error-message"></div>
            </div>

            <div class="line"></div>

            <div class="label-column">
              <img src="{$document}" alt="target" />
              <p>Tujuan dan Keperluan</p>
            </div>

            <div class="form-group isRequired">
              <label for="staf">Guru / Staf yang Dituju <span class="required-asterisk">*</span></label>
              <div class="select-wrapper">
                <select id="staf" name="staf" required>
                  <option value="" disabled selected hidden>Pilih Guru / Staf yang Dituju</option>
                  {$stafOptions}
                </select>
              </div>
              <div class="error-message"></div>
            </div>
            <div class="form-group isRequired">
              <label for="ruangan">Ruangan atau Tujuan Lain <span class="required-asterisk">*</span></label>
              <input type="text" id="ruangan" name="ruangan" placeholder="Masukkan Ruangan / Tujuan Lain" />
              <div class="error-message"></div>
            </div>
            <div class="form-group isRequired">
              <label for="keperluan">Keperluan Singkat <span class="required-asterisk">*</span></label>
              <textarea id="keperluan" name="keperluan" rows="4" placeholder="Masukkan Keperluan Singkat" required></textarea>
              <div class="error-message"></div>
            </div>

            <button type="button" class="btn-next btn-send-book">
              <span>Catat Kunjungan</span>
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"></polyline>
              </svg>
            </button>
          </form> 
          
          <!-- Success Message Content -->
          <div class="success-content">
            <div class="surve-success-box">
              <div class="icon-success">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#108448" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                  <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
              </div>
              <h3>Terima Kasih!</h3>
              <p>Kunjungan anda telah tercatat.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
	</section>
HTML;

// HTML structure printing.
echo $view;
