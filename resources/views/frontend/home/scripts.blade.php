<script src="{{ asset('/assets/js/libs/jssor.slider.min.js')}}"></script>

<script type="text/javascript">
    jQuery(document).ready(function ($) {

        var jssor_1_SlideoTransitions = [
            [{b:-1,d:1,o:-0.7}],
            [{b:900,d:2000,x:-379,e:{x:7}}],
            [{b:900,d:2000,x:-379,e:{x:7}}],
            [{b:-1,d:1,o:-1,sX:2,sY:2},{b:0,d:900,x:-171,y:-341,o:1,sX:-2,sY:-2,e:{x:3,y:3,sX:3,sY:3}},{b:900,d:1600,x:-283,o:-1,e:{x:16}}]
        ];

        var jssor_1_options = {
            $AutoPlay: 1,
            $SlideDuration: 1000,
            $SlideEasing: $Jease$.$OutQuint,
            $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 3000;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
    });
</script>

<script type="text/javascript"><!--
    $(function() {
        $('#who').change(function(){
            $('.morale').hide("slow");
            $('#' + $(this).val()).show("slow");
        });
    });
	//-->

    $(function() {

      // Get the form fields and hidden div
      var checkbox = $("#autres");
      var hidden = $("#hidden_fields");
      var populate = $("#populate");

      // Hide the fields.
      // Use JS to do this in case the user doesn't have JS
      // enabled.
      hidden.hide("slow");

      // Setup an event listener for when the state of the
      // checkbox changes.
      checkbox.change(function() {
        // Check to see if the checkbox is checked.
        // If it is, show the fields and populate the input.
        // If not, hide the fields.
        if (checkbox.is(':checked')) {
          // Show the hidden fields.
          hidden.show("slow");
          // Populate the input.
          //populate.val("Dude, this input got populated!");
        } else {
          // Make sure that the hidden fields are indeed
          // hidden.
          hidden.hide("slow");

          // You may also want to clear the value of the
          // hidden fields here. Just in case somebody
          // shows the fields, enters data to them and then
          // unticks the checkbox.
          //
          // This would do the job:
          //
          // $("#hidden_field").val("");
        }
      });
    });
	</script>
