<div class="card shadow">

    <div class="card-header custom-header">

        <h4 class="mb-0">

            <i class="bi bi-person-plus-fill"></i>

            Tambah Data Pegawai

        </h4>

    </div>

    <div class="card-body">

        <form
        action="controller/PegawaiController.php"
        method="POST"
        enctype="multipart/form-data">

        <div class="row">

            <!-- KIRI -->

            <div class="col-md-8">

                <div class="mb-3">

                    <label class="form-label">

                        Nomor Pegawai

                    </label>

                    <input
                    type="text"
                    name="nomor_pegawai"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Nama Pegawai

                    </label>

                    <input
                    type="text"
                    name="nama_pegawai"
                    class="form-control"
                    required>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label>Email</label>

                            <input
                            type="email"
                            name="email"
                            class="form-control"
                            required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label>No Telepon</label>

                            <input
                            type="text"
                            name="no_telp"
                            class="form-control"
                            required>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label>Status</label>

                            <select
                            name="status"
                            class="form-select"
                            required>

                                <option value="">-- Pilih --</option>

                                <option>Tetap</option>

                                <option>Kontrak</option>

                                <option>Magang</option>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label>Tanggal Masuk</label>

                            <input
                            type="date"
                            name="tanggal_mendaftar"
                            class="form-control"
                            required>

                        </div>

                    </div>

                </div>

            </div>

            <!-- KANAN -->

            <div class="col-md-4">

                <div class="text-center">

                    <img
                    src="uploads/default.png"
                    id="preview"
                    class="img-thumbnail rounded-circle mb-3"
                    width="200"
                    height="200"
                    style="object-fit:cover;">

                    <input
                    type="file"
                    name="foto"
                    class="form-control"
                    accept="image/*"
                    onchange="previewFoto(event)">

                </div>

            </div>

        </div>

        <hr>

        <button
        class="btn btn-theme"
        name="simpan">

            <i class="bi bi-save-fill"></i>

            Simpan

        </button>

        <a
        href="dashboard.php?page=pegawai"
        class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Kembali

        </a>

        </form>

    </div>

</div>

<script>

function previewFoto(event){

    let reader = new FileReader();

    reader.onload=function(){

        document.getElementById('preview').src=reader.result;

    }

    reader.readAsDataURL(event.target.files[0]);

}

</script>