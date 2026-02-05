<?= $this->include('admin/layout/header') ?>

<h4 class="text-lg font-semibold mb-2">Tambah Anggota</h4>

<form action="<?= base_url('admin/struktur/anggota/simpan') ?>" method="post"
    class="space-y-3 max-w-md">

    <!-- LEVEL -->
    <select id="level"
        class="w-full border rounded px-3 py-2"
        required>
        <option value="">-- Pilih Level --</option>
        <?php foreach ($level as $l): ?>
            <option value="<?= $l['id_level'] ?>">
                <?= $l['nama_level'] ?>
            </option>
        <?php endforeach ?>
    </select>

    <!-- JABATAN -->
    <select name="id_jabatan" id="jabatan"
        class="w-full border rounded px-3 py-2"
        required>
        <option value="">-- Pilih Jabatan --</option>
    </select>

    <input type="text" name="nama"
        class="w-full border rounded px-3 py-2"
        placeholder="Nama Anggota" required>

    <input type="text" name="gelar"
        class="w-full border rounded px-3 py-2"
        placeholder="Gelar">

    <input type="number" name="urutan"
        class="w-full border rounded px-3 py-2"
        placeholder="Urutan">

    <button
        class="bg-slate-800 text-white px-4 py-2 rounded hover:bg-slate-900">
        Simpan
    </button>
</form>

<script>
    document.getElementById('level').addEventListener('change', function() {
        const levelId = this.value;
        const jabatanSelect = document.getElementById('jabatan');

        jabatanSelect.innerHTML =
            '<option value="">Loading...</option>';

        if (!levelId) return;

        fetch(`<?= base_url('admin/struktur/jabatan-by-level') ?>/${levelId}`)
            .then(res => res.json())
            .then(data => {
                let option = '<option value="">-- Pilih Jabatan --</option>';
                data.forEach(j => {
                    option += `<option value="${j.id_jabatan}">
                    ${j.nama_jabatan}
                </option>`;
                });
                jabatanSelect.innerHTML = option;
            });
    });
</script>


<?= $this->include('admin/layout/footer') ?>