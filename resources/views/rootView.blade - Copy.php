@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Characters</div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" width="40%">Name</th>
                                <th class="text-center" width="15%">Gender</th>
                                <th class="text-center" width="15%">Birth Year</th>
                                <th class="text-center" width="15%">Hair Color</th>
                                <th class="text-center" width="15%">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($peoples as $people)
                            <tr>
                                <td class="text-center">{{ $people->name }}</td>
                                <td class="text-center">{{ $people->gender }}</td>
                                <td class="text-center">{{ $people->birth_year }}</td>
                                <td class="text-center">{{ $people->hair_color }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-info" data-url="{{ $people->url }}" data-toggle="modal" href='#modalDetailChar'>
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">No data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pagination">
                        <div class="btn-group">
                            <a href="{{ $hasPrevious }}" {{ !$hasPrevious ? 'disabled' : '' }} type="button" class="btn btn-default" >Previous</a>
                            <a href="{{ $hasNext }}" {{ !$hasNext ? 'disabled' : '' }} type="button" class="btn btn-default">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDetailChar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Char Details</h4>
            </div>
            <div class="modal-body text-center">
                <div class="modal-body-content" style="display: none">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td class="td-modal-header">Name:</td>
                                <td class="td-modal-content td-modal-name"></td>
                            </tr>
                            <tr>
                                <td class="td-modal-header">Height:</td>
                                <td class="td-modal-content td-modal-height"></td>
                            </tr>
                            <tr>
                                <td class="td-modal-header">Mass:</td>
                                <td class="td-modal-content td-modal-mass"></td>
                            </tr>
                            <tr>
                                <td class="td-modal-header">Hair Color:</td>
                                <td class="td-modal-content td-modal-hair-color"></td>
                            </tr>
                            <tr>
                                <td class="td-modal-header">Skin Color:</td>
                                <td class="td-modal-content td-modal-skin-color"></td>
                            </tr>
                            <tr>
                                <td class="td-modal-header">Eye Color:</td>
                                <td class="td-modal-content td-modal-eye-color"></td>
                            </tr>
                            <tr>
                                <td class="td-modal-header">Birth Year:</td>
                                <td class="td-modal-content td-modal-birth-year"></td>
                            </tr>
                            <tr>
                                <td class="td-modal-header">Gender:</td>
                                <td class="td-modal-content td-modal-gender"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <img src="assets/images/loading.gif" class="img-loading" style="display: none">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
