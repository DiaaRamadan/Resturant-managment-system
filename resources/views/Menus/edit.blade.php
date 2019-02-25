@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
  <div class="card card-default col-lg-9">
    <div class="card-header"><h3>Edit Menu: {{$menu->title}}</h3></div>
    <div class="card-body">
      <form enctype="multipart/form-data" method="POST" action="/menus/{{$menu->id}}">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="row">
        <div class="form-group col-lg-12">
          <input type="text" name="title" placeholder="Menu title" value="{{$menu->title}}" required="required" class="form-control">
        </div>
        <div class="form-group col-lg-12">
          <select name="type" required="required" class="form-control">
            <option value="food">Food</option>
            <option value="hot drinks">Hot drinks</option>
            <option value="cold drinks">Cold drinks</option>
          </select>
        </div>
        <div class="form-group col-lg-12">
          <select name="status" required="required" class="form-control">
            <option value="0">Active</option>
            <option value="1">Inactive</option>
          </select>
        </div>
        <div class="form-group col-lg-12">
          <textarea name="description" placeholder="Menu description" required="required" class="form-control">{{$menu->description}}</textarea>
        </div>
         <div class="form-group col-lg-12">
          <input type="file" id="image" name="image"  class="form-control">
        </div>
         <div class="form-group col-lg-offset-6 col-lg-6">
          <input type="submit" value="Edit" class="btn btn-primary">
        </div>
      </div>
      </form>
    </div>
    
  </div>
  <div class="image-edit col-lg-3">
    <img class="img-responsive" src="{{$menu->image}}">
</div>
</div>
</div>

@endsection