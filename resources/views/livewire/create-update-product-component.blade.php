<div>
    @section('title')
        @if ($updateMode == true)
            Edit Product
        @else
            Create Product
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

        <script>
            $(function() {
                bsCustomFileInput.init();
            });
            $(function() {
                // Summernote
                $('#summernote').summernote()

            })
        </script>

        <!-- Select2 -->
        <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>

        <script>
            $('.select2bs4').select2({
                theme: 'bootstrap4',
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
            Edit Product
        @else
            New Product
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
                                    Edit Product
                                @else
                                    Create Product
                                @endif
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form
                            @if ($updateMode == true) wire:submit.prevent="update({{ $product }})"@else wire:submit.prevent="store" @endif>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input wire:model="product_name" type="text" class="form-control" id=""
                                        placeholder="Enter Product Name">

                                </div>
                                @error('product_name')
                                    <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label>Category</label>
                                    <select wire:model="category_id" class="form-control select2bs4"
                                        style="width: 100%;">
                                        <option value="0">Choose Category</option>
                                        @foreach ($categories as $cat)
                                            <option
                                                @if ($updateMode == true) selected="{{ $category_id }}" @endif
                                                value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('category_id')
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
                                        <label for="">Product Description</label>
                                        <textarea wire:model="product_description" id="summernote">
                                    
                                  </textarea>
                                    </div>
                                    @error('product_description')
                                        <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    @if ($updateMode == false)
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Quantity</label>

                                                <input wire:model="stock_level" type="number" min="1"
                                                    class="form-control" placeholder="Quantity">

                                            </div>
                                            @error('stock_level')
                                                <span class="text-danger"
                                                    style="font-size: 11.5px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    @endif

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Price (GHS)</label>

                                            <input wire:model="price" type="number" min="1" class="form-control"
                                                placeholder="Price">

                                        </div>
                                        @error('price')
                                            <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label> Status</label>
                                            <select wire:model="status" class="form-control" style="width: 100%;">
                                                <option value="0"> Select Status</option>
                                                <option value="instock">In Stock</option>
                                                <option value="outofstock">Out of stock</option>

                                            </select>
                                        </div>
                                        @error('status')
                                            <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                                        @enderror
                                    </div>

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
