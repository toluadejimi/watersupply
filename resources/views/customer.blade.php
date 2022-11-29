@extends('layouts.customer')

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
                                <h5>Create Customer</h5>
                                <span>

                                </span>
                            </div>

                            <form method="POST" action="create-customer">
                                @csrf

                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
                                    <label>First Name</label>
                                    <input class="form-control form-control-lg" name="f_name" autofocus required>
                                </div>

                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
                                    <label>Last Name</label>
                                    <input class="form-control form-control-lg" name="l_name" autofocus required>
                                </div>

                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4 form-group">
                                    <label> Gender </label>
                                    <select class="form-control form-control-lg" required name="gender"
                                        id="exampleFormControlSelect2">
                                        <option>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="prefer">Prefer not to say</option>

                                    </select>
                                </div>

                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
                                    <label>Phone Number</label>
                                    <input class="form-control form-control-lg" name="phone" autofocus required>

                                </div>

                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4">
                                    <label>Email</label>
                                    <input class="form-control form-control-lg" name="email" autofocus required>

                                </div>



                                <div class="col-lg-5 col-md-6 mb-md-0 mb-4 mt-2">
                                    <label>Password</label>
                                    <input class="form-control form-control-lg" name="password" autofocus required>

                                </div>

                                <button a class="btn btn-block btn-primary btn-lg mt-4 font-weight-medium auth-form-btn"
                                    name="submit" type="submit">Create User</a></button>



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
                                <h5>Customer List</h5>
                            </div>




                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <thead>

                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Date created</th>
                                                <th>Time created</th>
                                                <th>Action</th>


                                            </tr>
                                        </thead>

                                        <tbody>

                                            @forelse ($customers as $item)
                                                <tr>
                                                    <td><a href="/customer-details/?id={{ $item->id }}">{{ $item->f_name }}
                                                            {{ $item->l_name }}</a>
                                                    </td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                        <td>{{ date('F d, Y', strtotime($item->created_at)) }}</td>
                                                        <td>{{ date('h:i:s A', strtotime($item->created_at)) }}</td>
                                                        <td>
                                                            <form method="POST"
                                                                action="delete-customer?id={{ $item->id }}">
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
