@extends('layouts.form')

@section('url')
<form action="/projects/{{ $project->id }}" method="post">
@endsection


@section('method')
@method('PATCH')
@endsection
