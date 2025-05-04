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
                <div class="page-title-right">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-employee">@lang('locale.add')</a>
                </div>
                <h4 class="page-title">@lang('locale.employee', ['suffix'=>'s'])</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered datatable-buttons dt-responsive nowrap w-100">
                        <thead>
                            <th>#</th>
                            <th>@lang('locale.firstname')</th>
                            <th>@lang('locale.lastname')</th>
                            <th>@lang('locale.email')</th>
                            <th>@lang('locale.phone')</th>
                            <th>@lang('locale.grade')</th>
                            <th>@lang('locale.role')</th>
                            <th>@lang('locale.employee_type')</th>
                            <th>@lang('locale.status')</th>
                            <th>@lang('locale.hire_date')</th>
                            <th>@lang('locale.actions')</th>
                        </thead>
                        <tbody class="text-capitalize">
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
                                <td>{{ date('d/m/Y', strtotime($item->hire_date))}}</td>
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

    <!-- Modal -->
    <div class="modal fade" id="add-employee" tabindex="-1" aria-labelledby="exampleModalFullscreenXxlLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-xxl-down">
            <div class="modal-content">
                <div class="modal-header text-bg-primary border-0">
                    <h5 class="modal-title" id="exampleModalFullscreenXxlLabel">@lang('locale.employee', ['suffix'=>''])</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('employees.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-muted"><span class="text-danger">*</span> @lang('locale.required_fields')</p>
                            </div>
                            <div class="col-6 col-xs-12">
                                <div class="mb-2">
                                    <label for="firstname" class="form-label">@lang('locale.firstname') <span class="text-danger">*</span></label>
                                    <input type="text" id="firstname" class="form-control" name="firstname" required>
                                </div>

                                <div class="mb-2">
                                    <label for="email" class="form-label">@lang('locale.email')</label>
                                    <input type="email" id="email" class="form-control" name="email">
                                </div>

                                <div class="mb-2">
                                    <label for="grade" class="form-label">@lang('locale.grade')</label>
                                    <input type="text" id="grade" class="form-control" name="grade">
                                </div>

                                <div class="mb-2">
                                    <label for="employee_type" class="form-label">@lang('locale.employee_type') <span class="text-danger">*</span></label>
                                    <select class="form-select" id="employee_type" name="employee_type" required>
                                        @foreach (['officer'=>__('locale.officer'), 'civil_agent'=>__('locale.civil_agent')] as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 col-xs-12">
                                <div class="mb-2">
                                    <label for="lastname" class="form-label">@lang('locale.lastname') <span class="text-danger">*</span></label>
                                    <input type="text" id="lastname" class="form-control" name="lastname" required>
                                </div>
                                
                                <div class="mb-2">
                                    <label for="phone" class="form-label">@lang('locale.phone') <span class="text-danger">*</span></label>
                                    <input type="text" id="phone" class="form-control" name="phone" required>
                                </div>

                                <div class="mb-2">
                                    <label for="role" class="form-label">@lang('locale.role') <span class="text-danger">*</span></label>
                                    <input type="text" id="role" class="form-control" name="role" required>
                                </div>

                                <div class="mb-2">
                                    <label for="hire_date" class="form-label">@lang('locale.hire_date') <span class="text-danger">*</span></label>
                                    <input type="date" id="hire_date" class="form-control" name="hire_date" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">@lang('locale.submit')</button>
                    </div>
                </form>
            </div>
        </div>
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
