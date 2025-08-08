@php
    $pengKerja1 = explode(' | ', $editBio->pengKerja1 ?? '');
    $pengKerja2 = explode(' | ', $editBio->pengKerja2 ?? '');
    $pengKerja3 = explode(' | ', $editBio->pengKerja3 ?? '');
@endphp

<!-- Modal -->
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="updateModalBio" tabindex="-1"
    aria-labelledby="updateModalBioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="updateModalBioLabel">
                    <i class="bi bi-person-lines-fill me-2"></i>Update Biodata
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('profile.update', $editBio->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-4 p-2 mb-4">
                        <div class="col-md-6">
                            <label class="form-label mb-1">Nama Lengkap</label>
                            <input type="text" name="namaLengkap" class="form-control py-2"
                                value="{{ $editBio->namaLengkap }}" required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-1">Kelahiran</label>
                            <input type="date" name="kelahiran" class="form-control py-2"
                                value="{{ $editBio->kelahiran }}" required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label mb-1">Jenis Kelamin</label>
                            <select class="form-select py-2" name="kelamin" required>
                                <option value="Laki Laki" {{ $editBio->kelamin == 'Laki Laki' ? 'selected' : '' }}>
                                    Laki Laki</option>
                                <option value="Perempuan" {{ $editBio->kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Pendidikan</label>
                            <input type="text" name="pendidikan" class="form-control py-2"
                                value="{{ $editBio->pendidikan }}" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">Kategori</label>
                            <input type="text" name="category" class="form-control py-2"
                                value="{{ $editBio->category }}" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">No Telp</label>
                            <input type="number" min="0" name="telp" class="form-control py-2"
                                value="{{ $editBio->telp }}" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label mb-1">CV (PDF)</label>
                            @if ($editBio->docCV)
                                <p class="mb-1 text-muted">File saat ini: <a
                                        href="{{ asset('storage/' . $editBio->docCV) }}" target="_blank">Lihat CV</a>
                                </p>
                            @endif
                            <input type="file" name="docCV" class="form-control py-2">
                        </div>

                        <div class="col-md-8">
                            <label class="form-label mb-1">Domisili</label>
                            <textarea name="domisili" class="form-control py-2" rows="2" required>{{ $editBio->domisili }}</textarea>
                        </div>


                        <div class="">
                            <hr>
                        </div>

                        <p class="mb-0 fst-italic text-danger">Pengalaman Kerja 1*</p>
                        <div class="col-md-5 mt-1">
                            <label class="form-label mb-1">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan1" class="form-control py-2"
                                value="{{ $pengKerja1[0] ?? '-' }}" required>
                        </div>

                        <div class="col-md-2 mt-md-1">
                            <label class="form-label mb-1">Tahun</label>
                            <input type="text" name="tahun1" class="form-control py-2"
                                value="{{ $pengKerja1[1] ?? '-' }}" required>
                        </div>

                        <div class="col-md-5 mt-md-1">
                            <label class="form-label mb-1">Posisi</label>
                            <input type="text" name="posisi1" class="form-control py-2"
                                value="{{ $pengKerja1[2] ?? '-' }}" required>
                        </div>

                        <div class="col-md-5 mt-md-1">
                            <label class="form-label mb-1">Produk</label>
                            <input type="text" name="produk1" class="form-control py-2"
                                value="{{ $pengKerja1[3] ?? '-' }}" required>
                        </div>

                        <div class="col-md-7 mt-md-1">
                            <label class="form-label mb-1">Alasan Keluar</label>
                            <input type="text" name="alasan1" class="form-control py-2"
                                value="{{ $pengKerja1[4] ?? '-' }}" required>
                        </div>

                        <p class="mb-0 fst-italic text-danger">Pengalaman Kerja 2</p>
                        <div class="col-md-5 mt-1">
                            <label class="form-label mb-1">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan2" class="form-control py-2"
                                value="{{ $pengKerja2[0] ?? '-' }}" required>
                        </div>

                        <div class="col-md-2 mt-md-1">
                            <label class="form-label mb-1">Tahun</label>
                            <input type="text" name="tahun2" class="form-control py-2"
                                value="{{ $pengKerja2[1] ?? '-' }}" required>
                        </div>

                        <div class="col-md-5 mt-md-1">
                            <label class="form-label mb-1">Posisi</label>
                            <input type="text" name="posisi2" class="form-control py-2"
                                value="{{ $pengKerja2[2] ?? '-' }}" required>
                        </div>

                        <div class="col-md-5 mt-md-1">
                            <label class="form-label mb-1">Produk</label>
                            <input type="text" name="produk2" class="form-control py-2"
                                value="{{ $pengKerja2[3] ?? '-' }}" required>
                        </div>

                        <div class="col-md-7 mt-md-1">
                            <label class="form-label mb-1">Alasan Keluar</label>
                            <input type="text" name="alasan2" class="form-control py-2"
                                value="{{ $pengKerja2[4] ?? '-' }}" required>
                        </div>

                        <p class="mb-0 fst-italic text-danger">Pengalaman Kerja 3</p>
                        <div class="col-md-5 mt-1">
                            <label class="form-label mb-1">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan3" class="form-control py-2"
                                value="{{ $pengKerja3[0] ?? '-' }}" required>
                        </div>

                        <div class="col-md-2 mt-md-1">
                            <label class="form-label mb-1">Tahun</label>
                            <input type="text" name="tahun3" class="form-control py-2"
                                value="{{ $pengKerja3[1] ?? '-' }}" required>
                        </div>

                        <div class="col-md-5 mt-md-1">
                            <label class="form-label mb-1">Posisi</label>
                            <input type="text" name="posisi3" class="form-control py-2"
                                value="{{ $pengKerja3[2] ?? '-' }}" required>
                        </div>

                        <div class="col-md-5 mt-md-1">
                            <label class="form-label mb-1">Produk</label>
                            <input type="text" name="produk3" class="form-control py-2"
                                value="{{ $pengKerja3[3] ?? '-' }}" required>
                        </div>

                        <div class="col-md-7 mt-md-1">
                            <label class="form-label mb-1">Alasan Keluar</label>
                            <input type="text" name="alasan3" class="form-control py-2"
                                value="{{ $pengKerja3[4] ?? '-' }}" required>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-none" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
