<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      	<div class="card card-stats">
          	<div class="card-header card-header-warning card-header-icon">
            		<a href="{{ route('roles.index') }}" style="color: #fff;"><div class="card-icon"> <i class="material-icons">list</i> </div></a>
            		<p class="card-category"> User Roles </p> <h3 class="card-title">{{ App\Models\Role::all()->count() }}</h3>
          	</div>
          	<div class="card-footer"> <div class="stats text-warning"> <i class="material-icons">update</i> {{ App\Models\Role::all()->count() }} All </div> </div>
      	</div>
	  </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
              	<a href="{{ route('users.index') }}" style="color: #fff;"><div class="card-icon"> <i class="fa fa-user-plus"></i> </div></a>
              	<p class="card-category">Administrators</p> <h3 class="card-title">{{ App\User::where('role', 'admin')->orWhere('role','super-admin')->count() }}</h3>
            </div>
            <div class="card-footer"> <div class="stats text-rose"> <i class="material-icons">update</i> {{ App\User::where([['role', 'admin'],['status','Active']])->orWhere([['role','super-admin'],['status','Active']])->count() }} Active </div> </div>
        </div>
    </div>
	  <div class="col-lg-3 col-md-6 col-sm-6">
  		  <div class="card card-stats">
      		  <div class="card-header card-header-success card-header-icon">
            		<a href="{{ route('users.index') }}" style="color: #fff;"><div class="card-icon"> <i class="material-icons">person</i> </div></a>
            		<p class="card-category">Normal Users</p><h3 class="card-title">{{ App\User::where('role', 'user')->count() }}</h3>
          	</div>
            <div class="card-footer"> <div class="stats text-success"> <i class="material-icons">update</i> {{ App\User::where([['role','user'],['status', 'Active']])->count() }} Active </div> </div>
        </div>
	  </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              	<a href="{{ route('users.index') }}" style="color: #fff;"><div class="card-icon"> <i class="fa fa-users"></i> </div></a>
              	<p class="card-category">Total Users</p> <h3 class="card-title"> {{ App\User::all()->count() }} </h3>
            </div>
            <div class="card-footer"> <a href="{{ route('users.index') }}"> <div class="stats text-info"> <i class="material-icons">update</i> {{ App\User::where('status', 'Active')->count() }} Active </div> </a> </div>
        </div>
    </div>
</div>