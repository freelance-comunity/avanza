<script>
   var wrapper2 = document.getElementById("signature-pad2"),
        clearButton2 = wrapper2.querySelector("[data-action=clear2]"),
        saveButton2 = wrapper2.querySelector("[data-action=save2]"),
        canvas2 = wrapper2.querySelector("canvas"),
        signaturePad2;

        function resizeCanvas() {
          var ratio =  Math.max(window.devicePixelRatio || 1, 1);
          canvas.width = canvas.offsetWidth * ratio;
          canvas.height = canvas.offsetHeight * ratio;
          canvas.getContext("2d").scale(ratio, ratio);
        }

        window.onresize = resizeCanvas;
        resizeCanvas(canvas2);

        signaturePad2 = new SignaturePad(canvas2);

        clearButton2.addEventListener("click", function (event) {
          signaturePad2.clear(clearButton2);
        });

        saveButton2.addEventListener("click", function (event) {
          if (signaturePad2.isEmpty()) {
            alert("Por favor dibuja tu firma.");
          } else {
            document.getElementById('signature2').value=signaturePad2.toDataURL('image/png');
          }
        });
</script>