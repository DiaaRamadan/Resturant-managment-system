@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card card-default">
    <div class="card-header"><h3>Add Menu</h3></div>
    <div class="card-body">
      <form enctype="multipart/form-data" method="POST" action="/menus">
        {{csrf_field()}}
        {{method_field('POST')}}
        <div class="row">
        <div class="form-group col-lg-4">
          <input type="text" name="title" placeholder="Menu title" required="required" class="form-control">
        </div>
        <div class="form-group col-lg-4">
          <select name="type" required="required" class="form-control">
            <option value="">Menu type</option>
            <option value="food">Food</option>
            <option value="hot drinks">Hot drinks</option>
            <option value="cold drinks">Cold drinks</option>
          </select>
        </div>
        <div class="form-group col-lg-4">
          <select name="status" placeholder="Menu status" required="required" class="form-control">
            <option value="">Menu status</option>
            <option value="0">Active</option>
            <option value="1">Inactive</option>
          </select>
        </div>
        <div class="form-group col-lg-12">
          <textarea name="description" placeholder="Menu description" required="required" class="form-control">
          </textarea>
        </div>
         <div class="form-group col-lg-4">
          <input type="file" name="image"  placeholder="Menu title" required="required" class="form-control">
        </div>
         <div class="form-group col-lg-4">
          <input type="submit" value="Save" class="btn btn-primary">
        </div>
      </div>
      </form>
    </div>

  </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
                <h3 class="">Menus</h3>
                    <table class="table table-striped table-hover table-bordered">
                         <thead class="thead-dark">
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Title</th>
                              <th scope="col">Type</th>
                              <th scope="col">Description</th>
                              <th scope="col">Status</th>
                              <th scope="col">Image</th>
                              <th scope="col">Created by</th>
                              <th scope="col">Delete</th>
                              <th scope="col">Edite</th>
                            </tr>
                          </thead>
                          <tbody>
                             @foreach($menus as $menu)
                                <tr>
                                  <td>{{$menu->id}}</td>
                                    <td>{{$menu->title}}</td>
                                    <td>{{$menu->type}}</td>
                                    <td>{{$menu->description}}</td>
                                    <td>{{$menu->status}}</td>
                                    <td><img class="img-responsive menu-image" src="{{$menu->image}}" alt="image not found"></td>
                                    <td>{{$menu->User->name}}</td>
                                    <td>
                                      <form action="menus/{{$menu->id}}" method="post">
                                      {{csrf_field()}}
                                      {{method_field('DELETE')}}
                                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                    </td>

                                     <td>
                                      <a href="menus/{{$menu->id}}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                             @endforeach
                          </tbody>
                        </table>
                        <div class="paginat-e co-l-lg-12">
                            {{ $menus->render() }}
                        </div>
    </div>
</div>
@endsection
