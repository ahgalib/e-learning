@extends('font_end_layouts.font_master')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-11">
            <table class="table table-strip">
                <tr>
                    <th>SI NO</th>
                    <th>Course Name</th>
                    <th>Discount</th>
                    <th>Unit Price</th>
                    <th>Final Price</th>

                </tr>
                <?php $total_price = 0;?>
                @foreach ($cart as $key=>$cart)

                <tr>
                    <td>{{$key+1}}</td>

                    <td> {{$cart->course->course_name}} </td>
                    <td>{{$cart->course->course_discount}}  </td>
                    <td>{{$cart->course->course_price}}  </td>
                    @if($cart->course->course_discount)
                        <td>

                            {{$final_price = $cart->course->course_price - ($cart->course->course_price *$cart->course->course_discount/100)}}
                        </td>
                    @else
                        <td>{{$final_price = $cart->course->course_price}}  </td>
                    @endif
                </tr>
                <?php $total_price = $total_price + $final_price?>
                @endforeach

                <tr>
                    <td colspan="4">total Price</td>
                    <td><?php echo $total_price;?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
