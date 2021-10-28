<div class="card-footer bg-white">
    <div class="d-flex justify-content-between">
        <div class="d-flex align-items-center">
            <img src="/image/clock.svg" alt="">
            <div class="mr-2">
                {{ $project->created_at->diffForHumans() }}
            </div>
        </div>
        
        <div class="d-flex align-items-center mr-auto mx-s3">
            <div class="mr-2">
                {{$project->tasks->count()}}
            </div>
            <img src="/image/list.svg" alt="">
        </div>

        <div class="d-flex align-items-center mr-auto">
            <form action="/projects/{{ $project->id }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="border-0" style="background-color: inherit">
                <img src="/image/trash.svg" alt="">
            </button>
            </form>
        </div>

    </div>
</div>