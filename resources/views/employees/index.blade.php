<x-app-layout>
    @pushOnce('links')
    <link href="{{ asset('assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    @endPushOnce
    
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">@lang('locale.employee', ['suffix'=>'s'])</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">@lang('locale.employee', ['suffix'=>'s'])</h4>
                    <table class="table table-striped datatable-buttons dt-responsive nowrap w-100">
                        <thead>
                            <th>#</th>
                            <th>@lang('locale.firstname')</th>
                            <th>@lang('locale.name')</th>
                            <th>@lang('locale.email')</th>
                            <th>@lang('locale.phone')</th>
                            <th>@lang('locale.grade')</th>
                            <th>@lang('locale.role')</th>
                            <th>@lang('locale.employee_type')</th>
                            <th>@lang('locale.status')</th>
                            <th>@lang('locale.hire_date')</th>
                            <th>@lang('locale.actions')</th>
                        </thead>
                        <tbody>
                            @foreach ($employees as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->firstname }}</td>
                                <td>{{ $item->lastname }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->grade }}</td>
                                <td>{{ $item->role }}</td>
                                <td>{{ $item->employee_type }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->hire_date }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
                <!-- end card body-->
            </div> 
            <!-- end card -->
        </div>
        <!-- end col-->
    </div>

    @pushOnce('scripts')
    <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>
    @endPushOnce
</x-app-layout>
