<div>
    @section('title')
        @if ($updateMode == true)
            Edit Article
        @else
            Create Article
        @endif
    @endsection
    @section('links')
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    @endsection
    @section('scripts')
        <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
        <!-- Summernote -->
        <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

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
            Edit Article
        @else
            New Article
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
                                    Edit Article
                                @else
                                    Create Article
                                @endif
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form
                            @if ($updateMode == true) wire:submit.prevent="update"@else wire:submit.prevent="store" @endif>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input wire:model="title" type="text" class="form-control" id=""
                                        placeholder="Enter Title">

                                </div>
                                @error('title')
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
                                        <label for="">Content</label>
                                        <textarea wire:model.defer="content" id="summernote">
                                    
                                  </textarea>
                                    </div>
                                    @error('content')
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
