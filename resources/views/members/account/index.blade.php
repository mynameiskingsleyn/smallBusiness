@extends('layouts.members.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3>You are logged into small business websites!</h3>
                            <p>Continue into Account</p>
                            <account :user="{{ $user }}" :btypes="{{ $btypes }}"></account>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    // import Businesses from "../../js/components/Businesses";
    // export default {
    //     components: {Businesses}
    // }
</script>
