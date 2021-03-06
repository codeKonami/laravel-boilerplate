@extends('backend.body')

@section('header_title', trans('labels.backend.users.titles.main'))
@section('header_description', trans('labels.backend.users.titles.index'))

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('labels.backend.users.titles.index')</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="users-table" class="table table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th>@lang('validation.attributes.name')</th>
                            <th>@lang('validation.attributes.email')</th>
                            <th>@lang('validation.attributes.active')</th>
                            <th>@lang('validation.attributes.role')</th>
                            <th>@lang('labels.created_at')</th>
                            <th>@lang('labels.updated_at')</th>
                            <th>@lang('labels.actions')</th>
                        </tr>
                        </thead>
                    </table>
                    <a href="{{ route('admin.user.create') }}" class="btn btn-success btn-xs">@lang('buttons.create')</a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#users-table').DataTable({
                lengthChange: false,
                searching: false,
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.user.search") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'active', name: 'active', sortable: false},
                    {data: 'role', name: 'role', sortable: false},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false, width: 75}
                ],
                order: [[5, 'desc']]
            });
        });
    </script>
@endsection