{{-- @extends('layout.layout')

@section('title', 'Show')

@section('content')
    <div class="container">


        <nav class="d-flex mt-2 justify-content-between bg-dark-subtle align-items-center">
            <h2 class="fw-semibold mt-2 ms-3">Students</h2>
        </nav>
        <nav class="d-flex mt-4 align-items-center">
            <p class="mt-3"><input type="text" id="datepicker"> <i class="fa fa-calendar" aria-hidden="true"></i></p>

            <div class="dropdown ">
                <button class="btn border dropdown-toggle me-3 ms-4" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    5th
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">5th</a></li>
                    <li><a class="dropdown-item" href="#">6th</a></li>
                    <li><a class="dropdown-item" href="#">7th</a></li>
                </ul>
            </div>
            <button class="btn btn-primary">search</button>
        </nav>

        <div class="main">

        </div>

    </div>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>

    </div>
@endsection --}}


@extends('layout.layout')

@include('layout.css')
@include('layout.script')

@section('title', 'Attendance Records')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive w-100">
                <table class="table table-responsive table-hover table-bordered table-sm w-50">
                    <thead class="thead-dark w-50">
                        <tr>
                            <th class="w-25">Student</th>
                            <th>Grade</th>
                            @php
                                $today = today();
                                $dates = [];

                                for ($i = 1; $i <= $today->daysInMonth; $i++) {
                                    $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format(
                                        'Y-m-d',
                                    );
                                }
                            @endphp
                            @foreach ($dates as $date)
                                <th class="w-25">{{ $date }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->grade }}</td>
                                @foreach ($dates as $date)
                                    @php
                                        $attendance = $attendanceData->has($date)
                                            ? $attendanceData[$date]->firstWhere('std_id', $student->id)
                                            : null;
                                    @endphp
                                    <td>
                                        @if ($attendance)
                                            {{ $attendance->status ? 'Present' : 'Absent' }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
