<!-- Modal -->
<div class="modal fade" id="withdrawModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Withdraw your hard-earned money.</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('deposit') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Kindly indicate the exact amount you wish to withdraw.</label>
              <input type="number" class="form-control" name="withdraw_amount">
              @error('deposit_amount')
                  <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Proceed..</button>
          </form>
        </div>
      </div>
    </div>
  </div>