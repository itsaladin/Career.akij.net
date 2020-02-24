<div class="row bs-wizard" style="border-bottom:0;">

    @if (Route::is('admin.jobs.create'))
    <div class="bs-wizard-step {{ Route::is('admin.jobs.create') ? 'active' : 'disabled' }}">
        <div class="text-center bs-wizard-stepnum">&nbsp; </div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a href="#" class="bs-wizard-dot"></a>
        <div class="bs-wizard-info text-center">Primary Information</div>
    </div>
    @else 
        <div class="bs-wizard-step {{ Route::is('admin.jobs.store.jobs_edit') ? 'active' : 'disabled' }}">
            <div class="text-center bs-wizard-stepnum">&nbsp; </div>
            <div class="progress">
                <div class="progress-bar"></div>
            </div>
            <a href="#" class="bs-wizard-dot"></a>
            <div class="bs-wizard-info text-center">Primary Information</div>
        </div>
    @endif


    <div
        class="bs-wizard-step complete 
        @if (Route::is('admin.jobs.create')) disabled @elseif(Route::is('admin.jobs.store.step2')) active @else active @endif">
        <div class="text-center bs-wizard-stepnum">&nbsp; </div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a href="@if (Route::is('admin.jobs.create')) # @else {{ route('admin.jobs.store.step2', $job->id) }} @endif"
            class="bs-wizard-dot"></a>
        <div class="bs-wizard-info text-center">More Job Information</div>
    </div>

    <div
        class="bs-wizard-step 
        @if (Route::is('admin.jobs.create')) disabled @elseif(Route::is('admin.jobs.store.step3')) active @else active @endif">
        <div class="text-center bs-wizard-stepnum">&nbsp; </div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a href="@if (Route::is('admin.jobs.create')) # @else {{ route('admin.jobs.store.step3', $job->id) }} @endif "
            class="bs-wizard-dot"></a>
        <div class="bs-wizard-info text-center">Candidate Requirements</div>
    </div>

    {{-- <div class="bs-wizard-step disabled">
        <div class="text-center bs-wizard-stepnum">&nbsp; </div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a href="#" class="bs-wizard-dot"></a>
        <div class="bs-wizard-info text-center"> Company Info Visibility
        </div>
    </div>

    <div class="bs-wizard-step disabled">
        <div class="text-center bs-wizard-stepnum">&nbsp; </div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a href="#" class="bs-wizard-dot"></a>
        <div class="bs-wizard-info text-center"> Matching Criteria
        </div>
    </div> --}}

    <div class="bs-wizard-step
        @if (Route::is('admin.jobs.create')) disabled @elseif(Route::is('admin.jobs.store.preview')) active @else active @endif">
        <div class="text-center bs-wizard-stepnum">&nbsp; </div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a href="@if (Route::is('admin.jobs.create')) # @else {{ route('admin.jobs.store.preview', $job->id) }} @endif "
         class="bs-wizard-dot"></a>
        <div class="bs-wizard-info text-center"> Preview </div>
    </div>

    <div class="bs-wizard-step  
        @if (Route::is('admin.jobs.create')) disabled @elseif(Route::is('admin.jobs.store.complete')) active @else active @endif">
        <div class="text-center bs-wizard-stepnum">&nbsp; </div>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <a href="@if (Route::is('admin.jobs.create')) # @else {{ route('admin.jobs.store.complete', $job->id) }} @endif "
        class="bs-wizard-dot"></a>
        <div class="bs-wizard-info text-center"> Complete
        </div>
    </div>

</div>