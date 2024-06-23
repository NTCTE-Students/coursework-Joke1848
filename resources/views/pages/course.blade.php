@include('includes.header')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <p class="card-title"><b>{{ $course->name }}</b></p>
            <p class="card-title"><b>{{ $course->description }}</b></p>
            <p class="card-title"><b>{{ $course->cost }}</b></p>

            <form action="{{ route('order.checkout', $course) }}" method="POST">
                @csrf
                    <legend>Выберите способ оплаты:</legend>

                    <div>
                      <input type="radio" id="cash" name="payment" value="СПБ" />
                      <label for="cash">СПБ</label>
                    </div>

                    <div>
                      <input type="radio" id="card" name="payment" value="По карте" />
                      <label for="card">По карте</label>
                    </div>

                </fieldset>

                <button type="submit" class="btn btn-primary">Записаться на курс</button>

            </form>

        </div>

    </div>
</div>
