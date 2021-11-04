<div class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="automodal" id="thank-you">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content p-3">
            <div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="col-md-12">
                    <img src="{{ asset('images/thankyou.png') }}" />
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#thank-you').modal('show');
</script>
