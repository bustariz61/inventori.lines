@extends('Layouts.panel')
@section('content')



      <div class="card shadow">
        <div class="card-header border-6">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Lista de departamentos</h3>
            </div>
            <div class="col text-right">
              <a href="{{ route('registrarDepartamento.crearDepartamento') }}" type="submit" class="btn btn-sm btn-danger">crearDepartamento</a>
              
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">
                  /argon/
                </th>
                <td>
                  4,569
                </td>
                <td>
                  <a href="" class="btn btn-sm btn-primary">Editar</a>
                  <a href="" class="btn btn-sm btn-danger">Eliminar</a>

                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
   
@endsection