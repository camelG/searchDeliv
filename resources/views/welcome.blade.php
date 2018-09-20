@extends('layout.base')
@section('title','SSSS==Lo」')

@section('container')
<div class="container" style="padding: 200px;">
    <div class="input-group mb-3" id="searchForm">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">#</span>
        </div>
        <input type="text" class="form-control" id="code" placeholder="Code" aria-label="Code" aria-describedby="basic-addon1">
        <div class="input-group-append">
            <span class="input-group-text" id="btn-search">Search</span>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$('#btn-search').click(function(){
    var code = $('#code').val();
        // console.log(code);
    if( code < 1000 ){
        alert('code入力してください。');
        return;
    }

    $.ajax({
        url: '/search',
        type: 'GET',
        data: {
            code: code,
        }
    })
    .done( (data) => {
        console.log('ok');
        console.log(data);
    } )
    .fail( (data) => {
        console.log('ng');
        console.log(data);
    } )
    // .always( (data) => {
    //     console.log(data);
    // } );
});
</script>
@endsection
