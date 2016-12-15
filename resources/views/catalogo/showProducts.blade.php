@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="panel panel-default">
                    <h2><center><div class="panel-heading">

                        @foreach ($tasks as $element)
                            {{ $element->name }}
                        @endforeach
                    </div></center></h2>
                    <div class="panel-body">
                    @if (count($tasks) > 0)
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Categoria</th>
                                <th>Descripcion</th>
                                <th>&nbsp;</th>
                            </thead>


                            <tbody>
                                @foreach ($tasks as $task)
                                <tr>
                                    
                                <td><a href="{{ url('home/Products') }}">{{ $task->name }} <br>
                                    <span class="small"></a>
                                    Creada por: 
                                    {{$task->user->name}}
                                    </span></td>
                                    <td>{{ $task->description }}</td>
                                    <td>
                                        <form 
                                        action="{{url('/task/' . $task->id)}}"
                                        method="POST"
                                        >
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button
                                            class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <a 
                                            href="{{url('task/edit/' . $task->id)}}"
                                            class="btn btn-warning btn-sm" 
                                            ><i class="fa fa-edit"></i></a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <b>No hay ninguna categoria</b>
                    @endif
                    @if (Auth::user())
                    <br>
                    
                    <a href="{{url('/home/createProducts')}}" class="btn btn-success btn-sm">Crear un producto</a>    
                    @endif          
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection