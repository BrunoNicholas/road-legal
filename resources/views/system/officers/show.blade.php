@extends('layouts.site')
@section('title') Officer's Profile @endsection

@section('styles')  @endsection
@section('page_name') View Officer's Profile | {{ config('app.name') }} @endsection
@section('content')
<div class="block-header">
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('officers.index') }}"> Traffic Officers </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Edit Profile </li>
    </ol>
    <span class="breadcrumb"> Edit Ofiicer's Profile - {{ config('app.name') }} </span>
</div>
@include('layouts.includes.notifications')
<div class="row">
  	<div class="col-md-8">
      	<div class="card">
        		<div class="card-header card-header-success card-header-icon">
          			<div class="card-icon"> <i class="material-icons">location_searching</i> </div>
          			<h4 class="card-title"> Vehicle details and validity | {{ config('app.name') }} </h4>
        		</div>
        		<div class="card-body background-transparent">
          			<div class="row">
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
                            @if($officer->user_id)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>User Name</td>
                                    <td>{{ App\User::where('id',$officer->user_id)->first()->name }}</td>
                                    <td>
                                        <a href="{{ route('users.show',$officer->user_id) }}" target="_blank"><button class="btn btn-sm btn-info">View User</button></a>
                                    </td>
                                </tr>
                            @endif
                            @if(App\User::where('id',$officer->user_id)->first()->email)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>User Email</td>
                                    <td>{{ App\User::where('id',$officer->user_id)->first()->email }}</td>
                                    <td></td>
                                </tr>
                            @endif
                            @if(App\User::where('id',$officer->user_id)->first()->telephone)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>Telephone</td>
                                    <td>{{ App\User::where('id',$officer->user_id)->first()->telephone }}</td>
                                    <td></td>
                                </tr>
                            @endif
                            @if($officer->police_id)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>Police Identification</td>
                                    <td>{{ $officer->police_id }}</td>
                                    <td></td>
                                </tr>
                            @endif
                            @if($officer->status)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>Officer Profile</td>
                                    <td>{{ $officer->status }}</td>
                                    <td></td>
                                </tr>
                            @endif






                        </tbody>
                    </table>
          			</div>
        		</div>
      	</div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon"> <i class="material-icons">location_searching</i> </div>
                <h4 class="card-title"> OPERATION </h4>
            </div>
            <div class="card-body background-transparent">
                <div class="row">
                    <a href="javascript:void(0)" class="col-md-12" style="min-height: 50px;">  </a>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                              <a href="{{ route('officers.index') }}" class="btn btn-info btn-round btn-block"> Back </a>
                            </div>
                            <div class="col-md-6">
                              <form action="{{ route('officers.destroy',$officer->id) }}" method="post"> 
                                      @csrf 
                                      {{ method_field('DELETE') }}
                                      <button type="button" class="btn btn-rose btn-round btn-block" title="Delete this user!" onclick="confirm('Are you sure you want to delete this officer profile. This is not reversible?') ? this.parentElement.submit() : ''">
                                          <i class="material-icons">delete_forever</i> DELETE <div class="ripple-container"></div>
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
