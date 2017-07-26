<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/signature.css') }}">
</head>
<body>
  <form action="{{ url('save-signature') }}" method="POST">
    {{ csrf_field() }}

    <h1>
      FIRMA DIGITAL
    </h1>
    <div class="wrapper">
      <canvas id="signature-pad" class="signature-pad" width=400 height=200 style="border:1px solid #000000;"></canvas>
    </div>
    <div>
      <button id="save">Save</button>
      <button id="clear">Clear</button>
    </div>
    <br><br>
    <input type="text" id="signature" name="signature" readonly required="">
    <input type="submit" value="enviar">
  </form>
  <!--<textarea name="signature" id="signature" cols="30" rows="10"></textarea>-->
  
  <script>

   var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
    backgroundColor: 'rgba(255, 255, 255, 0)',
    penColor: 'rgb(0, 0, 0)'
  });
   var saveButton = document.getElementById('save');
   var clearButton = document.getElementById('clear');

   clearButton.addEventListener("click", function (event) {
    signaturePad.clear();
  });

   saveButton.addEventListener("click", function (event) {
    if (signaturePad.isEmpty()) {
      alert("Por favor dibuja tu firma.");
    } else {
      document.getElementById('signature').value=signaturePad.toDataURL('image/png');
    }
  });

</script>
</body>
</html>