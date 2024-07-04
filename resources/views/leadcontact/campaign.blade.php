@php
    $users = \Auth::user();
    $businesses = App\Models\Business::allBusiness();
    $currantBusiness = $users->currentBusiness();
    $bussiness_id = $users->current_business;
@endphp
@extends('layouts.admin')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Leads Campaign') }}</li>
@endsection
@section('page-title')
    {{ __('Leads Campaign') }}
@endsection
@section('title')
    {{ __('Leads Campaign') }}
@endsection
@section('content')
    <style>
        .export-btn {
            float: right;
        }
    </style>


    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                {{-- //business Display Start --}}
                <div class="d-flex align-items-center justify-content-between">
                    <ul class="list-unstyled">
                        <li class="dropdown dash-h-item drp-language">
                            <a class="dash-head-link dropdown-toggle arrow-none me-0 cust-btn shadow-sm border border-success"
                                data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-original-title="{{ __('Select your bussiness') }}">
                                <i class="ti ti-credit-card"></i>
                                <span class="drp-text hide-mob">{{ __(ucfirst($currantBusiness)) }}</span>
                                <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                            </a>
                            <div class="dropdown-menu dash-h-dropdown dropdown-menu-end page-inner-dropdowm">
                                @foreach ($businesses as $key => $business)
                                    <a href="{{ route('business.change', $key) }}" class="dropdown-item">
                                        <i
                                            class="@if ($bussiness_id == $key) ti ti-checks text-primary @elseif($currantBusiness == $business) ti ti-checks text-primary @endif "></i>
                                        <span>{{ ucfirst($business) }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
					<div>
					
					
					<a href="{{ route('leads.export') }}" class="btn btn-primary export-btn">
						Export All Leads
					</a>
					
					<a href="{{ route('leadcontact.index') }}" class="btn btn-primary export-btn" style="background-color: aliceblue;color: black;margin-right: 5px;">
						View All Leads
					</a>
					</div>
					

                    {{-- //business Display End --}}
                    
                </div>
                <div class="table-responsive">
                    <table class="table" id="pc-dt-export">
                        <thead>
                            <tr><th>{{ __('#') }}</th>
                                <th>{{ __('Campaign Name') }}</th>
                                <th>{{ __('Total Leads') }}</th>
								<th>{{ __('Created On') }}</th>
                                <th id="ignore">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leadGeneration_content as $val)
							@php
								$leadCount = App\Models\LeadContact::where('campaign_id', $val->id)->count();
										
							@endphp
                                <tr>
									<td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $val->title }}</td>
                                    <td>{{ $leadCount }}</td>
									<td>{{ \Carbon\Carbon::parse($val->created_at)->format('j F, Y') }}</td>
									
                                    
                                    
                                    
                                    <div class="row ">
                                        <td class="d-flex">
                                            @can('delete contact')
                                                <div class="action-btn bg-info  ms-2" style="width:100px; padding: 0 60px;">
                                                    <a href="{{ route('campaign.lead', $val->id) }}"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-original-title="{{ __('View Lead') }}"> <span
                                                            class="text-white" > <i
                                                                class="ti ti-brand-google-analytics  text-white"></i></span><span style="margin-left:5px; padding-right:5px">View Leads</span></a>
                                                </div>
                                            
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['leadcontact.destroy', $val->id],
                                                    'id' => 'delete-form-' . $val->id,
                                                ]) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                            
                                        </td>

                                    </div>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>
    <script>
        const table = new simpleDatatables.DataTable("#pc-dt-export", {
            searchable: true,
            fixedheight: true,
            dom: 'Bfrtip',
        });
        $('.csv').on('click', function() {
            $('#ignore').remove();
            $("#pc-dt-export").table2excel({
                filename: "contactDetail"
            });
            setTimeout(function() {
                location.reload();
            }, 2000);
        })
    </script>
@endpush
