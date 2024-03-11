<x-modal-action action="{{ $action }}">
  @if ($data->id)
    @method("put")
  @endif
  <div class="row">
    <div class="col-6">
      <div class="mb-3">
        <input class="form-control datepicker" name="start_date" type="text" value="{{ $data->start_date ?? request()->start_date }}" readonly>
      </div>
    </div>
    <div class="col-6">
      <div class="mb-3">
        <input class="form-control datepicker" name="end_date" type="text" value="{{ $data->end_date ?? request()->end_date }}" readonly>
      </div>
    </div>
    <div class="col-12">
      <div class="mb-3">
        <textarea class="form-control" name="title">{{ $data->title }}</textarea>
      </div>
    </div>
    <div class="col-12">
      <div class="mb-3">
            <div class="form-check form-check-inline">
          <input class="form-check-input" id="category-success" name="category" type="radio" value="success" {{ $data->category == "success" ? "checked" : null }}>
          <label class="form-check-label" for="category-success">Rapat Komisi</label>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input" id="category-danger" name="category" type="radio" value="danger" {{ $data->category == "danger" ? "checked" : null }}>
          <label class="form-check-label" for="category-danger">Rapat Badan</label>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input" id="category-warning" name="category" type="radio" value="warning" {{ $data->category == "warning" ? "checked" : null }}>
          <label class="form-check-label" for="category-warning">Rapat Senator</label>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input" id="category-info" name="category" type="radio" value="info" {{ $data->category == "info" ? "checked" : null }}>
          <label class="form-check-label" for="category-info">Sidang Pleno</label>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input" id="category-primary" name="category" type="radio" value="primary" {{ $data->category == "primary" ? "checked" : null }}>
          <label class="form-check-label" for="category-primary">Sidang Paripurna</label>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input" id="category-secondary" name="category" type="radio" value="secondary" {{ $data->category == "secondary" ? "checked" : null }}>
          <label class="form-check-label" for="category-secondary">Sidang Istimewa</label>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input" id="category-dark" name="category" type="radio" value="dark" {{ $data->category == "dark" ? "checked" : null }}>
          <label class="form-check-label" for="category-dark">Rapat Antar Alat Kelengkapan</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" id="category-light" name="category" type="radio" value="light" {{ $data->category == "light" ? "checked" : null }}>
        <label class="form-check-label" for="category-light">Rapat Dengar Pendapat</label>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input" id="category-link" name="category" type="radio" value="link" {{ $data->category == "link" ? "checked" : null }}>
          <label class="form-check-label" for="category-link">Rapat/Sidang lainnya</label>
      </div>

      </div>
    </div>
    <div class="col-12">
      <div class="mb-3">
        <div class="form-check form-switch">
          <input class="form-check-input" id="flexSwitchCheckDefault" name="delete" type="checkbox" role="switch">
          <label class="form-check-label" for="flexSwitchCheckDefault">Delete</label>
        </div>
      </div>
    </div>
  </div>
</x-modal-action>
