<div>
    @section('title')
        Categories
    @endsection
    @section('page')
        Categories
    @endsection
    @section('links')
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @endsection
    @section('scripts')
        {{-- <script>
            window.addEventListener('close-modal', event => {
                $('.new-category-modal').modal('hide');
                $('.editCategoryModal').modal('hide');
                $('#delete-modal-default').modal('hide');

            });
        </script> --}}
    @endsection
    {{-- @include('livewire.admin.modals.add_category_modal')
    @include('livewire.admin.modals.edit_category_modal')
    @include('livewire.admin.modals.del_cat_modal') --}}

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @include('livewire.modals.add-category-modal')
                        <div class="card-header">

                            <h6 class="card-title"> <a data-bs-toggle="modal" href="#" data-bs-target=".classname"
                                    class="btn btn-warning" style="float: right;">New
                                    Category</a>

                                {{-- <h6 class="card-title"> <a wire:click="$emit('openModal','modals.add-category-modal')"
                                    href="#" class="btn btn-warning" style="float: right;">New Category</a> --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Category Name
                                    </th>

                                    <th class="text-right">
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $row)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $row->name }}
                                            </td>

                                            <td class="text-right">
                                                <a href="" class="btn btn-sm btn-info" id="editCategory"
                                                    data-toggle="modal" data-target='.editCategoryModal'
                                                    wire:click="editCat('{{ $row->id }}')">Edit</a>


                                                <a href="#" wire:click="catData({{ $row->id }})"
                                                    class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#delete-modal-default">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>
