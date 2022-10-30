@extends('layouts.app')

@section('content')
    <div class="p-user-index">
        <div class="tphoto">
            @if (isset($user->img_url))
            <img src="{{ $user->img_url }}"
                title="tphoto"
                alt="Tinder Photo" />
                <div class="tname">{{ $user->name }}</div>
            @else
            <div class="text-center">現在マッチング対象の人物がヒットしません</div>
            @endif
        </div>

        <div class="tcontrols">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-1">
                        <form action="{{ route('swipes.store') }}"
                            method="POST">
                            @csrf

                            @if (isset($user->id))
                                <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                                <input type="hidden" name="is_like" value="0">
                                <button class="tno"
                                    type="submit">
                                    <i class="fa fa-times"
                                        aria-hidden="true"></i>
                                </button>
                            @else
                            @endif

                        </form>
                    </div>
                    <div class="col-md-6 mb-1">
                        <form action="{{ route('swipes.store') }}"
                            method="POST">
                            @csrf

                            @if (isset($user->id))
                            <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                            <input type="hidden" name="is_like" value="1">
                            <button class="tyes"
                                type="submit">
                                <i class="fa fa-heart"
                                    aria-hidden="true"></i>
                            </button>
                            @else
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
