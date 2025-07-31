<!-- Modal Detail Job -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header bg-pink text-white rounded-top-4 p-4">
                <h5 class="modal-title fw-semibold" id="showModalLabel">
                    <i class="bi bi-briefcase-fill me-2"></i>News & Event Details
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <div class="row g-4 p-2">

                    <div class="col-md-6">
                        <label class="form-label mb-1 text-muted">Title</label>
                        <div class="fw-medium">{{ $newsEvent->title ?? '-' }}</div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label mb-1 text-muted">Date</label>
                        <div class="fw-medium"><i
                                class="bi bi-calendar-event me-1 text-muted"></i>{{ \Carbon\Carbon::parse($newsEvent->event_date)->format('d M Y') }}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label mb-1 text-muted">Status</label>
                        <div class="fw-medium">
                            @if ($newsEvent->status == 'Published')
                                <span class="badge bg-success p-2 fw-medium"
                                    style="font-size: 14px">{{ $newsEvent->status }}</span>
                            @else
                                <span class="badge bg-danger p-2 fw-medium"
                                    style="font-size: 14px">{{ $newsEvent->status }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label mb-1 text-muted">Image</label>
                        <div class="fw-medium">
                            @if (empty($newsEvent->image))
                                <p class="text-danger">Anda belum upload image!</p>
                            @else
                                <img src="{{ asset('storage/' . $newsEvent->image) }}" alt="Cover Image"
                                    class="img-fluid">
                            @endif
                        </div>
                    </div>

                    <div class="col-8">
                        <label class="form-label mb-1 text-muted">Description</label>
                        <div class="fw-medium">{!! nl2br(e($newsEvent->content)) !!}</div>
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-light rounded-bottom-4">
                <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>
