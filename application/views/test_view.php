<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/custom.js"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">
    <link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/gh-pages.css">
    </head>
    <body style="background-color: #000000;">
        <div class="row">
        <center><h2 style="color: #fff;">AUTOCOMPLETE FORM FROM DATABASE USING CODEIGNITER AND AJAX</h2></center>
            <div class="col-md-4 col-md-offset-4" style="margin-top: 200px;">
                    <?php echo form_open_multipart('Accounts/GetCustomerDetails', 'name="form1"');?>
                    <label class="control-lable" style="color: #fff;">Country Name</label>
                    <input style="height:70px" type="text" id="country" autocomplete="off" name="keyword" class="form-control" placeholder="Type to get an Ajax call of Countries">        
                    <ul class="dropdown-menu txtcountry" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>
                </form>
        <div class="form-group">
                <label for="single" class="control-label">Select2 single select</label>
                <select id="single" class="form-control select2-single">
                    <option></option>
                    <optgroup label="Alaskan/Hawaiian Time Zone">
                            <option value="AK">Alaska</option>
                            <option value="HI" disabled="disabled">Hawaii</option>
                        </optgroup>
                        <optgroup label="Pacific Time Zone">
                            <option value="CA">California</option>
                            <option value="NV">Nevada</option>
                            <option value="OR">Oregon</option>
                            <option value="WA">Washington</option>
                        </optgroup>
                        <optgroup label="Mountain Time Zone">
                            <option value="AZ">Arizona</option>
                            <option value="CO">Colorado</option>
                            <option value="ID">Idaho</option>
                            <option value="MT">Montana</option><option value="NE">Nebraska</option>
                            <option value="NM">New Mexico</option>
                            <option value="ND">North Dakota</option>
                            <option value="UT">Utah</option>
                            <option value="WY">Wyoming</option>
                        </optgroup>
                        <optgroup label="Central Time Zone">
                            <option value="AL">Alabama</option>
                            <option value="AR">Arkansas</option>
                            <option value="IL">Illinois</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="OK">Oklahoma</option>
                            <option value="SD">South Dakota</option>
                            <option value="TX">Texas</option>
                            <option value="TN">Tennessee</option>
                            <option value="WI">Wisconsin</option>
                        </optgroup>
                        <optgroup label="Eastern Time Zone">
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="IN">Indiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="OH">Ohio</option>
                            <option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
                            <option value="VT">Vermont</option><option value="VA">Virginia</option>
                            <option value="WV">West Virginia</option>
                        </optgroup>
                        <option value="TNOGZ" disabled="disabled">The No Optgroup Zone</option>
                        <option value="TPZ">The Panic Zone</option>
                        <option value="TTZ">The Twilight Zone</option>

                </select>
            </div>

</div>
        </div>
    </body>
</html>
<script type="text/javascript">
$(document).ready(function () {
    $("#country").keyup(function () { 
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/Testpages/GetCountryName",
            data: { 
                keyword: $("#country").val()
            },
            dataType: "json",
            success: function (data) { //alert(data);
                if (data.length > 0) {
                    $('#DropdownCountry').empty();
                    $('#country').attr("data-toggle", "dropdown");
                    $('#DropdownCountry').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#country').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownCountry').append('<li role="displayCountries" ><a role="menuitem dropdownCountryli" class="dropdownlivalue">' + value['party_name'] + '</a></li>');
                });
            }
        });
    });
    $('ul.txtcountry').on('click', 'li a', function () {
        $('#country').val($(this).text());
    });
});
</script>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
        <script src="https://select2.github.io/select2-bootstrap-theme/js/anchor.min.js"></script>
<script>
            anchors.options.placement = 'left';
            anchors.add('.container h1, .container h2, .container h3, .container h4, .container h5');

            // Set the "bootstrap" theme as the default theme for all Select2
            // widgets.
            //
            // @see https://github.com/select2/select2/issues/2927
            $.fn.select2.defaults.set( "theme", "bootstrap" );

            var placeholder = "Select a State";

            $( ".select2-single, .select2-multiple" ).select2( {
                placeholder: placeholder,
                width: null,
                containerCssClass: ':all:'
            } );

            $( ".select2-allow-clear" ).select2( {
                allowClear: true,
                placeholder: placeholder,
                width: null,
                containerCssClass: ':all:'
            } );

            // @see https://select2.github.io/examples.html#data-ajax
            function formatRepo( repo ) {
                if (repo.loading) return repo.text;

                var markup = "<div class='select2-result-repository clearfix'>" +
                    "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
                    "<div class='select2-result-repository__meta'>" +
                        "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";

                if ( repo.description ) {
                    markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
                }

                markup += "<div class='select2-result-repository__statistics'>" +
                            "<div class='select2-result-repository__forks'><span class='glyphicon glyphicon-flash'></span> " + repo.forks_count + " Forks</div>" +
                            "<div class='select2-result-repository__stargazers'><span class='glyphicon glyphicon-star'></span> " + repo.stargazers_count + " Stars</div>" +
                            "<div class='select2-result-repository__watchers'><span class='glyphicon glyphicon-eye-open'></span> " + repo.watchers_count + " Watchers</div>" +
                        "</div>" +
                    "</div></div>";

                return markup;
            }

            function formatRepoSelection( repo ) {
                return repo.full_name || repo.text;
            }

            $( ".js-data-example-ajax" ).select2({
                width : null,
                containerCssClass: ':all:',
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;

                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                minimumInputLength: 1,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });

            $( "button[data-select2-open]" ).click( function() {
                $( "#" + $( this ).data( "select2-open" ) ).select2( "open" );
            });

            $( ":checkbox" ).on( "click", function() {
                $( this ).parent().nextAll( "select" ).prop( "disabled", !this.checked );
            });

            // copy Bootstrap validation states to Select2 dropdown
            //
            // add .has-waring, .has-error, .has-succes to the Select2 dropdown
            // (was #select2-drop in Select2 v3.x, in Select2 v4 can be selected via
            // body > .select2-container) if _any_ of the opened Select2's parents
            // has one of these forementioned classes (YUCK! ;-))
            $( ".select2-single, .select2-multiple, .select2-allow-clear, .js-data-example-ajax" ).on( "select2:open", function() {
                if ( $( this ).parents( "[class*='has-']" ).length ) {
                    var classNames = $( this ).parents( "[class*='has-']" )[ 0 ].className.split( /\s+/ );

                    for ( var i = 0; i < classNames.length; ++i ) {
                        if ( classNames[ i ].match( "has-" ) ) {
                            $( "body > .select2-container" ).addClass( classNames[ i ] );
                        }
                    }
                }
            });
        </script>