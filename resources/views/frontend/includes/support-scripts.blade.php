<script type="text/javascript">

    $(function() {

    $('#who').change(function(){
        $('.morale').hide("slow");
        $('#' + $(this).val()).show("slow");
    });

      // Get the form fields and hidden div
      var support_type = $('.support_type');
      var checkbox = $("#autres");
      var hidden = $("#hidden_fields");
      var populate = $("#populate");

      // Hide the fields.
      // Use JS to do this in case the user doesn't have JS
      // enabled.
      hidden.hide("slow");

      $('input:radio').change(function(){
            hidden.hide("slow");
       });

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
