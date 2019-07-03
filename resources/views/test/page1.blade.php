@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Page1</div>

                <div class="panel-body">
                    <button type="button" class="btn btn-success pull-people">Pull People/Characters</button>
                    <button type="button" class="btn btn-success pull-films" data-url="https://swapi.co/api/films/">Pull Films</button>
                    <button type="button" class="btn btn-success save-data">Save Data</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container char-data" style="display: none;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Characters</div>
                <div class="panel-body">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th class="text-center" width="40%">Name</th>
                                <th class="text-center" width="15%">Gender</th>
                                <th class="text-center" width="15%">Birth Year</th>
                                <th class="text-center" width="15%">Hair Color</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($peoples as $people)
                            <tr>
                                <td class="text-center attrName">{{ $people->name }}</td>
                                <td class="text-center attrGen">{{ $people->gender }}</td>
                                <td class="text-center attrByear">{{ $people->birth_year }}</td>
                                <td class="text-center attrHcolor">{{ $people->hair_color }}</td>
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

                <div class="panel-heading">Database Row</div>
                <div class="panel-body">
                    <table class="list-order" id="records_table" border="1"> 

                    </table>   
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container film-data" style="display: none;">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Film Details</div>
            <div class="panel-body">
                <table class="table table-hover film-table">
                    <thead>
                        <tr>
                            <th width="10%">Sr.No.</th>
                            <th width="10%">Title</th>
                            <th width="30%">Opening Crowl</th>
                            <th width="20%">Director</th>
                            <th width="15%">Producer</th>
                            <th width="15%">Created</th> 
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>

<div class="modal fade" id="modalDetailChar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Film Details</h4>
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
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
