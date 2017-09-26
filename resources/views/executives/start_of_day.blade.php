<div class="modal fade" id="start_of_day" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ASIGNAR SALDO INICIAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => 'addVault','' => '']) !!}  
        <p>
          {!! Form::label('ammount', 'Monto:') !!}
          <input type="number" name="ammount" class="form-control input-lg" placeholder="ESCRIBE MONTO" required="required" data-parsley-trigger="input focusin" data-parsley-type="digits" data-parsley-maxlength="5">
          <input type="hidden"  name="user_id" value="{{ $user->id }}">
        </p>
        <p>
          {!! Form::submit('ASIGNAR', ['class' => 'btn btn-lg btn-block bg-navy']) !!}
        </p>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      
    </div>
  </div>
</div>

<script>
  (function($) {
    $.extend({
      spin: function(spin, opts) {

        if (opts === undefined) {
          opts = {
          lines: 13, // The number of lines to draw
          length: 20, // The length of each line
          width: 10, // The line thickness
          radius: 30, // The radius of the inner circle
          corners: 1, // Corner roundness (0..1)
          rotate: 0, // The rotation offset
          direction: 1, // 1: clockwise, -1: counterclockwise
          color: '#000', // #rgb or #rrggbb or array of colors
          speed: 1, // Rounds per second
          trail: 56, // Afterglow percentage
          shadow: false, // Whether to render a shadow
          hwaccel: false, // Whether to use hardware acceleration
          className: 'spinner', // The CSS class to assign to the spinner
          zIndex: 2e9, // The z-index (defaults to 2000000000)
          top: '50%', // Top position relative to parent
          left: '50%' // Left position relative to parent
        };
      }

      var data = $('body').data();

      if (data.spinner) {
        data.spinner.stop();
        delete data.spinner;
        $("#spinner_modal").remove();
        return this;
      }

      if (spin) {

        var spinElem = this;

        $('body').append('<div id="spinner_modal" style="background-color: rgba(0, 0, 0, 0.3); width:100%; height:100%; position:fixed; top:0px; left:0px; z-index:' + (opts.zIndex - 1) + '"/>');
        spinElem = $("#spinner_modal")[0];

        data.spinner = new Spinner($.extend({
          color: $('body').css('color')
        }, opts)).spin(spinElem);
      }

    }
  });
  })(jQuery);

  function getBacon() {

    $.ajax({
      url: 'http://baconipsum.com/api/?type=all-meat',
      dataType: 'json',
      beforeSend: function(xhr) {
        $("#baconIpsumOutput").html('');
        $.spin('true');      
      }
    }).done(function(baconGoodness) {
      if (baconGoodness && baconGoodness.length > 0) {
        for (var i = 0; i < baconGoodness.length; i++)
          $("#baconIpsumOutput").append('<p>' + baconGoodness[i] + '</p>');
      }
    }).fail(function(xhr, textStatus, errorThrown) {    
      alert(errThrown);
    }).always(function() {
      $.spin('false');
    });
  }
</script>