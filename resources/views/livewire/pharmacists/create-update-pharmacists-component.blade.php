<div>
    @section('title')
        @if ($updateMode == true)
            Edit Pharmacist
        @else
            New Pharmacist
        @endif
    @endsection
    @section('links')
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">

        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    @endsection
    @section('scripts')
        <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
        <!-- Summernote -->
        <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

        <!-- Select2 -->
        <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>

        <script>
            $('.select2bs4').select2({
                theme: 'bootstrap4',
            })
        </script>

        <script>
            $(function() {
                bsCustomFileInput.init();
            });
            $(function() {
                // Summernote
                $('#summernote').summernote()

            })
        </script>

        <script>
            window.addEventListener('contentChanged', event => {
                $('#summernote').summernote();
                bsCustomFileInput.init();
            });
        </script>
    @endsection
    @section('page')
        @if ($updateMode == true)
            Edit Pharmacist
        @else
            New Pharmacist
        @endif
    @endsection
    <!-- Main content -->
    <section class="content" wire:ignore.self>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                @if ($updateMode == true)
                                    Edit Pharmacist
                                @else
                                    Create Pharmacist
                                @endif
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form
                            @if ($updateMode == true) wire:submit.prevent="update"@else wire:submit.prevent="store" @endif>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <select wire:model="title" class="form-control select2bs4" style="width: 100%;">
                                        <option>Mr.</option>
                                        <option> Miss.</option>
                                        <option> Mrs.</option>
                                        <option> Prof.</option>
                                        <option> Doc.</option>
                                    </select>
                                </div>
                                @error('title')
                                    <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input wire:model="name" type="text" class="form-control" id=""
                                        placeholder="Enter Name">

                                </div>
                                @error('name')
                                    <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input wire:model="email" type="email" class="form-control" id=""
                                        placeholder="Enter Email">

                                </div>
                                @error('email')
                                    <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input wire:model="image" type="file" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="">Choose Image</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>

                                    </div>
                                    @error('image')
                                        <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address</label>
                                        <input wire:model="address" type="address" class="form-control" id=""
                                            placeholder="Enter Address">

                                    </div>
                                    @error('address')
                                        <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    @if ($updateMode == true)
                                        <button class="btn btn-primary">Update</button>
                                        <button class="btn btn-danger"
                                            wire:click.preventDefault="cancel()">Cancel</button>
                                    @else
                                        <button class="btn btn-primary">
                                            Save
                                        </button>
                                    @endif
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
