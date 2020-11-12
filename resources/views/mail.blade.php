<head>
    <style>


    </style>
</head>

<table style="border: 4px solid black;">
    <tr>
        <td style="border: 1px solid black;">Наименование позиции</td>
        <td style="border: 1px solid black;">Количество</td>
        <td style="border: 1px solid black;">Сумма</td>
    </tr>

            <?php $sum=0 ?>
            @forelse($coldublord as $coldublor)
        <tr>
            <td style="border: 1px solid black;">{{$coldublor->nameitem}}</td>
            <td style="border: 1px solid black;">{{$coldublor->count}}шт</td>
            <td style="border: 1px solid black;">{{$coldublor->price}}  руб</td>
            @php
            $sum=$sum+$coldublor->price;
            @endphp
        </tr>
            @empty
            @endforelse
</table>
                <div class="col-4">
                    <p>
                       Общая сумма  {{$sum}} Руб
                    </p>
                </div>




