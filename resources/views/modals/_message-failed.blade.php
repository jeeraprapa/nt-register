
<div class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="automodal" id="automodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">ผิดพลาด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="p-3 text-center">
                    {{ session()->get('MessageFailed') }}
                </p>
            </div>
        </div>
    </div>
</div>
<script>
	$('#automodal').modal('show');
</script>
