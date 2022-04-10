@extends('layouts.app')

@section('content')
    <div class="m-3">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-borderless">
                    <thead class="table-primary">
                    <tr>
                        <th class="p-3" scope="col">Description</th>
                        <th class="p-3" scope="col">Due To</th>
                        <th class="p-3" scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="p-3">Cryto</td>
                        <td class="p-3">May 2022</td>
                        <td class="text-center p-3">
                            {{--only admin can use the features--}}
                            @can('tasks.edit')
                                <button class="btn btn-warning me-3" id="btn_edit">Edit</button>
                            @endcan
                            @can('tasks.delete')
                                <button class="btn btn-danger" id="btn_delete">Delete</button>
                            @endcan

                            {{--only admin can see buttons--}}
                            @if(auth()->user()->is_admin)
                                <button class="btn btn-warning me-3" id="btn_edit">Edit</button>
                                <button class="btn btn-danger" id="btn_delete">Delete</button>
                            @else
                                <span></span>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
