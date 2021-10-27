<div class="card-footer">
    <div class="d-flex">
        <div class="d-flex align-items-center">
            <img src="/image/clock.svg" alt="">
            <div class="mr-2">
                {{ $project->created_at->diffForHumans() }}
            </div>
        </div>
        
        <div class="d-flex align-items-center">
            <img src="/image/list.svg" alt="">
            <div class="mr-2">
                
            </div>
        </div>

        <div class="d-flex align-items-center ms-auto">
            <img src="/image/trash" alt="">
        </div>

    </div>
</div>