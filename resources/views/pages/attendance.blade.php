@extends('layout.layout')

@include('layout.css')
@include('layout.script')

@section('title', 'Attendance')

@section('content')
    <div class="card">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive w-100">
                <form action="{{ route('attendance.store') }}" method="post">
                    @csrf
                    <table class="table table-responsive table-hover table-bordered table-sm w-50">
                        <thead class="thead-dark w-50">
                            <tr>
                                <th class="w-25">Student</th>
                                <th>Grade</th>
                                @php
                                    $today = today();
                                    $dates = [];

                                    for ($i = 1; $i <= $today->daysInMonth; $i++) {
                                        $dates[] = \Carbon\Carbon::createFromDate(
                                            $today->year,
                                            $today->month,
                                            $i,
                                        )->format('Y-m-d');
                                    }
                                @endphp
                                @foreach ($dates as $date)
                                    <th class="w-25">{{ $date }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->grade }}</td>
                                    @for ($i = 1; $i <= $today->daysInMonth; $i++)
                                        @php
                                            $date_picker = \Carbon\Carbon::createFromDate(
                                                $today->year,
                                                $today->month,
                                                $i,
                                            )->format('Y-m-d');
                                        @endphp
                                        @foreach ($dates as $date)
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="attendance[{{ $student->id }}][{{ $date }}]"
                                                        value="1" </div>
                                            </td>
                                        @endforeach
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success" style="display: flex; margin:10px">Submit
                        Attendance</button>
                </form>
            </div>
        </div>
    </div>
@endsection
