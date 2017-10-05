<script>
   var wrapper = document.getElementById("signature-pad2"),
        clearButton = wrapper.querySelector("[data-action=clear2]"),
        saveButton = wrapper.querySelector("[data-action=save2]"),
        canvas = wrapper.querySelector("canvas"),
        signaturePad;

        function resizeCanvas() {
          var ratio =  Math.max(window.devicePixelRatio || 1, 1);
          canvas.width = canvas.offsetWidth * ratio;
          canvas.height = canvas.offsetHeight * ratio;
          canvas.getContext("2d").scale(ratio, ratio);
        }

        window.onresize = resizeCanvas;
        resizeCanvas();

        signaturePad = new SignaturePad(canvas);

        clearButton.addEventListener("click", function (event) {
          signaturePad.clear();
        });

        saveButton.addEventListener("click", function (event) {
          if (signaturePad.isEmpty()) {
            alert("Por favor dibuja tu firma.");
          } else {
            document.getElementById('signature2').value=signaturePad.toDataURL('image/png');
          }
        });
</script>