@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card card-default">
    <div class="card-header"><h3>Add Item</h3></div>
    <div class="card-body">
      <form enctype="multipart/form-data" method="POST" action="/items">
        {{csrf_field()}}
        {{method_field('POST')}}
        <div class="row">
        <div class="form-group col-lg-4">
          <input type="text" name="title" placeholder="Item title" required="required" class="form-control">
        </div>
        <div class="form-group col-lg-4">
          <select name="type" required="required" class="form-control">
            <option value="">Choose type</option>
            <option value="food">Food</option>
            <option value="hot drinks">Hot drinks</option>
            <option value="cold drinks">Cold drinks</option>
          </select>
        </div>
        <div class="form-group col-lg-4">
          <select name="status" placeholder="item status" required="required" class="form-control">
            <option value="">Item status</option>
            <option value="0">Active</option>
            <option value="1">Inactive</option>
          </select>
        </div>
        <div class="form-group col-lg-12">
          <textarea name="description" placeholder="Item description" required="required" class="form-control">
          </textarea>
        </div>
         <div class="form-group col-lg-4">
          <input type="file" name="image"  placeholder="Item title" required="required" class="form-control">
        </div>
         <div class="form-group col-lg-4">
          <input type="text" name="price"  placeholder="Item price" required="required" class="form-control">
        </div>
        <div class="form-group col-lg-4">
          <select name="menu_id" required="required" class="form-control">
            <option value="">Choose menu type</option>
            @foreach($menus as $menu)
            	<option value="{{$menu->id}}">{{$menu->title}}</option>
            	@endforeach
          </select>
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
                <h3 class="">Items</h3>
                    <table class="table table-striped table-hover table-bordered">
                         <thead class="thead-dark">
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Title</th>
                              <th scope="col">Description</th>
                              <th scope="col">type</th>
                              <th scope="col">Status</th>
                              <th scope="col">Image</th>
                              <th scope="col">Created by</th>
                              <th scope="col">Menu</th>
                              <th scope="col">Delete</th>
                              <th scope="col">Edite</th>
                            </tr>
                          </thead>
                          <tbody>
                             @foreach($items as $item)
                                <tr>
                                  <td>{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{ $item->type}}</td>
                                    <td>{{$item->status}}</td>

                                    <td><img class="img-responsive menu-image" src="{{$item->image}}" alt="image not found"></td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->menu->title }}</td>
                                    <td>
                                      <form action="items/{{$item->id}}" method="post">
                                      {{csrf_field()}}
                                      {{method_field('DELETE')}}
                                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                    </td>

                                     <td>
                                      <a href="items/{{$item->id}}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>

                                </tr>
                             @endforeach
                          </tbody>
                        </table>
                        <div class="paginate col-lg-12">
                            {{ $items->render() }}
                        </div>
    </div>
</div>
@endsection
