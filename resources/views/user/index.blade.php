@extends('layouts.admin')
@php
    // $profile=asset(Storage::url('uploads/avatar/'));
    $profile=\App\Models\Utility::get_file('uploads/avatar/');
@endphp
@section('page-title')
   {{__('Manage All Staff')}}
@endsection
@section('title')
   {{__('Manage All Staff')}}
@endsection
@section('action-btn')
@can('create user')
<div class="col-xl-12 col-lg-12 col-md-12 d-flex align-items-center justify-content-between justify-content-md-end" data-bs-placement="top" >  
    <a href="#" data-size="md" data-url="{{ route('users.create') }}" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{__('Create')}}" data-title="{{__('Create New User')}}" class="btn btn-sm btn-primary">
        <i class="ti ti-plus"></i>
    </a>
    @if(Auth::user()->type == 'company')
    <a href="{{ route('userlogs.index') }}" class="btn btn-sm btn-primary btn-icon m-1"
        data-size="lg" data-bs-whatever="{{ __('UserlogDetail') }}"> <span
            class="text-white">
            <i class="ti ti-user" data-bs-toggle="tooltip" data-bs-original-title="{{ __('Userlog Detail') }}"></i></span>
    </a>
@endif
</div>
@endcan
@endsection

@section('content')

<div class="row">

        
@can('create user')
	<div class="table-responsive">
                    <table class="table" id="pc-dt-export">
                        <thead>
                            <tr>
								<th>{{ __('#') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Department') }}</th>
                                <th>{{ __('Status') }}</th>
								<th>{{ __('Created On') }}</th>
                                <th id="ignore">{{ __('More') }}</th>
                            </tr>
                        </thead>
						    @foreach ($users as $user)
                        <tbody>
                           
                                <tr>
									<td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
                                    <td>{{ $user->type }}</td>
									
                                    
                                    
                                    @if ($user->is_enable_login == '0')
                                        <td><span
                                                class="badge bg-warning p-2 px-3 rounded">{{ ucFirst('Disabled') }}</span>
                                        </td>
                                    @else
                                        <td><span
                                                class="badge bg-success p-2 px-3 rounded">{{ ucFirst('Active') }}</span>
                                        </td>
                                    @endif
									<td>{{ $user->created_at }}</td>
							
									
									
                                    <div class="row ">
												
                                        <td class="d-flex">
											<button type="button" class="btn"
                                data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="feather icon-more-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                    @can('edit user')
                                        <a href="#" class="dropdown-item user-drop" data-url="{{ route('users.edit',$user->id) }}" data-ajax-popup="true" data-title="{{__('Update User')}}"><i class="ti ti-edit"></i><span class="ml-2">{{__('Edit')}}</span></a>
                                    @endcan
                                        @can('change password account')
                                        <a href="#" class="dropdown-item user-drop" data-ajax-popup="true" data-title="{{__('Reset Password')}}" data-url="{{route('user.reset',\Crypt::encrypt($user->id))}}"><i class="ti ti-key"></i>
                                        <span class="ml-2">{{__('Reset Password')}}</span></a>  
                                    @endcan
                                    @can('delete user')
                                        <a href="#" class="bs-pass-para dropdown-item user-drop"  data-confirm="{{__('Are You Sure?')}}" data-text="{{__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="delete-form-{{$user->id}}" title="{{__('Delete')}}" data-bs-toggle="tooltip" data-bs-placement="top"><i class="ti ti-trash"></i><span class="ml-2">{{__('Delete')}}</span></a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id],'id'=>'delete-form-'.$user->id]) !!}
                                        {!! Form::close() !!} 
                                    @endcan
                                     @if(\Auth::user()->type == 'company')
                                        <a href="{{ route('userlogs.index', ['month'=>'','user'=>$user->id]) }}"
                                            class="dropdown-item user-drop"
                                            data-bs-toggle="tooltip"
                                            data-bs-original-title="{{ __('User Log') }}"> 
                                            <i class="ti ti-history"></i>
                                            <span class="ml-2">{{__('Logged Details')}}</span></a>
                                    @endif
                                    @if ($user->is_enable_login == 1)
                                        <a href="{{ route('users.login', \Crypt::encrypt($user->id)) }}"
                                            class="dropdown-item user-drop">
                                            <i class="ti ti-road-sign"></i>
                                            <span class="text-danger ml-2"> {{ __('Login Disable') }}</span>
                                        </a>
                                    @elseif ($user->is_enable_login == 0 && $user->password == null)
                                        <a href="#" data-url="{{ route('users.reset', \Crypt::encrypt($user->id)) }}"
                                            data-ajax-popup="true" data-size="md" class="dropdown-item login_enable user-drop"
                                            data-title="{{ __('New Password') }}" >
                                            <i class="ti ti-road-sign"></i>
                                            <span class="text-success ml-2"> {{ __('Login Enable') }}</span>
                                        </a>
                                    @else
                                        <a href="{{ route('users.login', \Crypt::encrypt($user->id)) }}"
                                            class="dropdown-item user-drop">
                                            <i class="ti ti-road-sign"></i>
                                            <span class="text-success ml-2"> {{ __('Login Enable') }}</span>
                                        </a>
                                    @endif
                            </div>
                                            
                                        </td>

                                    </div>

                                </tr>
                           
                        </tbody>
						@endforeach
                    </table>
                </div>
</div>
@endcan

@endsection
