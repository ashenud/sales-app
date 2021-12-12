@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Sales Representatives') }}
                        <x-flash-message type="success" key="success" />
                        <a href="{{route('sales-reps.create')}}" class="btn btn-primary float-end">
                            {{ __('Add New') }}
                        </a>
                    </div>

                    <div class="card-body">

                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th width="10%" class="text-center">ID</th>
                                    <th width="20%">Name</th>
                                    <th width="20%">Email</th>
                                    <th width="10%">Telephone</th>
                                    <th width="10%">Current Route</th>
                                    <th width="20%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($sales_reps) > 0)
                                    @foreach ($sales_reps as $sales_rep)
                                    <tr>
                                        <th class="text-center" scope="row">{{$sales_rep->id}}</th>
                                        <td class="text-srart">{{$sales_rep->name}}</td>
                                        <td class="text-srart">{{$sales_rep->email}}</td>
                                        <td class="text-srart">{{$sales_rep->telephone}}</td>
                                        <td class="text-srart">{{$sales_rep->route->name}}</td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                @can('sales-reps_show')                                                    
                                                    <a onclick="viewSalesRep(event,'{{$sales_rep->id}}')" class="btn btn-outline-primary">
                                                        {{ __('View') }}
                                                    </a>
                                                @else
                                                    <a type="button" class="btn btn-outline-primary disabled">
                                                        {{ __('View') }}
                                                    </a>
                                                @endcan
                                                @can('sales-reps_update')                                                    
                                                    <a href="{{route('sales-reps.edit', $sales_rep)}}" class="btn btn-outline-primary">
                                                        {{ __('Edit') }}
                                                    </a>
                                                @else
                                                    <a type="button" class="btn btn-outline-primary disabled">
                                                        {{ __('Edit') }}
                                                    </a>
                                                @endcan
                                                @can('sales-reps_destroy')
                                                    <a type="button" onclick="deleteSalesRep(event,'delete-form-{{$sales_rep->id}}')" class="btn btn-outline-danger">
                                                        {{ __('Delete') }}
                                                    </a>
                                                @else
                                                    <a type="button" class="btn btn-outline-danger disabled">
                                                        {{ __('Delete') }}
                                                    </a>
                                                @endcan
                                            </div>                                            
                                            <form id="delete-form-{{$sales_rep->id}}" action="{{ route('sales-reps.destroy', $sales_rep) }}" method="POST" class="d-none">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-danger text-center">No records found</td>    
                                    </tr>                                    
                                @endif                                
                            </tbody>
                        </table>
                        <div class="mt-4 d-flex justify-content-end">
                            {!! $sales_reps->onEachSide(0)->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_rep_details" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row justify-content-center mb-2">
                        <div class="col-md-4">
                            <label for="rep_id" class="form-label">ID</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="rep_id" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center mb-2">
                        <div class="col-md-4">
                            <label for="name" class="form-label">Full Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="name" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center mb-2">
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                        </div>
                        <div class="col-md-8">
                            <input type="email" id="email" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center mb-2">
                        <div class="col-md-4">
                            <label for="telephone" class="form-label">Telephone</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="telephone" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center mb-2">
                        <div class="col-md-4">
                            <label for="joined_date" class="form-label">Joined Date</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="joined_date" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center mb-2">
                        <div class="col-md-4">
                            <label for="route_name" class="form-label">Route</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text"  id="route_name" class="form-control" readonly>
                        </div>
                    </div>                            
                    <div class="form-group row justify-content-center mb-2">
                        <div class="col-md-4">
                            <label for="comments" class="form-label">Comments</label>
                        </div>
                        <div class="col-md-8">
                            <textarea id="comments" name="comments" class="form-control" disabled></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <button type="button" data-bs-toggle="modal" id="launch_modal" data-bs-target="#modal_rep_details" class="d-none"></button>

@endsection

@section('scripts')    
<script>

    function deleteSalesRep(event,form_id) {
        event.preventDefault();
        if (confirm('Are you sure you want to delete this record?')) {
            $(`#${form_id}`).submit();
        }
    }

    function viewSalesRep(event,id) {
        event.preventDefault();
        $.ajax({
            type: "GET",
            url:"{{ url('sales-reps-show',) }}"+"/"+id,
            success: function (response) {
                $('#rep_id').val(response.id);
                $('#modal_title').html(response.name);
                $('#name').val(response.name);
                $('#email').val(response.email);
                $('#telephone').val(response.telephone);
                $('#joined_date').val(response.joined_date);
                $('#route_name').val(response.route_name);
                $('#comments').html(response.comments);
                $('#launch_modal').click();
            }
        });
    }
    
</script>
@endsection