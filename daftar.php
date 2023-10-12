<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>membuat form</title>
    <link rel="stylesheet" href="dftr.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap">
</head>
<body>
    <div class="container">
        <form action="koneksi.php" >
            <h4>Pendaftaran</h4>
            <div class="input-section">
                <label>Nama Depan <span class="required-color">*</span></label>
                <input type="text" placeholder="Masukan Nama Depan" id="first-name-input" required />
                <span id="first-name-error" class="hide required-color error-message">Inputan Tidak Valid</span>
                <span id="empty-first-name" class="hide required-color error-message">Nama Depan tidak boleh dikosongkan</span>
            </div>
            <div class="input-section">
                <label>Nama Belakang <span class="required-color">*</span></label>
                <input type="text" placeholder="Masukan Nama Belakang" id="last-name-input" required />
                <span id="last-name-error" class="hide required-color error-message">Inputan Tidak Valid</span>
                <span id="empty-first-name" class="hide required-color error-message">Nama Belakang tidak boleh dikosongkan</span>
            </div>
            <div class="input-section">
                <label>email<span class="required-color">*</span></label>
                <input type="email" placeholder="Masukan Email" id="email" required />
                <span id="email-error" class="hide required-color error-message">Inputan Tidak Valid</span>
                <span id="empty-email" class="hide required-color error-message">Email tidak boleh dikosongkan</span>
            </div>
            <div class="input-section">
                <label>nomer telepon<span class="required-color">*</span></label>
                <input type="text" placeholder="Masukan nomor telepon" id="phone" required />
                <span id="phone-error" class="hide required-color error-message">Nomor telepon harus terdiri 12 digit</span>
                <span id="empty-phone" class="hide required-color error-message">Nomor telepon tidak boleh dikosongkan</span>
            </div>
            <div class="input-section">
                <label>password<span class="required-color">*</span></label>
                <input type="text" placeholder="Masukan password" id="password" required />
                <span id="password-error" class="hide required-color error-message">Password harus 8 karakter</span>
                <span id="empty-password" class="hide required-color error-message">password tidak boleh dikosongkan</span>
            </div>
            <div class="input-section">
                <label>Konfirmasi Password<span class="required-color">*</span></label>
                <input type="password" placeholder="ulangi password" id="verify-password" required />
                <span id="verify-password-error" class="hide required-color error-message">Harus sama dengan password sebelumnnya</span>
                <span id="empty-verify-password" class="hide required-color error-message">password tidak boleh dikosongkan</span>
            </div>
            <button id="submit-button" href="index.html">Daftar</button>


        </form>
    </div>
    <script src="script.js"></script>

</body>
</html>