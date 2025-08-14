<!-- Modal -->
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addModal" tabindex="-1"
    aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="showModalLabel">
                    <i class="bi bi-briefcase-fill me-2"></i>Add News Event
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('profile.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row g-4 p-2">
                        <div class="col-md-6">
                            <label class="form-label mb-1">Nama Lengkap</label>
                            <input type="text" name="namaLengkap" class="form-control py-2"
                                placeholder="Masukkan nama lengkap Anda" required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-1">Kelahiran</label>
                            <input type="date" name="kelahiran" class="form-control py-2"
                                placeholder="Pilih tanggal lahir" required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-1">Jenis Kelamin</label>
                            <select class="form-select py-2" name="kelamin" required>
                                <option value="" selected disabled>Pilih jenis kelamin</option>
                                <option value="Laki Laki">Laki Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Pendidikan</label>
                            <input type="text" name="pendidikan" class="form-control py-2"
                                placeholder="Masukkan pendidikan terakhir" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Kategori</label>
                            <input type="text" name="category" class="form-control py-2"
                                placeholder="Masukkan kategori (ex: Mahasiswa, Freshgraduate)" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">No Telp</label>
                            <input type="number" min="0" name="telp" class="form-control py-2"
                                placeholder="Masukkan nomor telepon" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">CV (PDF)</label>
                            <input type="file" name="docCV" class="form-control py-2" placeholder="Upload CV"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label mb-1">Photo Profile</label>
                            <input type="file" name="photo" class="form-control py-2"
                                placeholder="Upload foto profil" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label mb-1">Domisili</label>
                            <textarea name="domisili" class="form-control py-2" rows="2" placeholder="Masukkan alamat domisili Anda" required></textarea>
                        </div>

                        <div class="">
                            <hr>
                        </div>

                        {{-- <div class="col-md-4">
                            <label class="form-label mb-1">Pengalaman Kerja 1</label>
                            <input type="text" name="pengKerja1" class="form-control py-2"
                                placeholder="Masukkan pengalaman kerja pertama" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Pengalaman Kerja 2</label>
                            <input type="text" name="pengKerja2" class="form-control py-2"
                                placeholder="Masukkan pengalaman kerja kedua (opsional)">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Pengalaman Kerja 3</label>
                            <input type="text" name="pengKerja3" class="form-control py-2"
                                placeholder="Masukkan pengalaman kerja ketiga (opsional)">
                        </div> --}}

                        <p class="mb-0 fst-italic text-danger">Pengalaman Kerja 1*</p>
                        <div class="col-md-5 mt-1">
                            <label class="form-label mb-1">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan1" class="form-control py-2"
                                placeholder="Silahkan masukkan Data" required>
                        </div>

                        <div class="col-md-2 mt-md-1">
                            <label class="form-label mb-1">Tahun</label>
                            <input type="text" name="tahun1" class="form-control py-2"
                                placeholder="Silahkan masukkan Data" required>
                        </div>

                        <div class="col-md-5 mt-md-1">
                            <label class="form-label mb-1">Posisi</label>
                            <input type="text" name="posisi1" class="form-control py-2"
                                placeholder="Silahkan masukkan Data" required>
                        </div>

                        <div class="col-md-5 mt-md-1">
                            <label class="form-label mb-1">Produk</label>
                            <input type="text" name="produk1" class="form-control py-2"
                                placeholder="Silahkan masukkan Data" required>
                        </div>

                        <div class="col-md-7 mt-md-1">
                            <label class="form-label mb-1">Alasan Keluar</label>
                            <input type="text" name="alasan1" class="form-control py-2"
                                placeholder="Silahkan masukkan Data" required>
                        </div>

                        <p class="mb-0 fst-italic text-danger">Pengalaman Kerja 2</p>
                        <div class="col-md-5 mt-1">
                            <label class="form-label mb-1">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan2" class="form-control py-2"
                                placeholder="Silahkan masukkan Data" required>
                        </div>

                        <div class="col-md-2 mt-md-1">
                            <label class="form-label mb-1">Tahun</label>
                            <input type="text" name="tahun2" class="form-control py-2"
                                placeholder="Silahkan masukkan Data" required>
                        </div>

                        <div class="col-md-5 mt-md-1">
                            <label class="form-label mb-1">Posisi</label>
                            <input type="text" name="posisi2" class="form-control py-2"
                                placeholder="Silahkan masukkan Data" required>
                        </div>

                        <div class="col-md-5 mt-md-1">
                            <label class="form-label mb-1">Produk</label>
                            <input type="text" name="produk2" class="form-control py-2"
                                placeholder="Silahkan masukkan Data" required>
                        </div>

                        <div class="col-md-7 mt-md-1">
                            <label class="form-label mb-1">Alasan Keluar</label>
                            <input type="text" name="alasan2" class="form-control py-2"
                                placeholder="Silahkan masukkan Data" required>
                        </div>

                        <p class="mb-0 fst-italic text-danger">Pengalaman Kerja 3</p>
                        <div class="col-md-5 mt-1">
                            <label class="form-label mb-1">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan3" class="form-control py-2"
                                placeholder="Silahkan masukkan Data" required>
                        </div>

                        <div class="col-md-2 mt-md-1">
                            <label class="form-label mb-1">Tahun</label>
                            <input type="text" name="tahun3" class="form-control py-2"
                                placeholder="Silahkan masukkan Data" required>
                        </div>

                        <div class="col-md-5 mt-md-1">
                            <label class="form-label mb-1">Posisi</label>
                            <input type="text" name="posisi3" class="form-control py-2"
                                placeholder="Silahkan masukkan Data" required>
                        </div>

                        <div class="col-md-5 mt-md-1">
                            <label class="form-label mb-1">Produk</label>
                            <input type="text" name="produk3" class="form-control py-2"
                                placeholder="Silahkan masukkan Data" required>
                        </div>

                        <div class="col-md-7 mt-md-1">
                            <label class="form-label mb-1">Alasan Keluar</label>
                            <input type="text" name="alasan3" class="form-control py-2"
                                placeholder="Silahkan masukkan Data" required>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-none" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
