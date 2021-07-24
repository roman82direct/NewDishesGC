<x-app-layout>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div style="background-image: none" class="testimonials max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('layouts.adminNav')
                <div class="grid-4">
                    @foreach($comments as $item)
                        <div class="testimonial-item">
                            <p  style="min-height: 50%">
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    {{ $item->comment }}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <i>Дата: {{ $item->created_at }}</i>
                            <h3>автор: {{ \App\Models\User::whereId($item->user_id)->value('name') }}</h3>
                            <h4>арт.: {{ \App\Models\Good::whereId($item->good_id)->value('art') }}</h4>
                            <a href="{{ route('admin::moderate', ['id'=>$item->id]) }}" class="mt-4 btn btn-outline-primary">{{ __('buttons.moderate') }}</a>
                            <a href="{{ route('admin::deleteComment', ['id'=>$item->id]) }}" class="mt-4 btn btn-outline-danger">{{ __('buttons.delete') }}</a>
                        </div>
                    @endforeach
                </div>
        </div>
</x-app-layout>
