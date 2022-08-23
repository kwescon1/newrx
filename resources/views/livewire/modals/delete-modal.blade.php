<div x-data="{ show: @entangle('showModal') }" x-show="show" x-cloak>
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $modalHeading }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ $modalMessage }}</p>
                </div>
                <div class="modal-footer">

                    <button wire:click="destroy" type="button" class="btn btn-danger">Delete</button>
                    <button @click="show=false" type="button" class="btn btn-primary">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
