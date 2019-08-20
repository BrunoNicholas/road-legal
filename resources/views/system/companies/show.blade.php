@extends('layouts.site')
@section('title') View Company Details @endsection

@section('styles')  @endsection
@section('page_name') Insurance Company Details | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('companies.index') }}"> Insurance Companies </a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('roles.index') }}"> User Roles</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page"> View Details </li>
    </ol>
    <span class="breadcrumb">Insurance Company Details | {{ config('app.name') }}  </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon"> <i class="material-icons">location_searching</i> </div>
                <h4 class="card-title"> View the company details | {{ config('app.name') }} </h4>
            </div>
            <div class="card-body background-transparent">
                <table class="table m-b-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Attribute</th>
                            <th scope="col">Value</th>
                            <th scope="col">More</th>
                        </tr>
                    </thead>
                    <?php $i=0; ?>
                    <tbody>
                        @if($company->company_name)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>Comapany Names</td>
                                <td>{{ $company->company_name }}</td>
                                <td></td>
                            </tr>
                        @endif
                        @if($company->company_email)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>Email</td>
                                <td>{{ $company->company_email }}</td>
                                <td></td>
                            </tr>
                        @endif
                        @if($company->company_telephone)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>Telephone</td>
                                <td>{{ $company->company_telephone }}</td>
                                <td></td>
                            </tr>
                        @endif
                        @if($company->location)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>Location coordinates</td>
                                <td>{{ $company->location }}</td>
                                <td></td>
                            </tr>
                        @endif
                        @if($company->drivers_number)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>Number of known drivers</td>
                                <td>{{ $company->drivers_number }}</td>
                                <td></td>
                            </tr>
                        @endif
                        @if($company->user_id)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>Added By</td>
                                <td>{{ App\User::where('id',$company->user_id)->first()->name }}</td>
                                <td></td>
                            </tr>
                        @endif
                        @if($company->status)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>Company status</td>
                                <td>{{ $company->status }}</td>
                                <td></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon"> <i class="material-icons">location_searching</i> </div>
                <h4 class="card-title text-center"> Operations </h4>
            </div>
            <div class="card-body background-transparent">
                <div class="row">
                    <div class="col-md-12" style="min-height: 100px;">
                        <label>Fleet Cars: </label> <span>{{ $company->cars->count() }}</span>
                        <br>
                        <label>Known Accounts: </label> <span>{{ $company->accounts->count() }}</span>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                              <a href="{{ route('companies.index') }}" class="btn btn-info btn-round btn-block"> Back </a>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('companies.destroy',$company->id) }}" method="post"> 
                                    @csrf 
                                    {{ method_field('DELETE') }}
                                    <button type="button" class="btn btn-rose btn-round btn-block" title="Delete this company!" onclick="confirm('Are you sure you want to delete this company. This is not reversible?') ? this.parentElement.submit() : ''">
                                        DELETE <div class="ripple-container"></div>
                                     </button>
                                  </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
