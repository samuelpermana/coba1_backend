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
          <label class="form-check-label" for="category-success">Rapat A</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" id="category-danger" name="category" type="radio" value="danger" {{ $data->category == "danger" ? "checked" : null }}>
          <label class="form-check-label" for="category-danger">Rapat B</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" id="category-warning" name="category" type="radio" value="warning" {{ $data->category == "warning" ? "checked" : null }}>
          <label class="form-check-label" for="category-warning">Rapat C</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" id="category-info" name="category" type="radio" value="info" {{ $data->category == "info" ? "checked" : null }}>
          <label class="form-check-label" for="category-info">Rapat D</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" id="category-info" name="category" type="radio" value="disabled" {{ $data->category == "info" ? "checked" : null }}>
          <label class="form-check-label" for="category-info">Rapat E</label>
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
