<!-- Modal -->
<div class="modal fade" id="balanceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Your current financial balance.</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @if (empty($balance->total_balance))
            <p class="fw-bold fs-1 text-center">P0</p>
          @else
            <p class="fw-bold fs-1 text-center">P{{ number_format($balance->total_balance) }}</p>
          @endif
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>