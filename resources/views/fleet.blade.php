@extends('layouts.fleet')

@section('content')
    <div class="container-fluid py-4">
        <div class="col-6 w-100">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>

        <div class="row my-1">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row mb-5">


                            <div class="mb-3">
                                <h5>Create Fleet</h5>
                                <span>

                                </span>
                            </div>

                            <form method="POST" action="create-fleet">
                                @csrf

                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
                                    <label>Fleet Type</label>
                                    <select class="form-control form-control-lg" required name="fleet_type"
                                    id="exampleFormControlSelect2">
                                    <option>Select Type</option>
                                    <option value="tanker">Tanker</option>


                                </select>
                                </div>

                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
                                    <label>Fleet Capacity (Liters)</label>
                                    <input type="number" class="form-control form-control-lg" name="capacity" autofocus required>
                                </div>

                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
                                    <label>Fleet Plate Number</label>
                                    <input  type="text" class="form-control form-control-lg" name="plate_number" autofocus required>

                                </div>

                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
                                    <label>Assign Driver</label>
                                    <select name="driver" id="" class="form-control">
                                        @forelse ($drivers as $driver )
                                        <option value="{{$driver->f_name}} {{$driver->l_name}}">{{$driver->f_name}} {{$driver->l_name}} </option>
                                        @empty
                                        <option value="">No Driver Found </option>
                                        @endforelse
                                    </select>
                                    <p><a href="/driver">Click here to add new driver</p></a>
                                </div>


                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
                                    <label>Fleet Owner</label>
                                    <select name="owner" id="" class="form-control">
                                        @forelse ($owners as $driver )
                                        <option value="{{$driver->f_name}} {{$driver->l_name}}">{{$driver->f_name}} {{$driver->l_name}} </option>
                                        @empty
                                        <option value="">No owner Found </option>
                                        @endforelse
                                    </select>
                                    <p><a href="/owner">Click here to add new owner</p></a>
                                </div>


                                <button a class="btn btn-block btn-primary btn-lg mt-4 font-weight-medium auth-form-btn"
                                    name="submit" type="submit">Create Fleet</a></button>



                            </form>



                        </div>





                    </div>

                </div>
            </div>

        </div>



        <div class="row mt-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-0">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">

                            <div class="mb-3">
                                <h5>Fleet List</h5>
                            </div>


                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <thead>

                                            <tr>
                                                <th>Plate Number</th>
                                                <th>Assigned Driver</th>
                                                <th>Fleet Owner</th>
                                                <th>Fleet Type</th>
                                                <th>Fleet Capacity</th>
                                                <th>Date created</th>
                                                <th>Action</th>


                                            </tr>
                                        </thead>

                                        <tbody>

                                            @forelse ($fleets as $item)
                                                <tr>
                                                    <td><a href="/fleet-edit/?id={{ $item->id }}">{{ $item->plate_number }}
                                                    </td>
                                                    <td>{{ $item->driver }}</td>
                                                    <td>{{ $item->owner }}</td>
                                                    <td>{{ $item->fleet_type }} </td>
                                                    <td>{{ number_format($item->capacity)}} Liters</td>
                                                        <td>{{ date('F d, Y', strtotime($item->created_at)) }}</td>
                                                        <td>
                                                            <form method="POST"
                                                                action="delete-fleet?id={{ $item->id }}">
                                                                @csrf

                                                                <button a
                                                                    class="btn btn-block btn-danger btn-lg mt-1 font-weight-medium auth-form-btn"
                                                                    name="submit" type="submit">Delete</a></button>

                                                            </form>
                                                        </td>

                                                </tr>
                                            @empty
                                                <tr colspan="20" class="text-center">No Record Found</tr>
                                            @endforelse


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    @endsection
