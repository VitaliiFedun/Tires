// web/js/search.js
$(document).ready(function()
{
    $('.search input[type="submit"]').hide();

    $('#search_keywords').keyup(function(key)
    {
        if (this.value.length >= 3 || this.value === "")
        {
            $('#loader').show();
            // $('#disco').show();

            $('#disco').load(
                $(this).parents('form').attr('action'),
                { query: this.value + '*' },
                function() { $('#loader').hide(); }
            );
        }
    });
});