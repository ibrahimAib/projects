@extends('layouts.app')
@section('content')
    
<div class="d-flex justify-content-between pt-3">
    <h3 class="text-gray">المشاريع</h3>
    <a href="/projects/create" class="btn btn-primary ">إنشاء مشروع</a>

</div>

<section class="pt-2">
    <div class="row">
    @forelse ($projects as $project)
    <div class="col-md-6 col-lg-4 mb-3" dir="rtl">
        <div class="card">
            <div class="card-body text-right">
                <div class="stasus">
                    @switch($project->status)
                        @case(1)
                            <span class="text-success">تم التنفيذ</span>
                            @break
                        @case(2)
                            <span class="text-dark">ملغي</span>
                            @break
                        @default
                            <span class="text-danger">قيد التنفيذ</span>
                    @endswitch
                </div>
                <div class="card-title">
                    <a href="/projects/{{ $project->id }}">
                        <h3>{{ $project->name }}</h3>
                    </a>
                </div>
                <div class="card-text py-2 pb-3">
                    {{Str::limit($project->description, 120) }}
                </div>
                @include('projects.footer')
            </div>
        </div>
    </div>
        
    @empty
    <div class=" py-5 rounded col-lg-12" style="background-color: #F9E8D8">
    <h1 class="py-5 my-5 text-center">
        لا توجد مشاريع
    </h1>
        <div class="d-flex align-items-center justify-content-center fs-4">
            <a href="/projects/create" class="btn btn-primary fs-4">أنشئ أول مشروع</a>
        </div>
    </div>
    @endforelse
</div>
</section>

@endsection