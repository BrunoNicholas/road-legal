@extends('layouts.site')
@section('title') Owner Details @endsection

@section('styles')  @endsection
@section('page_name') Policy Holder's Details | {{ config('app.name') }} @endsection
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
                            @role(['super-admin','admin'])
                            <div class="col-md-6">
                              <form action="{{ route('owners.destroy',$owner->id) }}" method="post"> 
                                      @csrf 
                                      {{ method_field('DELETE') }}
                                      <button type="button" class="btn btn-rose btn-round btn-block" title="Delete this user!" onclick="confirm('Are you sure you want to delete this user. This is not reversible?') ? this.parentElement.submit() : ''">
                                          <i class="material-icons">delete_forever</i> DELETE <div class="ripple-container"></div>
                                      </button>
                                  </form>
                            </div>
                            @endrole
                            @role(['super-admin','admin','officer'])
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModal">
                                    Issue Fine (Road Crime Fine)
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('crimes.store') }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Give Road Fine | {{ $owner->owner_name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <label class="floating">Category</label>
                                                            <select name="category" class="selectpicker col-sm-12 pl-0 pr-0">
                                                                <option value="Others">Select Crime Category</option>
                                                                <option value="Bad Driving">Bad Driving</option>
                                                                <option value="DMC Of MTP" title="Dangerous Mechanical Condition">DMC Of MTP</option>
                                                                <option value="Unlicensed Driver">Unlicensed Driver</option>
                                                                <option value="Others">Others</option>
                                                            </select>
                                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="floating">Vehicle (MTP)</label>
                                                            <select name="car_id" class="selectpicker col-sm-12 pl-0 pr-0">
                                                                <option value="Others">Select Vehicle</option>
                                                                @foreach($vehicles as $vehicle)
                                                                    <option value="{{ $vehicle->id }}">{{ $vehicle->no_plate . ' - ' . $vehicle->car_model . '('. $vehicle->date_of_expiry .')'  }}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="floating">Charge Amount</label>
                                                            <input type="number" name="fine_amount" class="form-control" placeholder="Amount in UGX">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="floating">Description</label>
                                                            <textarea name="description" class="form-control" placeholder="The crime details and reference..."></textarea>

                                                        </div>
                                                        <input type="hidden" name="officer_id" value="{{ Auth::user()->id }}">
                                                        <input type="hidden" name="car_owner_id" value="{{ $owner->id }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-success card-header-icon">
                <h4 class="card-title"> Crimes by {{ $owner->owner_name }} | {{ config('app.name') }} </h4>
            </div>
            <div class="card-body background-transparent">
                <div class="table-responsive">
                    <table class="table" id="datatables" class="table table-striped table-no-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Crime Date</th>
                                <th>MTP</th>
                                <th>Amount</th>
                                <th>Added By</th>
                                <th class="text-right">Status</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach($crimes as $crime)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $crime->created_at }}</td>
                                    <td><a @if ($crime->car_id) href="{{ route('vehicles.show',$crome->car_id) }}" @else href="javascript:void(0)" @endif>{{ $crome->car_id ? App\Models\Car::where('id',$crome->car_id)->first()->no_plate : 'MPT Profile Missing' }}</a></td>
                                    <td>{{ $crime->fine_amount }}</td>
                                    <td>{{ $crime->user_id ? App\User::where('id',$crime->user_id)->first()->name : '' }}</td>
                                    <td class="td-actions text-center">
                                        <a href="{{ route('crimes.show', $crime->id) }}" rel="tooltip" class="btn btn-info btn-round btn-sm" style="margin: 2px;" title="View crime's details">
                                            <i class="material-icons">done</i> View
                                        </a>
                                        <a href="{{ route('crimes.edit', $crime->id) }}" rel="tooltip" class="btn btn-success btn-round btn-sm" style="margin: 2px;" title="Edit crime's details">
                                              <i class="material-icons">edit</i> Edit
                                        </a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
          $('#datatables').fadeIn(1100);
          $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
              [10, 25, 50, -1],
              [10, 25, 50, "View All"]
            ],
            responsive: true,
            language: {
              search: "_INPUT_",
              searchPlaceholder: "Search crime category",
            },
            "columnDefs": [
              { "orderable": false, "targets": 5 },
            ],
          });
        });
    </script>
@endsection
