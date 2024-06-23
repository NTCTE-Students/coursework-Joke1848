 @include('includes.header')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Главная</h1>
        </div>
        @foreach ($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Название: {{ $course->name }} Цена: {{ $course->cost }}</h2>
                        <p class="card-title">Описание: {{ $course->descriptiion }}</p>
                        <a href="{{ route('course.show', $course) }}" class="btn btn-primary">Записаться на курс</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
