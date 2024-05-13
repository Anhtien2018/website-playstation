{{-- <form action="" method="post">
    <input type="text" name="phone[]">
    <input type="text" name="pass[]">
   <br>
   <input type="text" name="phone[]">z
   <input type="text" name="pass[]">
    @csrf
    <button type="submit" >nhấn</button>
</form> --}}
@extends('Layouts.Client')
<select id="province">
    <option value="">Chọn</option>
    @foreach ($province as $item)
        <option value="{{$item->matp}}">{{$item->name}}</option>
    @endforeach
</select>
<select id="district">
    <option value="">Chọn</option>
</select>
<select name="" id="show"class="show"></select>