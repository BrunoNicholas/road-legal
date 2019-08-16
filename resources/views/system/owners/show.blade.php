@extends('layouts.site')
@section('title') Vehicle Details @endsection

@section('styles')  @endsection
@section('page_name') View Vehicle Details | {{ config('app.name') }} @endsection
@section('content')

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
                            @if($owner->owner_name)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>User Names</td>
                                    <td>{{ $owner->owner_name }}</td>
                                    <td></td>
                                </tr>
                            @endif
                            @if($owner->owner_email)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>Email</td>
                                    <td>{{ $owner->owner_email }}</td>
                                    <td></td>
                                </tr>
                            @endif
                            @if($owner->owner_telephone)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>Telephone</td>
                                    <td>{{ $owner->owner_telephone }}</td>
                                    <td></td>
                                </tr>
                            @endif
                            @if($owner->purchase_date)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>Previous car purchase date</td>
                                    <td>{{ $owner->purchase_date }}</td>
                                    <td></td>
                                </tr>
                            @endif
                            @if($owner->expiry_date)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>Previous expiry</td>
                                    <td>{{ $owner->expiry_date }}</td>
                                    <td></td>
                                </tr>
                            @endif
                            @if($owner->user_id)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>Added By</td>
                                    <td>{{ App\User::where('id',$owner->user_id)->first()->name }}</td>
                                    <td></td>
                                </tr>
                            @endif
                            @if($owner->status)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>User account status</td>
                                    <td>{{ $owner->status }}</td>
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
                              <a href="{{ route('owners.index') }}" class="btn btn-info btn-round btn-block"> Back </a>
                            </div>
                            <div class="col-md-6">
                              <form action="{{ route('owners.destroy',$owner->id) }}" method="post"> 
                                      @csrf 
                                      {{ method_field('DELETE') }}
                                      <button type="button" class="btn btn-rose btn-round btn-block" title="Delete this user!" onclick="confirm('Are you sure you want to delete this user. This is not reversible?')">
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
