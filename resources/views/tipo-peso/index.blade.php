@extends('layouts.app')

@section('template_title')
    Tipo Peso
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tipo Peso') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tipo-pesos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Name</th>
										<th>Abreviatura</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipoPesos as $tipoPeso)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tipoPeso->name }}</td>
											<td>{{ $tipoPeso->abreviatura }}</td>
											<td>{{ $tipoPeso->status }}</td>

                                            <td>
                                                <form action="{{ route('tipo-pesos.destroy',$tipoPeso->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tipo-pesos.show',$tipoPeso->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tipo-pesos.edit',$tipoPeso->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tipoPesos->links() !!}
            </div>
        </div>
    </div>
@endsection
