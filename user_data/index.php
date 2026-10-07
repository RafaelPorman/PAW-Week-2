<?php
$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';
$fields = [
    'name' => 'Nama',
    'email' => 'Email',
    'gender' => 'Jenis Kelamin',
    'address' => 'Alamat',
    'phone' => 'Nomor Telepon',
];
$data = [];
foreach ($fields as $key => $label) {
    $data[$key] = trim($_POST[$key] ?? '');
}

$errors = [];
if ($submitted) {
    foreach ($fields as $key => $label) {
        if ($data[$key] === '') {
            $errors[] = "$label wajib diisi.";
        }
    }
    if ($data['email'] !== '' && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Masukkan alamat email yang valid.';
    }
    if ($data['gender'] !== '' && !in_array($data['gender'], ['Laki-laki', 'Perempuan'], true)) {
        $errors[] = 'Pilih jenis kelamin yang tersedia.';
    }
}

$success = $submitted && !$errors;
$escape = static fn($value) => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Data Pengguna</title>
    <style>
        * { box-sizing: border-box; }
        body {
            min-height: 100vh; margin: 0; padding: 32px 16px; display: grid; place-items: center;
            background: #f3f6fb; color: #172033; font: 16px Arial, sans-serif;
        }
        main {
            width: min(100%, 540px); padding: 30px; background: white; border: 1px solid #e4e9f2;
            border-radius: 14px; box-shadow: 0 12px 36px #1c2d4e14;
        }
        h1 { margin: 0 0 8px; }
        p { margin: 0 0 24px; color: #68748a; line-height: 1.5; }
        .field { margin-bottom: 18px; }
        label, legend { display: block; margin-bottom: 8px; font-weight: bold; }
        input:not([type=radio]), textarea {
            width: 100%; padding: 12px; border: 1px solid #cbd3e0; border-radius: 8px; font: inherit;
        }
        textarea { min-height: 90px; resize: vertical; }
        fieldset { margin: 0; padding: 0; border: 0; }
        .options { display: flex; gap: 20px; }
        .options label { display: flex; align-items: center; gap: 7px; font-weight: normal; }
        button, .button {
            display: block; width: 100%; padding: 13px; border: 0; border-radius: 8px;
            background: #285bd4; color: white; font: inherit; font-weight: bold;
            text-align: center; text-decoration: none; cursor: pointer;
        }
        button:hover, .button:hover { background: #1f4bb5; }
        .notice { margin-bottom: 20px; padding: 14px; border-radius: 8px; line-height: 1.5; }
        .error { border: 1px solid #f0c5c5; background: #fff3f3; color: #8d2525; }
        .success { border: 1px solid #b9e4cc; background: #effaf3; color: #205c37; }
        .result { margin: 16px 0 22px; }
        .result div { display: grid; grid-template-columns: 140px 1fr; gap: 12px; padding: 8px 0; border-bottom: 1px solid #d9eddf; }
        .result dt { font-weight: bold; }
        .result dd { margin: 0; overflow-wrap: anywhere; }
        @media (max-width: 480px) {
            main { padding: 22px 18px; }
            .result div { grid-template-columns: 1fr; gap: 4px; }
        }
    </style>
</head>
<body>
<main>
    <?php if ($success): ?>
        <h1>Data berhasil dikirim!</h1>
        <p>Berikut data yang sudah Anda masukkan:</p>
        <dl class="result">
            <?php foreach ($fields as $key => $label): ?>
                <div>
                    <dt><?= $escape($label) ?></dt>
                    <dd><?= $key === 'address' ? nl2br($escape($data[$key])) : $escape($data[$key]) ?></dd>
                </div>
            <?php endforeach; ?>
        </dl>
        <a class="button" href="index.php">Isi Data Lagi</a>
    <?php else: ?>
        <h1>Form Data Pengguna</h1>
        <p>Silakan isi semua data berikut.</p>

        <?php if ($errors): ?>
            <div class="notice error" role="alert">
                <strong>Periksa kembali data Anda:</strong>
                <ul><?php foreach ($errors as $error): ?><li><?= $escape($error) ?></li><?php endforeach; ?></ul>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="field">
                <label for="name">Nama</label>
                <input id="name" name="name" value="<?= $escape($data['name']) ?>" autocomplete="name" required>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= $escape($data['email']) ?>" autocomplete="email" required>
            </div>
            <div class="field">
                <fieldset>
                    <legend>Jenis Kelamin</legend>
                    <div class="options">
                        <?php foreach (['Laki-laki', 'Perempuan'] as $gender): ?>
                            <label><input type="radio" name="gender" value="<?= $escape($gender) ?>" <?= $data['gender'] === $gender ? 'checked' : '' ?> required> <?= $escape($gender) ?></label>
                        <?php endforeach; ?>
                    </div>
                </fieldset>
            </div>
            <div class="field">
                <label for="address">Alamat</label>
                <textarea id="address" name="address" autocomplete="street-address" required><?= $escape($data['address']) ?></textarea>
            </div>
            <div class="field">
                <label for="phone">Nomor Telepon</label>
                <input type="tel" id="phone" name="phone" value="<?= $escape($data['phone']) ?>" autocomplete="tel" required>
            </div>
            <button type="submit">Submit</button>
        </form>
    <?php endif; ?>
</main>
</body>
</html>
