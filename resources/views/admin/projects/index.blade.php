@extends('layouts.app')
@section('title', 'Portfolio | Index')

@section('alert')
<link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
      @if (session('info-message'))
      <div class="col-12">
          <div class="alert alert-{{session('alert')}}">
              {{session('info-message')}}
          </div>
      </div>
      @endif
      <div class="card p-0">
        <div class="card-header">
          <div class="row">
            <div class="col-6">
              <h2 class="m-0">Projects</h2>
            </div>
            <div class="col-6 text-end">

              <a href="{{ route('admin.trash') }} "class="btn btn-outline-danger">
                @if ($trashed)<i class="fa-solid fa-trash"></i><b> {{$trashed}}</b> item/s in trash @else <i class="fa-solid fa-trash"></i> Trash @endif</a>
              <a href="{{route('admin.projects.create')}}" class="btn btn-outline-dark"><i class="fa-solid fa-plus"></i> Add Project</a>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table mb-0">
              <thead class="table-dark lh-lg">
                <tr>
                  <th scope="col">ID <a href="{{route('admin.projects.index', 'sort=id')}}" class="text-white"><i class="fa-solid fa-sort-down"></i></a></th>
                  <th scope="col" >Name <a href="{{route('admin.projects.index', 'sort=name')}}" class="text-white d-inline-block"><i class="fa-solid fa-sort-down"></i></a></th>
                  <th scope="col">Publication Date <a href="{{route('admin.projects.index', 'sort=publication_date')}}" class="text-white d-inline-block"><i class="fa-solid fa-sort-down"></i></a></th>
                  <th scope="col">Difficulty <a href="{{route('admin.projects.index', 'sort=difficulty_id')}}" class="text-white d-inline-block"><i class="fa-solid fa-sort-down"></i></a></th>
                  <th scope="col">Type <a href="{{route('admin.projects.index', 'sort=type_id')}}" class="text-white d-inline-block"><i class="fa-solid fa-sort-down"></i></a></th>
                  <th scope="col">Technologies</th>
                  <th scope="col" class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($projects as $project)
                <tr>
                  <th scope="row">{{$project->id}}</th>
                  <td>{{$project->name}}</td>
                  <td>{{$project->publication_date}}</td>
                  <td class="text-secondary">
                    <div class="progress" role="progressbar" aria-label="Default striped example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar progress-bar-striped @if ($project->difficulty->percentage === '60%' || $project->difficulty->percentage === '80%') bg-warning  @elseif  ($project->difficulty->percentage === '100%') bg-danger  @else bg-success  @endif" style="width: {{$project->difficulty->percentage}}"></div>
                    </div>
                  </td>
                  <td>
                    @if ($project->type)
                    <span class="badge rounded-pill" style="background-color: {{$project->type->color}};">{{$project->type->name}}</span>
                    @else
                    <span class="badge rounded-pill bg-secondary">Empty</span>
                    @endif
                  </td>
                  <td>
                    @forelse ($project->technologies as $technology)
                        <span class="badge rounded-pill {{ $technology->name == 'JavaScript' ? 'text-dark' : '' }}" style="background-color: {{$technology->color}}">{{ $technology->name }}</span>
                    @empty
                    <span class="badge rounded-pill bg-secondary">No Technologies</span>
                    @endforelse
                </td>
                  <td class="text-center">
                    <a href="{{route('admin.projects.show', $project->slug)}}" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.projects.edit', $project->slug)}}" class="btn btn-outline-success btn-sm"><i class="fa-solid fa-edit"></i></a>
                    <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST" class="d-inline delete" data-element-name="{{$project->name}}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @empty
                    <tr>
                      <td colspan="6">No item </td>
                    </tr>
                @endforelse
              </tbody>
            </table>
            
          </div>
          <div class="card-footer">
            <div class="m-0">
              {{ $projects->appends(['sort' => request('sort')])->links() }}
            </div>
          </div>
        </div>
      </div>
</div>
@endsection

@section('scripts')
    @vite('resources/js/deleteConfirm.js')
@endsection