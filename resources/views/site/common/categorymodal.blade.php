<!-- Modal Category -->
<div class="modal fade" id="popupSelectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body" id="modal-popup-body">
            </div>                    
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#popupSelectModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var source = button.data('href');
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);

        $.get(source, function (data) {
            modal.find('#modal-popup-body').html(data);
        });
    });
</script>