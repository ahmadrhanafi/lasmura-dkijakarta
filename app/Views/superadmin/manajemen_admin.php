<?= $this->include('admin/layout/header') ?>

<main class="p-6">

    <?php if (session()->getFlashdata('success')): ?>
        <div class="mb-4 bg-green-100 text-green-700 p-3 rounded">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">Username</th>
                    <th class="px-4 py-2">Role</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                    <tr class="border-t">
                        <td class="px-4 py-2"><?= esc($u['nama_lengkap']) ?></td>
                        <td class="px-4 py-2"><?= esc($u['username']) ?></td>
                        <td class="px-4 py-2 text-center">
                            <span class="px-2 py-1 rounded text-xs
                                <?= $u['role']=='admin'
                                    ? 'bg-blue-100 text-blue-700'
                                    : 'bg-gray-100 text-gray-700' ?>">
                                <?= $u['role'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <form method="post"
                                  action="<?= base_url('/super-admin/admin/update-role/'.$u['id_user']) ?>"
                                  class="inline">
                                <select name="role"
                                        onchange="this.form.submit()"
                                        class="border rounded px-2 py-1 text-sm">
                                    <option disabled selected>Ubah Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="anggota">Anggota</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</main>

<?= $this->include('admin/layout/footer') ?>
