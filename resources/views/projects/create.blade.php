@extends('layouts.app')

@section('content')
<form action="/projects" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">أسم المشروع</label>
        <input name="name" class="form-control" id="name" autofocus="autofocus" >
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">الشرح</label>
        <textarea class="form-control" id="description" name="description" rows="10"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">حفظ</button>

</form>    

@endsection