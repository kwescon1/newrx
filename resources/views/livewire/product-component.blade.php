<div>
    @section('title')
        Products
    @endsection
    @section('page')
        Products
    @endsection
    @section('links')
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @endsection
    @section('scripts')
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
    @endsection

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title"> <a href="{{ route('articles.create') }}" class="btn btn-warning"
                                    style="float: right">New
                                    Product</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Product Code
                                    </th>
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                        Current Stock
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Description
                                    </th>

                                    <th class="text-right">
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $row)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $row->category->name }}
                                            </td>
                                            <td>
                                                {{ $row->product_name }}
                                            </td>
                                            <td>
                                                {{ $row->product_code }}
                                            </td>
                                            <td>
                                                <img src="{{ $row->image }}" height="100px" width="100px">
                                            </td>

                                            <td>
                                                {{ $row->stock_level }}
                                            </td>
                                            <td>
                                                {{ $row->status }}
                                            </td>
                                            <td>
                                                {{ $row->price }}
                                            </td>
                                            <td>
                                                {{ $row->product_description }}
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('products.create', ['pId' => $row->id]) }}"
                                                    class="btn btn-sm btn-info">Edit</a>

                                                <button class="btn btn-sm btn-danger" x-data={}
                                                    x-on:click="window.livewire.emitTo('.delete-modal','showModal','App\\Models\\Article',{{ $row->id }},'Delete Article','Are you sure you want to delete article {{ $row->title }}')"><i
                                                        class="fa fa-trash"></i></button>
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
