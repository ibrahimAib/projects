@extends('layouts.app')
@section('content')
    
<div class="d-flex justify-content-between py-5">
    <h3 class="text-dark">المشاريع</h3>
    <a href="/projects/create" class="btn btn-primary">إنشاء مشروع</a>

</div>

<section>
    @forelse ($projects as $project)
    <div class="col-4 mb-33">
        <div class="card">
            <div class="card-body">
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
                    {{ $project->title }}
                </div>
                <div class="card-text">
                    {{ $project->description }}
                </div>
                @include('footer')
            </div>
        </div>
    </div>
        
    @empty
    <div class=" py-5 rounded" style="background-color: #F9E8D8">
    <h1 class="py-5 my-5 text-center">
        لا توجد مشاريع
    </h1>
        <div class="d-flex align-items-center justify-content-center fs-4">
            <a href="/projects/create" class="btn btn-primary fs-4">أنشئ أول مشروع</a>
        </div>
    </div>
    @endforelse
</section>

@endsection