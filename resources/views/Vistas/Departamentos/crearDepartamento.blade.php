@extends('Layouts.panel')
@section('content')



      <div class="card shadow" class="mb-15">
        <div class="card-header border-6">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Agregar Departamentos</h3>
            </div>
              
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
            <thead class="thead-light">
                <form action="{{ route('registrarDepartamento.guardarDepartamento') }}" method="POST">
                  @csrf
                  <div class="form-group">
                      <input type="text" name="nombre"class="form-control" placeholder="Nombre-Departamento"/>
                  </div>
                  <tbody>
                  <td>
                      <button type="submit" class="btn btn-sm btn-danger">guardarDepartamento</button>

                  </td>
              </tbody>
                </form>
            </thead>
        </div>
      </div>
@endsection