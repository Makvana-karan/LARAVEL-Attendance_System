@extends('layout.layout')
@include('layout.css')
@include('layout.script')

@section('title', 'edit');

@section('content')
    <div class="d-flex justify-content-center align-items-center">

        <div class="card card-group flex-column w-25 p-3" style=" margin-top: 10%;">
            <h5 class="mt-3 mb-3">Edit Student</h5>
            <form method="post" action="{{ route('student_edit') }}">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{ $student->id }}">
                <div class="form-group mb-3 "col-xs-4"">
                    <input type="text" placeholder="Name" name="name" value="{{ $student->name }}" />

                </div>

                <div class="dropdown ">
                    <select name="grade" class="dropdown-toggle p-2 mb-3 w-8 border" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->grade }}">{{ $grade->grade }} {{ $student->grade }}</option>
                        @endforeach

                    </select>

                </div>

                <div class="form-group mb-3">
                    <input class="form-control type="text" placeholder="Address" name="address"
                        value="{{ $student->address }}" />

                </div>


                <div class="form-group mb-3">
                    <input class="form-control type="number" placeholder="Contect" name="contact"
                        value="{{ $student->contact }}" />

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div>
    </div>
@endsection
