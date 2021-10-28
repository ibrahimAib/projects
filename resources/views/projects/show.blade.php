@extends('layouts.app')

@section('content')
    

<div class="d-flex justify-content-between">
    <h3 class="text-gray">المشاريع/{{ $project->name }}</h3>
    <a href="/projects/{{ $project->id }}/edit" class="btn btn-primary">تعديل المشروع</a>
</div>
<section class="py-3">
<div class="row">
    <div class="col-lg-4 pe-3 text-right"  dir="rtl">
        <div class="card border-0 p-3 mb-3 shadow-sm" style="min-height: 300px">
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
            <h3 class="card-title">{{ $project->name }}</h3>
            <p class="card-text">{{ $project->description }}</p>
            @include('projects.footer')
        </div>


        <div class="card border-0 p-3 mb-3 shadow-sm">
            <div class="card-title">
                <h3>تغيير حالة المشروع</h3>
                <div class="input-group">
                    <select name="cars" class="form-control" id="cars">
                        <option value="volvo">قيد التنفيذ</option>
                        <option value="saab">ملغي</option>
                        <option value="mercedes">تم التنفيذ</option>
                    </select>
                    <button type="button" class="btn btn-outline-secondary">تم</button>

                </div>
            </div>

        </div>
    </div>

{{-- ------------------------------------------- Right ------------------------------------ --}}

    <div class="col-lg-8 ">
        @forelse ($project->tasks as $task)
            <div class=" d-flex justify-content-between align-items-center bg-white shadow-sm mb-2 p-3">
                    <h5 class="text-center {{ $task->done ? ' text-gray checked' : ''}}">{{ $task->body }}</h5>
                <div class="d-flex align-items-center">
                    <div class="pt-2 pe-2">
                        <form action="/tasks/{{ $task->id }}" method="post">
                            @method('PATCH')
                            @csrf
                            <input class="" type="checkbox" name="done" id="done" 
                            {{ $task->done ? 'checked' : ''}} onchange="this.form.submit()">
                        </form>
                    </div>

                    <div>
                        <form action="/tasks/{{ $task->id }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="border-0" style="background-color: inherit">
                                <img src="/image/trash.svg" alt="">
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            
        @endforelse

        <div class="shadow-sm bg-white shasow-sm mb-2 p-4">
            <form action="/projects/{{$project->id}}/tasks" method="post">
                @csrf
                <div class="d-flex">
                    <input type="text" name="body" class="form-control flex-grow" autofocus="autofocus" placeholder="اسم المهمة">
                    <button class="btn btn-primary rounded-0 mr-2" type="submit">إضافة</button>
                </div>   
            </form> 
        </div>
    </div>


</div>
</section>
@endsection