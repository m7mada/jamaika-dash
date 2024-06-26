<div class="">

    <div class="col-md-8 mb-2">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif
    </div>

    @if( $showForm == true )
        @include('livewire.twins.update')
    @elseif( $showLogs == true )
        @include('livewire.logs.show-logs')

    @elseif( $listTwins == true )
        @include('livewire.twins.list')
    @endif

</div>


