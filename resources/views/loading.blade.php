@extends('layouts.app')
@section('main-content')
<style type="text/css">
	p.congrats{display:none;}
</style>
<form>
	<input name="control" id="control" />
	<input name="name" id="control" />
	<div class="btn-group">
		{!! Form::submit('Guardar', ['class' => 'uppercase btn btn-primary show_hide', 'id' => 'save']) !!}
	</div>
</form>
<script>
// Bind keyup event on the input
$('#control').keyup(function() {

  // If value is not empty
  if ($(this).val().length == 0) {
    // Hide the element
    $('.show_hide').hide();
} else {
    // Otherwise show it
    $('.show_hide').show();
}
}).keyup(); // Trigger the keyup event, thus running the handler on page load

</script>
<br><br>

<form action="javascript:validar()" >
	First name: <input class="inputFormu" type="text" name="FirstName" onKeyup="javascript:validar()"><br>
	Last name: <input class="inputFormu" type="text" name="LastName" ><br>
	<input id="boton"  type="submit" value="Submit">
</form>
<script>
	
	function validar(){
		var validado = true;
		elementos = document.getElementsByClassName("inputFormu");
		for(i=0;i<elementos.length;i++){
			if(elementos[i].value == "" || elementos[i].value == null){
				validado = false
			}
		}
		if(validado){
			window.location = "/action_page.php";
		}else{
			alert("Hay campos vacios")   
		}
	}
</script>

<br><br>

@endsection